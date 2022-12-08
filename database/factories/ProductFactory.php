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
    private $types = [
        1=>'Phone',
        2=>'Computer',
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
            'type' => rand(1,2),
            'name' => $this->faker->unique()->sentence(1,false),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(30,false),
            'price' => $this->faker->numberBetween(200,2000),
            'img_path' => $this->imgPaths[rand(1,3)]
        ];
    }
}
