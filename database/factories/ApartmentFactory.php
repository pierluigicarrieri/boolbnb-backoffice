<?php
namespace Database\Factories;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    protected $model = Apartment::class;

    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();

        return [
            'name' => $this->faker->words(3, true),
            'user_id' => $this->faker->randomElement($userIds),
            'rooms' => $this->faker->numberBetween(1, 5),
            'beds' => $this->faker->numberBetween(1, 3),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'mq' => $this->faker->numberBetween(50, 200),
            'address' => $this->faker->address,
            'lat' => $this->faker->latitude,
            'lon' => $this->faker->longitude,
            'photo' => 'path/to/photo.jpg',
            'visible' => $this->faker->boolean,
        ];
    }
}