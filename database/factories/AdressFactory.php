<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 3,
            'city' => $this->faker->city,
            'district' =>  $this->faker->streetName,
            'zipcode' => $this->faker->randomDigitNotZero(),
            'address' => $this->faker->unique()->address(),
            'is_default' => $this->faker->boolean(),
        ];
    }
}
