<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(App\Models\Post::class, function (Faker $faker) {
   $users = App\Models\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'post_date' => now(),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_name' => $faker->word(),
        'post_type' => 'article',
    ];
});