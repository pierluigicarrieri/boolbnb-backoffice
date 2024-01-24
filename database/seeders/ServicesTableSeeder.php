<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utilizza la factory per creare un record
        Service::factory()->create([
            'name' => null,
        ]);

        $services = [
            'Parcheggio',
            'Wi-Fi',
            'Piscina',
            'Colazione inclusa',
            'Climatizzazione',
            'TV',
            'Dog friendly',
        ];

        // Utilizza il loop foreach per creare gli altri record
        foreach ($services as $serviceName) {
            Service::create([
                'name' => $serviceName,
            ]);
        }
    }
}
