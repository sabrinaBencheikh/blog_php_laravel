<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       factory(App\Models\User::class, 10)->create()
        ->each(function ($user) {
            $user->posts()->saveMany(factory(App\Models\Post::class, 2)->create()
            ->each(function ($post) {
                $post->comments()->saveMany(factory(App\Models\Comment::class,20)->create());
        }));
        });
        
 
    }
}
