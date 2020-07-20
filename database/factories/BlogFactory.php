<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

$factory->define(Blog::class, function (Faker $faker) {

    return [
        'blog_subject' => $faker->sentence(8),
        'blog_user_name' => 'Aminmhd76',
        'blog_user_id' => 101,
        'blog_description' => $faker->paragraph(30),
        'blog_img' => $faker->image('public/build/images' , 400, 500, null,false),
    ];

});
