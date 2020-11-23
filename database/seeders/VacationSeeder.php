<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Vacation::factory(10)->create();
    }
}
