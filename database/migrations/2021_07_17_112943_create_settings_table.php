<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            //kontak
            $table->string('alamat')->default('-');
            $table->string('email')->default('-');
            $table->string('no_telepon')->default('-');
            //sosial media
            $table->string('twitter')->default('-');
            $table->string('facebook')->default('-');
            $table->string('instagram')->default('-');
            $table->string('whatsapp')->default('-');
            //Visi dan Misi
            $table->string('visi')->default('-');
            $table->string('misi')->default('-');
            //Ayo ke masjid
            $table->string('judul1')->default('-');
            $table->string('kotak1')->default('-');
            $table->string('judul2')->default('-');
            $table->string('kotak2')->default('-');
            $table->string('judul3')->default('-');
            $table->string('kotak3')->default('-');
            $table->string('judul4')->default('-');
            $table->string('kotak4')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
