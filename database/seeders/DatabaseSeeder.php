<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesSeder::class);
        $this->call(HewanKurbanSeeder::class);
        $this->call(CreateUserSeder::class);
        $this->call(SettingSeder::class);
        $this->call(RolesUserSeder::class);
    }
}
