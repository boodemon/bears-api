<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('header_id');
            $table->string('for_order',40);
            $table->string('for_model',40);
            $table->string('description');
            $table->date('kmg_date_required');
            $table->date('customer_date_required');
            $table->integer('quantity');
            $table->string('qty_unit',40);
            $table->double('unit_price_hk',[8,2]);
            $table->string('import_invoice',40);
            $table->date('onDate');
            $table->integer('balance_quantity');
            $table->integer('user_id');
            $table->integer('status');
            $table->integer('ordersheet_id');
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
        Schema::drop('po_details');
    }
}
