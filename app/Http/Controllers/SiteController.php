<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SiteController
{
    public function home()
    {
        $postsAll = Post::order(false)->with(['tags', 'categories'])->limit(15)->get();

        $banners = [];
        $latests = [];
        $posts = [];
        $tags = [];
        $principal = false;

        foreach ($postsAll as $k => $v) {
            if($k < 5){
                $banners[] = $v;
            } else if($k == 5){
                $principal = $v;
            } else if($k < 11){
                $posts[] = $v;
            } else{
                $latests[] = $v;
            }

            $tags = array_merge($tags, $v->tags()->pluck('tag', 'id')->toArray());
        }

        $tags = array_values(array_unique($tags));

        return view('frontend.home', [
            'banners' => $banners,
            'posts' => $posts,
            'latests' => $latests,
            'tags' => $tags,
            "principal" => $principal,
        ]);
    }
}
