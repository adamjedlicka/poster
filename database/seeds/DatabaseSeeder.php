<?php

use App\Post;
use App\User;
use App\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Topic::class, 10)->create();
        factory(Post::class, 100)->create();
    }
}
