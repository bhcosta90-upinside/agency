<?php

namespace App\Http\Controllers;

use App\Helpers\TagHelper;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Post;

class SiteController
{
    public function home()
    {
        $postsAll = Post::order(false)->with(['categories', 'comments'])->limit(15)->get();

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
            'tags' => TagHelper::home(),
            "principal" => $principal,
            'last' => $last
        ]);
    }

    public function newsletter(NewsletterRequest $request)
    {
        $obj = Newsletter::create($request->all());

        return ['msg' => __('E-mail cadastrado com sucesso'), "id" => $obj->id];
    }
}
