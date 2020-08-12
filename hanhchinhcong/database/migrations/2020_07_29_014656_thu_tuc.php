<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThuTuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ThuTuc', function ($table) {
            $table->increments('id');
            $table->string('namethutuc');
            $table->integer('id_mathutuc');
            $table->integer('mucdo');
            $table->integer('id_malinhvuc');
            $table->string('linkform');
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
        Schema::drop('ThuTuc');
    }
}
