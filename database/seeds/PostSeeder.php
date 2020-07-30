<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total = rand(5, 10);

        $tags = factory(\App\Models\Tag::class, $total)->create()->pluck('id')->toArray();
        $categories = factory(\App\Models\Category::class, $total)->create()->pluck('id')->toArray();

        factory(\App\User::class, 3)->create([

        ])->each(function ($user) use($tags, $total, $categories) {
            factory(\App\Models\Post::class, 17)->create([
                'user_id' => $user->id,
            ])->each(function($post) use($tags, $total, $categories, $user) {

                $tagPost = \Illuminate\Support\Arr::random($tags, rand(2, $total));
                $categoryPost = \Illuminate\Support\Arr::random($categories, rand(1, 2));

                $post->tags()->sync($tagPost);
                $post->categories()->sync($categoryPost);

                factory(\App\Models\Comments::class, rand(20, 50))->create([
                    'user_id' => $user->id,
                    'item_type' => \App\Models\Post::class,
                    'item_id' => $post->id,
                ]);
            });
        });
    }
}
