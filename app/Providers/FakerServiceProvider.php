<?php

namespace App\Providers;

use Faker\Generator as FakerGenerator;
use Faker\Provider\Base as FakerBase;
use Illuminate\Support\ServiceProvider;
use Zttp\Zttp;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ('local' === config('app.env')) {
            $faker = resolve(FakerGenerator::class);

            $newClass = new class($faker) extends FakerBase {
                public function randomImage($width = 640, $height = 480)
                {
                    $imageId = Zttp::get("https://picsum.photos/{$width}/{$height}")->header('Picsum-Id');

                    return "https://i.picsum.photos/id/{$imageId}/1080/720.jpg";
                }
            };

            $faker->addProvider($newClass);
        }
    }
}
