<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use App\Models\Post;
use Illuminate\Http\Request;

class SiteController
{
    public function home()
    {
        $postsAll = Post::order(false)->with(['categories', 'comments', 'user'])->limit(15)->get();

        $banners = [];
        $latests = [];
        $posts = [];
        $last = null;
        $principal = null;

        foreach ($postsAll as $k => $v) {
            if($k == 0){
                $last = $v;
            } else if($k < 5){
                $banners[] = $v;
            } else if($k == 5){
                $principal = $v;
            } else if($k < 11){
                $posts[] = $v;
            } else{
                $latests[] = $v;
            }
        }

        return view('frontend.home', [
            'banners' => $banners,
            'posts' => $posts,
            'latests' => $latests,
            "principal" => $principal,
            'last' => $last
        ]);
    }

    public function newsletter(NewsletterRequest $request)
    {
        $obj = Newsletter::create($request->all());

        return ['msg' => __('E-mail cadastrado com sucesso'), "id" => $obj->id];
    }

    public function category($slug){
        return view('frontend.posts', [
            'latests' => PostHelper::latest(),
            'posts' => PostHelper::byCategory($slug)
        ]);
    }

    public function posts(Request $request){
        return view('frontend.posts', [
            'latests' => PostHelper::latest(),
            'posts' => PostHelper::byPost($request->all())
        ]);
    }

    public function post($slug){
        $post = PostHelper::post($slug);
        $comments = PostHelper::comments($post);
        
        return view('frontend.post', [
            'latests' => PostHelper::latest(),
            'post' => $post,
            'comments' => $comments,
        ]);
    }
}
