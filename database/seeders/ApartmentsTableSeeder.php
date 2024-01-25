<?php

namespace Database\Seeders;

use App\Models\Apartment; 
use App\Models\User; 
use App\Models\Service;
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      // Nel seeder ApartmentsTableSeeder
      public function run()
      {
        $apartments = Apartment::factory()->count(20)->create();

    $services = Service::inRandomOrder()->limit(7)->get();

    foreach ($apartments as $apartment) {
        $apartment->services()->attach(
            $services->random(rand(1, 7))->pluck('id')->toArray()
              );
          }
      }
    }