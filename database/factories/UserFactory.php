<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1,3),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id' => 1,
        'title' => $faker->sentence(6),
        'body'=>$faker->paragraph(rand(10,15), true),
        'slug'=>$faker->slug(),

    ];
});
$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','author','subscriber']),
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Laravel','Java']),
    ];
});

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'file' => 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'post_id' => rand(1,10),
        'body'=>$faker->paragraph(rand(10,15), true),
        'email'=>$faker->safeEmail,
        'photo'=>"placeholder.jpg",

    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'body'=>$faker->paragraph(rand(10,15), true),
        'email'=>$faker->safeEmail,
        'photo'=>"placeholder.jpg",
    ];
});
