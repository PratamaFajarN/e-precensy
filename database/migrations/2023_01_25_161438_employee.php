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
         Schema::create('employee', function (Blueprint $table) {
            $table->id('id_employee');
            $table->string('name');
             $table->string('gender');
            $table->string('email')->unique();
            $table->bigInteger('id_jabatan')->unsigned()->index()->nullable();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
            $table->string('company');
            $table->string('jabatan');
            $table->string('alamat');
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
         Schema::dropIfExists('employee');
    }
};
