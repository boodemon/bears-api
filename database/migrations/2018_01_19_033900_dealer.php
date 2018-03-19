<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dealer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealer', function (Blueprint $table) {
            if(!Schema::hasColumn('dealer','id')){
                $table->renameColumn('dealer_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE dealer ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer', function (Blueprint $table) {
            //
        });
    }
}
