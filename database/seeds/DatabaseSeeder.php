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
		$specs = DB::table('model_spec')->groupBy('spec_no')->orderBy('id','desc')->get();
		if( $specs ){
			foreach( $specs as $spec){
				DB::table('model_spec')->where('id',$spec->id)->update(['model_daft' => 'Y']);
			}
		}
 	}
 }
