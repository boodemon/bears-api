<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attachment', function (Blueprint $table) {
            if(!Schema::hasColumn('attachment','id')){
                $table->renameColumn('att_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE attachment ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attachment', function (Blueprint $table) {
            //
        });
    }
}
