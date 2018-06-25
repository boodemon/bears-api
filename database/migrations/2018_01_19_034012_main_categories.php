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
        if(!Schema::hasTable('categories')){
            Schema::rename('main_categories','categories');
            Schema::table('categories', function (Blueprint $table) {
                if(!Schema::hasColumn('categories','id')){
                    $table->renameColumn('mc_no','id');
                }
                if(!Schema::hasColumn('categories','ref_id')){
                    $table->integer('ref_id');
                }
                if(!Schema::hasColumn('categories','created_at'))
                    $table->timestamps();
            });
            DB::statement('ALTER TABLE categories ENGINE = InnoDB');
        }
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
