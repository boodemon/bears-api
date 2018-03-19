<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\userUpdateRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rows = User::orderBy('mb_name')->get();
      return Response()->json($rows);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user 			    = new User;
        $user->mb_id        = $request->input('mb_id');
        $user->username     = $request->input('username');
        $user->password     = bcrypt( $request->input('password') );
        $user->mb_name 	    = $request->input('mb_name');
        $user->mb_position 	= $request->input('mb_position');
        $user->mb_marjor 	= $request->input('mb_marjor');
        $user->mb_tel 	    = $request->input('mb_tel');
        $user->mb_level 	= $request->input('mb_level');
        $user->mb_allow     = $request->input('active') != '' ? '0' : '1';
        $user->reg_date 	= date('Y-m-d H:i:s');
        if( $user->save() ){
            $result = [
                'result'    => 'successful',
                'code'      => 200,
                'data'      => $user
            ];
        }else{
            $result = [
                'result'    => 'error',
                'msg'       =>  'Cannot save user please try again',
                'code'      => 202  
            ];
        }

        return Response()->json( $result );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = User::where('id',$id)->first();
        if( $row ){
            $result = [
                'result' => 'successful',
                'data'  =>  $row
            ];
        }else{
            $result = [
                'result' => 'error',
                'msg'    => 'User not found!'
            ];
        }
        return Response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userUpdateRequest $request, $id)
    {
            $user = User::where('id',$id)->first();
            if( $user ){
                $user->mb_id        = $request->input('mb_id');
                $user->mb_name 	    = $request->input('mb_name');
                $user->mb_position 	= $request->input('mb_position');
                $user->mb_marjor 	= $request->input('mb_marjor');
                $user->mb_tel 	    = $request->input('mb_tel');
                $user->mb_level 	= $request->input('mb_level');
                $user->mb_allow     = $request->input('active') != '' ? '0' : '1';
                
                if($request->input('password') != ''){
                    $user->password = bcrypt( $request->input('password') );
                }

                $username 	= $user->username;
                
                if($request->input('username') != $username){
                    $c = User::where('username',$request->input('username'))->first();
                    if(!$c){
                        $user->username = $request->input('username');
                    }else{
                        $result = [
                            'result'    => 'error',
                            'code'      => 202,
                            'username'  => 'Error!! Username นี้ถูกใช้ไปก่อนหน้านี้แล้ว โปรดใช้ Username อื่น'
                        ];
                        return Response()->json( $result );
                    }
                }
                if( $user->save() ){
                    $result = [
                        'result' => 'successful',
                        'data'   => $user,
                        'code'   => 200
                    ];
                }
            }else{
                $result = [
                    'result'    => 'error',
                    'code'      => 202,
                    'msg'       => 'Error!! This user account not found. Please try again'
                ];
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = User::count();
        if( $id == 1 || $count == 1){
            $result = [
                'result'    => 'error',
                'code'      => 202,
                'msg'       => 'ไม่สามารถทำการลบได้ เนื่องจาก User นี้เป็น User หลักหรือท่านเหลือเพียง 1 User'
            ];
        }else{
            if( User::where('id',$id)->delete() ){
                $result = [
                    'result'    => 'successful',
                    'code'      => 200
                ];
            }else{
                $result = [
                    'result'    => 'error',
                    'msg'       => 'เกิดข้อผิดพลาดจากระบบไม่สามารถทำการลบข้อมูลได้ โปรดลองใหม่ภายหลัง',
                    'code'      => 200
                ];
    
            }
        }
        return Response()->json($result);
    }
}
