<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoSo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('HoSo', function ($table) {
            $table->increments('id');
            $table->string('namecitizen');
            $table->timestamp('date_of_birth')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('reason');
            $table->string('file');
            $table->string('status');
            $table->integer('id_mathutuc');
            $table->integer('id_hoso');
            $table->string('note')->nullable();
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
        Schema::drop('HoSo');
    }
}
