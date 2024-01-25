<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        Sponsorship::factory()->count(3)->create();
        
    }
}

