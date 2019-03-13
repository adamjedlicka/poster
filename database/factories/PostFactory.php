<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'user_id' => User::inRandomOrder()->first()->getKey(),
    ];
});
