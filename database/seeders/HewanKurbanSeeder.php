<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class HewanKurbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_hewans')->insert([
            "type" => "Sapi Super",
            "harga" => "4500000",
            "user_id" => 1
        ]);

        DB::table('type_hewans')->insert([
            'type' => 'Sapi Sedang',
            "harga" => "4000000",
            "user_id" => 1
        ]);
        DB::table('type_hewans')->insert([
            'type' => 'Sapi Biasa',
            "harga" => "3500000",
            "user_id" => 1
        ]);

        DB::table('type_hewans')->insert([
            'type' => 'Kambing',
            "harga" => "3500000",
            "user_id" => 1
        ]);

        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 100; $i++) {
        //     DB::table('sohibul_kurbans')->insert([
        //         'nama' => $faker->name,
        //         'alamat' => $faker->address,
        //         'no_telepon' => $faker->phoneNumber,
        //         'user_id' => $faker->randomElements(['1', '2'])[0],
        //         'type_hewan_id' => $faker->randomElements(['1', '2', '3', '4'])[0],
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //     ]);
        // }
    }
}
