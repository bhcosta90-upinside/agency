<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SiteController
{
    public function home()
    {
        $banners = Post::order()->limit(5)->get();
        $posts = Post::order()->limit(6)->offset(5)->get();
        $latests = Post::order()->limit(5)->offset(11)->get();

        return view('frontend.home', [
            'banners' => $banners,
            'posts' => $posts,
            'latests' => $latests
        ]);
    }
}
