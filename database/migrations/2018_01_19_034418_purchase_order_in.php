<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderIn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_in', function (Blueprint $table) {
            if(!Schema::hasColumn('purchase_order_in','id')){
                $table->renameColumn('in_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE purchase_order_in ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_in', function (Blueprint $table) {
            //
        });
    }
}
