<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            'India',
            'United States',
            'United Kingdom',
            'Australia',
            'Canada',
        ];

        foreach ($countries as $country) {

            Country::create([
                'name' => $country,
                'status' => true,
            ]);

        }
    }
}