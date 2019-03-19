<?php

use App\User;
use App\Topic;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $text = $faker->text;

    $users = User::inRandomOrder()->take(rand(0, 2))->get();
    foreach ($users as $user) {
        $text = '@' . $user->handle . ' ' . $text;
    }

    $topics = Topic::inRandomOrder()->take(rand(0, 3))->get();
    foreach ($topics as $topic) {
        $text .= ' ' . $topic->name;
    }

    return [
        'text' => $text,
        'user_id' => User::inRandomOrder()->first()->getKey(),
    ];
});
