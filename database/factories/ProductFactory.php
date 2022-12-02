<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    private $imgPaths = [
                        1=>'/images/carousel/iphone14.webp',
                        2=>'/images/carousel/android.webp',
                        3=>'/images/carousel/google-pixel.webp',
    ];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'order_id' => null,
            'type' => 1,
            'name' => $this->faker->sentence(1,false),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->numberBetween(200,2000),
            'img_path' => $this->imgPaths[rand(1,3)]
        ];
    }
}
