<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_sheet', function (Blueprint $table) {
            if(!Schema::hasColumn('order_sheet','id')){
                $table->renameColumn('os_no','id');
            }
            if(!Schema::hasColumn('order_sheet','order_id')){
                $table->renameColumn('cp_no','order_id');
            }
            if(!Schema::hasColumn('order_sheet','spec_id')){
                $table->renameColumn('model_no','spec_id');
            }
            if(!Schema::hasColumn('order_sheet','order_prefix')){
                $table->renameColumn('order_code','order_prefix');
            }
            if(!Schema::hasColumn('order_sheet','delivery')){
                $table->renameColumn('os_delivery','delivery');
            }
            if(!Schema::hasColumn('order_sheet','quantity')){
                $table->renameColumn('qty','quantity');
            }
            if(!Schema::hasColumn('order_sheet','spec_no')){
                $table->integer('order_number');
                $table->mediumText('spec_no');
                $table->mediumText('type');
                $table->mediumText('material');
                $table->mediumText('color');
                $table->mediumText('filler');
                $table->mediumText('double_filler');
                $table->mediumText('lining');
                $table->mediumText('linning_over');
                $table->mediumText('linning_under');
                $table->mediumText('stitch');
                $table->mediumText('paint');
                $table->mediumText('buckle');
                $table->mediumText('keeper');
                $table->mediumText('keeper_type');
                $table->mediumText('keeper_width');
                $table->mediumText('keeper_stich');
                $table->mediumText('punch_hole_kensaki');
                $table->mediumText('punch_hole_dia');
                $table->mediumText('bijow_width');
                $table->mediumText('punch_hole_length');
                $table->mediumText('size_tip');
                $table->mediumText('model_length');
                $table->mediumText('total_thickness');
                $table->mediumText('kanmoto_thickness');
                $table->mediumText('edge_thickness');
                $table->mediumText('unit_price');
                $table->mediumText('stamping');
                $table->string('magic_qn',10);
                $table->string('magic_qm',10);
                $table->mediumText('matal_part');
                $table->mediumText('spring_bar');
                $table->mediumText('cylinder');
                $table->mediumText('picture');
                $table->mediumText('remarks');
                $table->mediumText('attachment');
                $table->mediumText('staff');
                $table->mediumText('create_date');
                $table->mediumText('model_status');
                $table->mediumText('po_no');
                $table->mediumText('model_daft');
                
                $table->mediumText('end_piece_inside');
                $table->mediumText('end_piece_outside');
                $table->mediumText('eyelet');        
                
                $table->mediumText('keeper2');          
                $table->mediumText('keeper2_stitch');   
                $table->mediumText('keeper2_type');     
                $table->mediumText('keeper2_width');    
                $table->mediumText('metal_keeper');     
            }

            $table->integer('status');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE order_sheet ENGINE = InnoDB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_sheet', function (Blueprint $table) {
            //
        });
    }
}
