<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $name = $faker->name;
        
        return [
            "name"=>$name,
            "slug"=>Str::of($name)->slug('-'),
            "image"=>$faker->imageUrl(640, 480),
            "description"=>$faker->text(100),
            "content"=>$faker->text(500),
            "creator_id"=>1
        ];
    }
}
