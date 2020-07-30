<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(10);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'subtitle' => $faker->sentence(25),
        'description' => $faker->paragraph(70),
    ];
});
