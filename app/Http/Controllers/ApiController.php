<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Http\Requests\NewsletterRequest;
use App\Mail\ContactEmail;
use App\Models\Newsletter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiController
{
    public function newsletter(NewsletterRequest $request)
    {
        $obj = Newsletter::create($request->all());

        return ['msg' => __('E-mail cadastrado com sucesso'), "id" => $obj->id];
    }

    public function commentary(string $slug, Request $request) {
        $post = PostHelper::post($slug);
        $user = User::whereEmail($request->input('email'))->first();
        if(empty($user)){
            $user = User::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                'password' => $request->input('_token')
            ]);
        }

        $obj = $post->comments()->create([
            "user_id" => $user->id,
            "comment" => $request->input('message'),
        ]);

        return ['msg' => __('Comentário cadastrado com sucesso'), "id" => $obj->id];
    }

    public function contact(Request $request)
    {
        $data = [
            "replay_name" => $request->name,
            "replay_email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ];
        
        Mail::send(new ContactEmail($data));

        return ['msg' => __('Contato cadastrado com sucesso')];
    }
}