<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_sheet', function (Blueprint $table) {
            if(!Schema::hasColumn('order_sheet','id')){
                $table->renameColumn('os_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE order_sheet ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_sheet', function (Blueprint $table) {
            //
        });
    }
}
