<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Odisha
        |--------------------------------------------------------------------------
        */

        $odisha = State::where('name', 'Odisha')->first();

        City::create([
            'state_id' => $odisha->id,
            'name' => 'Bhubaneswar',
            'status' => true,
        ]);

        City::create([
            'state_id' => $odisha->id,
            'name' => 'Cuttack',
            'status' => true,
        ]);

        City::create([
            'state_id' => $odisha->id,
            'name' => 'Puri',
            'status' => true,
        ]);

        City::create([
            'state_id' => $odisha->id,
            'name' => 'Rourkela',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | West Bengal
        |--------------------------------------------------------------------------
        */

        $westBengal = State::where('name', 'West Bengal')->first();

        City::create([
            'state_id' => $westBengal->id,
            'name' => 'Kolkata',
            'status' => true,
        ]);

        City::create([
            'state_id' => $westBengal->id,
            'name' => 'Howrah',
            'status' => true,
        ]);

        City::create([
            'state_id' => $westBengal->id,
            'name' => 'Durgapur',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Karnataka
        |--------------------------------------------------------------------------
        */

        $karnataka = State::where('name', 'Karnataka')->first();

        City::create([
            'state_id' => $karnataka->id,
            'name' => 'Bangalore',
            'status' => true,
        ]);

        City::create([
            'state_id' => $karnataka->id,
            'name' => 'Mysore',
            'status' => true,
        ]);

        City::create([
            'state_id' => $karnataka->id,
            'name' => 'Mangalore',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Maharashtra
        |--------------------------------------------------------------------------
        */

        $maharashtra = State::where('name', 'Maharashtra')->first();

        City::create([
            'state_id' => $maharashtra->id,
            'name' => 'Mumbai',
            'status' => true,
        ]);

        City::create([
            'state_id' => $maharashtra->id,
            'name' => 'Pune',
            'status' => true,
        ]);

        City::create([
            'state_id' => $maharashtra->id,
            'name' => 'Nagpur',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Delhi
        |--------------------------------------------------------------------------
        */

        $delhi = State::where('name', 'Delhi')->first();

        City::create([
            'state_id' => $delhi->id,
            'name' => 'New Delhi',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | California
        |--------------------------------------------------------------------------
        */

        $california = State::where('name', 'California')->first();

        City::create([
            'state_id' => $california->id,
            'name' => 'Los Angeles',
            'status' => true,
        ]);

        City::create([
            'state_id' => $california->id,
            'name' => 'San Francisco',
            'status' => true,
        ]);

        City::create([
            'state_id' => $california->id,
            'name' => 'San Diego',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Texas
        |--------------------------------------------------------------------------
        */

        $texas = State::where('name', 'Texas')->first();

        City::create([
            'state_id' => $texas->id,
            'name' => 'Houston',
            'status' => true,
        ]);

        City::create([
            'state_id' => $texas->id,
            'name' => 'Dallas',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | New York
        |--------------------------------------------------------------------------
        */

        $newYork = State::where('name', 'New York')->first();

        City::create([
            'state_id' => $newYork->id,
            'name' => 'New York City',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | England
        |--------------------------------------------------------------------------
        */

        $england = State::where('name', 'England')->first();

        City::create([
            'state_id' => $england->id,
            'name' => 'London',
            'status' => true,
        ]);

        City::create([
            'state_id' => $england->id,
            'name' => 'Manchester',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Scotland
        |--------------------------------------------------------------------------
        */

        $scotland = State::where('name', 'Scotland')->first();

        City::create([
            'state_id' => $scotland->id,
            'name' => 'Edinburgh',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | New South Wales
        |--------------------------------------------------------------------------
        */

        $nsw = State::where('name', 'New South Wales')->first();

        City::create([
            'state_id' => $nsw->id,
            'name' => 'Sydney',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Victoria
        |--------------------------------------------------------------------------
        */

        $victoria = State::where('name', 'Victoria')->first();

        City::create([
            'state_id' => $victoria->id,
            'name' => 'Melbourne',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ontario
        |--------------------------------------------------------------------------
        */

        $ontario = State::where('name', 'Ontario')->first();

        City::create([
            'state_id' => $ontario->id,
            'name' => 'Toronto',
            'status' => true,
        ]);

        City::create([
            'state_id' => $ontario->id,
            'name' => 'Ottawa',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Quebec
        |--------------------------------------------------------------------------
        */

        $quebec = State::where('name', 'Quebec')->first();

        City::create([
            'state_id' => $quebec->id,
            'name' => 'Montreal',
            'status' => true,
        ]);
    }
}