<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | India
        |--------------------------------------------------------------------------
        */

        $india = Country::where('name', 'India')->first();

        State::create([
            'country_id' => $india->id,
            'name' => 'Odisha',
            'status' => true,
        ]);

        State::create([
            'country_id' => $india->id,
            'name' => 'West Bengal',
            'status' => true,
        ]);

        State::create([
            'country_id' => $india->id,
            'name' => 'Karnataka',
            'status' => true,
        ]);

        State::create([
            'country_id' => $india->id,
            'name' => 'Maharashtra',
            'status' => true,
        ]);

        State::create([
            'country_id' => $india->id,
            'name' => 'Delhi',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | United States
        |--------------------------------------------------------------------------
        */

        $usa = Country::where('name', 'United States')->first();

        State::create([
            'country_id' => $usa->id,
            'name' => 'California',
            'status' => true,
        ]);

        State::create([
            'country_id' => $usa->id,
            'name' => 'Texas',
            'status' => true,
        ]);

        State::create([
            'country_id' => $usa->id,
            'name' => 'New York',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | United Kingdom
        |--------------------------------------------------------------------------
        */

        $uk = Country::where('name', 'United Kingdom')->first();

        State::create([
            'country_id' => $uk->id,
            'name' => 'England',
            'status' => true,
        ]);

        State::create([
            'country_id' => $uk->id,
            'name' => 'Scotland',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Australia
        |--------------------------------------------------------------------------
        */

        $australia = Country::where('name', 'Australia')->first();

        State::create([
            'country_id' => $australia->id,
            'name' => 'New South Wales',
            'status' => true,
        ]);

        State::create([
            'country_id' => $australia->id,
            'name' => 'Victoria',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Canada
        |--------------------------------------------------------------------------
        */

        $canada = Country::where('name', 'Canada')->first();

        State::create([
            'country_id' => $canada->id,
            'name' => 'Ontario',
            'status' => true,
        ]);

        State::create([
            'country_id' => $canada->id,
            'name' => 'Quebec',
            'status' => true,
        ]);
    }
}