<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Wink\WinkAuthor;

$factory->define(News::class, function (Faker $faker) {
    $title = ucfirst($faker->word).' '.ucfirst($faker->word).' '.ucfirst($faker->word);

    return [
        'id' => $faker->uuid,
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(10),
        'author_id' => WinkAuthor::first()->id,
    ];
});
