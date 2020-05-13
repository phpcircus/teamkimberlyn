<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = ucfirst($faker->word).' '.ucfirst($faker->word).' '.ucfirst($faker->word);
    $published = $faker->boolean();

    return [
        'id' => $faker->uuid,
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->paragraph(4),
        'body' => $faker->paragraph(10),
        'published' => $published,
        'publish_date' => $published ? now()->toDateString() : null,
        'featured_image' => $faker->randomImage(1080, 720),
        'featured_image_caption' => $faker->sentence(5),
        'meta' => [],
        'author_id' => factory(Author::class),
    ];
});
