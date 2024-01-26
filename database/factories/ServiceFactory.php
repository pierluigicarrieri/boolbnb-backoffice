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
    
        // Mescola l'array di servizi e prendi i primi 7 elementi
        shuffle($services);
        $selectedServices = array_slice($services, 0, 7);
    
        return [
            'name' => $this->faker->unique()->randomElement($selectedServices),
        ];
    }
}
