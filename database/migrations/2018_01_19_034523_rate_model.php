<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RateModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rate_model', function (Blueprint $table) {
            if(!Schema::hasColumn('rate_model','id')){
                $table->renameColumn('rate_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE rate_model ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rate_model', function (Blueprint $table) {
            //
        });
    }
}
