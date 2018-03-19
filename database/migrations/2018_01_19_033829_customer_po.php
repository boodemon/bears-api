<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerPo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_po', function (Blueprint $table) {
            if(!Schema::hasColumn('customer_po','id')){
                $table->renameColumn('cp_no','id');
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE customer_po ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_po', function (Blueprint $table) {
            //
        });
    }
}
