<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\User;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $user = User::inRandomOrder()->first('id');
        $name = $faker->text(20);
        return [
            "name"=>$name,
            "slug"=>Str::of($name)->slug('-'),
            "avatar"=>$faker->imageUrl(640, 480),
            'user_id' => $user->id,
            "user_id"=>1,
            "banner"=>$faker->imageUrl(1000, 1200),
            "address"=>$faker->address(),
            "phone"=>$faker->e164PhoneNumber(),
            "email"=>$faker->email(),
            "longitude"=>$faker->latitude(),
            "latitude"=>$faker->longitude(),
            "status"=>$faker->randomElement([0, 1]),
            "sort"=>null,
            "description"=>$faker->text(100)
        ];
    }
}
