<?php

namespace Database\Seeders;

use App\Models\Apartment;  
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $apartments = Apartment::factory()->count(20)->create();

        $services = Service::inRandomOrder()->limit(7)->get();
        $sponsorships = Sponsorship::inRandomOrder()->limit(3)->get();

        foreach ($apartments as $apartment) {
            $apartment->services()->attach(
                $services->random(rand(1, 7))->pluck('id')->toArray()
            );

            // Assegna casualmente una delle tre sponsorship
            $randomSponsorship = $sponsorships->random();
            $apartment->sponsorships()->sync([$randomSponsorship->id]);
        }
    }
}