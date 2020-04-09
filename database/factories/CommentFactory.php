<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;



$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $post = App\Models\Post::pluck('id')->toArray();
    $user = App\Models\User::pluck('id')->toArray();
    return [
        'user_id' =>$faker->randomElement($user),
        // Factory('App\Models\User')->create(),
        //
        'body' => $faker->paragraph(),
        'post_id' => $faker->randomElement($post)
        //Factory('App\Models\Post')->create()
        //
    ];
});
