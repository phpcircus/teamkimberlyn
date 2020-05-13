<?php

use App\Models\Post;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Wink\WinkAuthor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $faker = FakerFactory::create();

        // Artisan::call('create:author');
        foreach (range(0, 5) as $number) {
            $name = $faker->name;

            $author = WinkAuthor::create([
                'id' => (string) Str::uuid(),
                'name' => $name,
                'slug' => Str::slug($name),
                'bio' => 'This is me.',
                'email' => $faker->email,
                'password' => Hash::make($password = Str::random()),
            ]);

            factory(Post::class, 12)->create(['author_id' => $author->id, 'publish_date' => now()->addDays(rand(1, 3))]);
        }

        factory(\App\Models\News::class, 3)->create(['author_id' => WinkAuthor::first()->id]);
    }
}
