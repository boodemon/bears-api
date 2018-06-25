<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
		 $this->call(UsersTableSeeder::class);
		 $this->call(SpecModelSeeder::class);
		 $this->call(OrderHeaderSeeder::class);
		 $this->call(OrderSheetSeeder::class);
     }
 }

class UsersTableSeeder extends Seeder {
 	public function run(){
		DB::table('users')->update(['password' => bcrypt('123456')]);
		DB::table('users')->where('mb_level','Raw_Materials')->update(['mb_level' => 'spec-model']);
		DB::table('users')->where('mb_level','Stock')->update(['mb_level' => 'purchase']);
		DB::table('users')->where('mb_level','Shipping')->update(['mb_level' => 'export']);
		DB::table('users')->where('mb_level','Production')->update(['mb_level' => 'spec-model']);
		DB::table('users')->where('mb_level','Read_only')->update(['mb_level' => 'readonly']);
 	}
}

class SpecModelSeeder extends Seeder{
	public function run(){
		$specs = DB::table('model_spec')->orderBy('id','desc')->get();
		if( $specs ){
			foreach( $specs as $spec){
				$spNO = @json_decode( $spec->spec_no );
				$spRows = DB::table('model_spec')->where('spec_no','like','%'. $spNO->name .'%')
									->where('spec_no','like','%'. $spNO->descript .'%')
									->get();
				if($spRows ){
					$x=0;
					foreach( $spRows as $spRow){
						if( $x > 0 )
							DB::table('model_spec')->where('id',$spRow->id)->delete();
						$x++;
					}
				}
			}
		}
	}
}

class OrderHeaderSeeder extends Seeder{
	public function run(){
		$headers = DB::table('order_headers')->orderBy('id')->get();
		if( $headers ){
			foreach( $headers as $head ){
				$type = [
					'form_a'	=> 'standard',
					'form_coj' 	=> 'coj',
					'form_ctc' 	=> 'ctc',
				];
				$formType = $head->form_type;
				if( isset( $type[ $formType ] ) )
				DB::table('order_headers')->where('id',$head->id)->update([
					'form_type' => @$type[ $formType ],
					'created_at' => date('Y-m-d H:i:s',strtotime( $head->po_date ) ),
					'updated_at' => date('Y-m-d H:i:s',strtotime( $head->po_date ) )
					]);
				
				$ors = DB::table('order_sheet')->where('order_id',$head->id)->count();
				if( $ors == 0)
				DB::table('order_headers')->where('id',$head->id)->delete();
			}
		}
	}

}


class OrderSheetSeeder extends Seeder{
	public function run(){
		$orders = DB::table('order_sheet')->orderBy('id')->get();
		if( $orders ){
			foreach( $orders as $order ){
				$ex = explode('-',$order->order_prefix);
				if( count($ex) > 1 ){
					DB::table('order_sheet')->where('id',$order->id)
							->update([
								'order_prefix' => @$ex[0],
								'order_number' => @$ex[1]
							]);
				}
				$spec = DB::table('model_spec')->where('id',$order->spec_id)->first();
				if( $spec ){
						DB::table('order_sheet')->where('id',$order->id)->update([
						'type'            => $spec->type,
						'buckle'            => $spec->buckle,
						'color'             => $spec->color,
						'cylinder'          => $spec->cylinder,
						'double_filler'     => $spec->double_filler,
						'edge_thickness'    => $spec->edge_thickness,
						'end_piece_inside'  => $spec->end_piece_inside,
						'end_piece_outside' => $spec->end_piece_outside,
						'eyelet'            => $spec->eyelet,
						'filler'            => $spec->filler,
						'kanmoto_thickness' => $spec->kanmoto_thickness,
						'keeper'            => $spec->keeper,
						'keeper_stich'      => $spec->keeper_stich,
						'keeper_type'       => $spec->keeper_type,
						'keeper_width'      => $spec->keeper_width,
						'keeper2'           => $spec->keeper2,
						'keeper2_stitch'    => $spec->keeper2_stitch,
						'keeper2_type'      => $spec->keeper2_type,
						'keeper2_width'     => $spec->keeper2_width,
						'lining'            => $spec->lining,
						'matal_part'        => $spec->matal_part,
						'material'          => $spec->material,
						'metal_keeper'      => $spec->metal_keeper,
						'model_length'      => $spec->model_length,
						'paint'             => $spec->paint,
						'magic_qm'          => $spec->magic_qm,
						'magic_qn'          => $spec->magic_qn,

						'punch_hole_dia'    => $spec->punch_hole_dia,
						'punch_hole_kensaki'=> $spec->punch_hole_kensaki,
						'punch_hole_length' => $spec->punch_hole_length,
						'bijow_width'       => $spec->bijow_width,
						'remarks'           => $spec->remarks,
						'size_tip'          => $spec->size_tip,
						'spec_no'           => $spec->spec_no,
						'spring_bar'        => $spec->spring_bar,
						'stamping'          => $spec->stamping,
						'stitch'            => $spec->stitch,
						'total_thickness'   => $spec->total_thickness,
						'created_at'		=> date('Y-m-d H:i:s'),
						'updated_at'		=> date('Y-m-d H:i:s')
						]);
				}else{ 
					DB::table('order_sheet')->where('id', $order->id )->delete();
				}
			}
		}
	}
}
