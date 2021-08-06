<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateUserSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            "email" => "admin@test.com",
            "password" => '$2y$10$K60meps41IDjPEiJTyjX6uAREUSUW0V/tKMdMkc.4Mk61EMuSy8tK'
        ]);

        DB::table('users')->insert([
            'name' => 'Sekretaris',
            "email" => "sekretaris@test.com",
            "password" => '$2y$10$fpBF849h0P8UL1tvW2LtLO4SP/31q0Yg.79rMAkDNrnE1AfCv5ZOm'
        ]);
    }
}
