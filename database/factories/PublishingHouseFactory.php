<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublishingHouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(rand(2,5),true),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->e164PhoneNumber,
            'contact_person' => $this->faker->name . ' ' . $this->faker->email . ' ' . $this->faker->e164PhoneNumber,
            'country' => $this->faker->country,
        ];
    }
}
