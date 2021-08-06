<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SettingSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            "alamat" => "Jl.Syekh Nurjati Wanasaba Kidul",
            "email" => "simasdi@gmail.com",
            "no_telepon" => "085314472422",
            "twitter" => "-",
            "facebook" => "-",
            "instagram" => "-",
            "whatsapp" => "-",
            "visi" => "-",
            "misi" => "-",
            "judul1" => "-",
            "kotak1" => "-",
            "judul2" => "-",
            "kotak2" => "-",
            "judul3" => "-",
            "kotak3" => "-",
            "judul4" => "-",
            "kotak4" => "-",
        ]);
    }
}
