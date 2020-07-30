<?php

namespace App\Models;

use App\Suport\Cropper;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::saving(function ($obj) {
            $obj->slug = str_slug($obj->slug);
        });
    }

    public function scopeByCategory(Builder $builder, string $slug)
    {
        if (!empty($slug)) {
            $builder->join('post_has_categories', 'post_has_categories.post_id', '=', 'posts.id')
                ->join('categories', 'categories.id', "=", "post_has_categories.category_id")
                ->where('categories.slug', $slug);
        }
    }

    public function scopeBySlug(Builder $builder, string $slug){
        return $builder->where('slug', $slug);
    }

    public function scopeNotPost(Builder $builder, ?array $id){
        if(!empty($id)){
            return $builder->whereNotIn('id', $id);
        }
    }

    public function scopeByUser(Builder $builder, int $user){
        return $builder->where('user_id', $user);
    }

    public function scopeByTags(Builder $builder, array $tags){
        if (!empty($tags)) {
            $builder->join('post_has_tags', 'post_has_tags.tag_id', '=', 'posts.id')
                ->join('tags', 'tags.id', "=", "post_has_tags.tag_id")
                ->whereIn('tags.slug', $tags);
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_has_tags', 'post_id', 'tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_has_categories', 'post_id', 'category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comments::class, 'item')
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOrder(Builder $builder, $order = false)
    {
        if($order){
            return $builder
                ->orderBy('created_at', 'DESC')
                ->orderBy('id', 'DESC');
        }
    }

    private function getImage(){
        return "posts/". (($this->id % 17) + 1) . ".jpg";
    }

    public function getImageAttribute(){
        return $this->cover ?? asset("img/" . $this->getImage());
    }

    public function thumb(int $width, int $height = null){
        return asset('frontend/img/' . Cropper::thumb(public_path('frontend/img/' . $this->getImage()), $width, $height));
    }
}
