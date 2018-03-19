<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::rename('member','users');
            Schema::table('users', function ($table) {
                if(!Schema::hasColumn('users','id')){
                    $table->renameColumn('mb_no','id');
                }
                $table->rememberToken();
                $table->timestamps();
            });
        }else{
            Schema::table('users', function ($table) {
                if(!Schema::hasColumn('users','id')){
                    $table->renameColumn('mb_no','id');
                }
                $table->rememberToken();
                $table->timestamps();
            });
        }
        DB::statement('ALTER TABLE users ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            //
        });
    }
}
