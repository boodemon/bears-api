<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('head_id');
            $table->integer('sheet_head_id');
            $table->integer('sheet_id');
            $table->date('delivery');
            $table->integer('quantity');
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
        Schema::drop('materials_details');
    }
}
