<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('gaji', function (Blueprint $table) {

            $table->id('id_gaji');
            $table->integer('gaji_pokok');
             $table->integer('bonus');
             $table->integer('tunjangan');
             $table->integer('lembur');
             $table->integer('tunjangan_kesehatan');
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
        Schema::dropIfExists('gaji');
    }
};
