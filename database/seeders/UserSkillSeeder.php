<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_skills')->insert([
            'user_id' => 1,
            'skill_id' => 1,
        ]);

        DB::table('users_skills')->insert([
            'user_id' => 1,
            'skill_id' => 2,
        ]);
    }
}
