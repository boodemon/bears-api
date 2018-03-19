<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseReciept extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_reciept', function (Blueprint $table) {
            if(!Schema::hasColumn('purchase_reciept','id')){
                $table->renameColumn('pr_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE purchase_reciept ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_reciept', function (Blueprint $table) {
            //
        });
    }
}
