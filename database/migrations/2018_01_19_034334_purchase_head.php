<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseHead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_head', function (Blueprint $table) {
            if(!Schema::hasColumn('purchase_head','id')){
                $table->renameColumn('purchase_id','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE purchase_head ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_head', function (Blueprint $table) {
            //
        });
    }
}
