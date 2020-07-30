<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->colorName;
    
    return [
        'tag' => $title,
        'slug' => str_slug($title),
    ];
});
