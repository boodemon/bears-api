<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('table', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        */
        if(Schema::hasTable('attachment'))
            Schema::drop('attachment');
        if(Schema::hasTable('making'))
            Schema::drop('making');
        if(Schema::hasTable('order_status'))
            Schema::drop('order_status');
        if(Schema::hasTable('product'))
            Schema::drop('product');
        if(Schema::hasTable('purchase_order_in'))
            Schema::drop('purchase_order_in');
        if(Schema::hasTable('purchase_order_out'))
            Schema::drop('purchase_order_out');
        if(Schema::hasTable('purchase_reciept'))
            Schema::drop('purchase_reciept');
        if(Schema::hasTable('rate_model'))
            Schema::drop('rate_model');
        if(Schema::hasTable('sub_categories'))
            Schema::drop('sub_categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('table');
    }
}
