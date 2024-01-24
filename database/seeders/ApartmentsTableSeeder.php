<?php

namespace Database\Seeders;

use App\Models\Apartment; 
use App\Models\User; 
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
        {
            Apartment::factory()->count(20)->create();
        }
            
    }
