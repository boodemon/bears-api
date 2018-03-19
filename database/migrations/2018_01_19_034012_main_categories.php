<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_categories', function (Blueprint $table) {
            if(!Schema::hasColumn('main_categories','id')){
                $table->renameColumn('mc_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE main_categories ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_categories', function (Blueprint $table) {
            //
        });
    }
}
