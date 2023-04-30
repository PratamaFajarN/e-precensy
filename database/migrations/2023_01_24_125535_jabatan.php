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
        Schema::create('jabatan', function (Blueprint $table) {

            $table->id('id_jabatan');

            $table->string('name_jabatan');
             $table->string('tunjangan');
              $table->string('sallary');
            $table->bigInteger('id_gaji')->unsigned()->index()->nullable();
              $table->foreign('id_gaji')->references('id_gaji')->on('gaji')->onDelete('cascade');
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
        Schema::dropIfExists('jabatan');
    }
};
