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
        if(!Schema::hasTable('order_headers')){
            Schema::rename('customer_po','order_headers');
            Schema::table('order_headers', function (Blueprint $table) {
                if(!Schema::hasColumn('order_headers','id')){
                    $table->renameColumn('cp_no','id');
                }
                if(!Schema::hasColumn('order_headers','form_type')){
                    $table->renameColumn('form_id','form_type');
                }
                $table->timestamps();
            });
        }
        DB::statement('ALTER TABLE order_headers ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_headers', function (Blueprint $table) {
            //
        });
    }
}
