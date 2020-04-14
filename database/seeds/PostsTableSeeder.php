<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*   factory(Post::class, 10)->create()
            ->each(function ($post) {
                $comments = factory(Comment::class, 2)->make();
                $post->comments()->saveMany($comments);
            });*/
}
}
