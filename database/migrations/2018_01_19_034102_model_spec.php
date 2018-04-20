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
            if(!Schema::hasColumn('model_spec','end_piece_inside')){
                $table->string('end_piece_inside');
            }
            if(!Schema::hasColumn('model_spec','end_piece_outside')){
                $table->string('end_piece_outside');
            }
            if(!Schema::hasColumn('model_spec','eyelet')){
                $table->string('eyelet');
            }
            if(!Schema::hasColumn('model_spec','keeper2')){
                $table->string('keeper2');
            }
            if(!Schema::hasColumn('model_spec','keeper2_stitch')){
                $table->string('keeper2_stitch');
            }
            if(!Schema::hasColumn('model_spec','keeper2_type')){
                $table->string('keeper2_type');
            }
            if(!Schema::hasColumn('model_spec','keeper2_width')){
                $table->string('keeper2_width');
            }
            if(!Schema::hasColumn('model_spec','metal_keeper')){
                $table->string('metal_keeper');
            }
            if(!Schema::hasColumn('model_spec','model_daft')){
                $table->enum('model_daft',['N','Y']);
            }
            if(!Schema::hasColumn('model_spec','created_at'))
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
