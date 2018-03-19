<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Making extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('making', function (Blueprint $table) {
            if(!Schema::hasColumn('making','id')){
                $table->renameColumn('mk_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE making ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('making', function (Blueprint $table) {
            //
        });
    }
}
