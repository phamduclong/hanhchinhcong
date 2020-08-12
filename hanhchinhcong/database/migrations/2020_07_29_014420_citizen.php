<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citizen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Citizen', function ($table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('name');
            $table->timestamp('date_of_birth')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('reason');
            $table->string('file');
            $table->string('block');
            $table->integer('id_hoso');
            $table->string('status_online')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('Citizen');
    }
}
