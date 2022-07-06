<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Passenger::factory(10)->create();
    }
}
