<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class StateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $odisha = State::create(['name' => 'Odisha']);
    $karnataka = State::create(['name' => 'Karnataka']);

    City::create(['name' => 'Bhubaneswar', 'state_id' => $odisha->id]);
    City::create(['name' => 'Cuttack', 'state_id' => $odisha->id]);

    City::create(['name' => 'Bangalore', 'state_id' => $karnataka->id]);
    City::create(['name' => 'Mysore', 'state_id' => $karnataka->id]);
    }
}
