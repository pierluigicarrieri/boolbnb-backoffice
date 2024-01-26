<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sponsorship;

class SponsorshipFactory extends Factory
{
    protected $model = Sponsorship::class;

    public function definition()
    {
        $sponsorships = [
            ['price' => 2.99, 'duration' => '24:00:00'],
            ['price' => 5.99, 'duration' => '72:00:00'],
            ['price' => 9.99, 'duration' => '144:00:00'],
        ];

        return $sponsorships[$this->faker->unique()->numberBetween(0, 2)];
    }
}