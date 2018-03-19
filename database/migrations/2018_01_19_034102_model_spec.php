<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModelSpec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('model_spec', function (Blueprint $table) {
            if(!Schema::hasColumn('model_spec','id')){
                $table->renameColumn('model_no','id');
            }
            if(!Schema::hasColumn('model_spec','model_daft')){
                $table->enum('model_daft',['N','Y']);
            }
            $table->timestamps();
        });
        DB::statement('ALTER TABLE model_spec ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_spec', function (Blueprint $table) {
            //
        });
    }
}
