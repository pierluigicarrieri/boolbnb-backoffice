<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $services = [
            'Parcheggio',
            'Wi-Fi',
            'Piscina',
            'Colazione inclusa',
            'Climatizzazione',
            'TV',
            'Dog friendly',
        ];

        // Scegli casualmente uno dei servizi definiti
        $serviceName = $this->faker->randomElement($services);

        return [
            'name' => $serviceName,
        ];
    }
}
