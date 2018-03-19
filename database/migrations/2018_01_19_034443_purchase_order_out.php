<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderOut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_out', function (Blueprint $table) {
            if(!Schema::hasColumn('purchase_order_out','id')){
                $table->renameColumn('po_id','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE purchase_order_out ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_out', function (Blueprint $table) {
            //
        });
    }
}
