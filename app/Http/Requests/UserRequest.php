<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
        {
            return [
                'username' 	=> 	'required|alpha_num|unique:users',
                'mb_name'		=> 	'required',
                'password'	=> 	'required'
            ];
        }
        
        public function messages(){
            return [
                'username.required' 	=> 	'กรุณาทำการป้อน Username',
                'username.alpha_num' 	=> 	'Username ต้องประกอบไปด้วย A-Z, a-z , 1-9 เที่านั้น ',
                'username.unique' 	    => 	'ชื่อผู้ใช้นี้ถูกใช้งานไปก่อนหน้านี้แล้ว',
                'mb_name.required'		    => 	'กรุณาป้อนชื่อ',
                'password.required'	    => 	'กรุณาป้อนรหัสผ่าน'
            ];
        }
}
