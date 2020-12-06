<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Theme;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $theme = Theme::inRandomOrder()->first();
    $user = User::inRandomOrder()->first();
    return [
        'title' => $faker->title,
        'content' => $faker->text,
        'theme_id' => $theme->id,
        'user_id' => $user->id,
    ];
});
