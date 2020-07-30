<?php

namespace App\Helpers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PostHelper extends Model
{
    const LIMIT = 5;
    const CACHE = 60;

    public static function latest()
    {
        return (Cache::remember('postTableLatest', self::CACHE, function() {
            return (new Post)
            ->order(true)
            ->take(4)
            ->get();
        }));
    }

    public static function byCategory(string $slug)
    {
        return (Cache::remember('postCategoryTableLatest' . request('page', 1), 60, function() use($slug) {
            return (new Post)
            ->select(["posts.*"])
            ->with(['categories', 'comments', 'user'])
            ->order(true)
            ->byCategory($slug)
            ->paginate(self::LIMIT);
        }));
    }

    public static function post(string $slug){
        return (Cache::remember('postTableLatest' . $slug, self::CACHE, function() use($slug) {
            return (new Post)
            ->select(["posts.*"])
            ->bySlug($slug)
            ->with(['categories', 'comments.user', 'user'])
            ->order(true)
            ->first();
        }));
    }

    public static function comments(Post $post){
        return (Cache::remember('postCommentsTableLatest' . request('page', 1), self::CACHE, function() use($post) {
            return $post->comments()->paginate(self::LIMIT);
        }));
    }

    public static function byPost(array $filters=[]){
        return (Cache::remember('byPostTableLatest' . request('page', 1), self::CACHE, function() use($filters) {
            return (new Post)
            ->select(["posts.*"])
            ->byTags(array_key_exists('tags', $filters) ? $filters['tags'] : [])
            ->with(['categories', 'comments', 'user'])
            ->order(true)
            ->paginate(self::LIMIT);
        }));
    }
}
