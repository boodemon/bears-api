<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function json(){
        $rows = User::orderBy('mb_name')
                    ->get();
        $json = [];
        if( $rows ){
            foreach( $rows as $row ){
                $json[$row->id] = [
                    'mb_id'         => $row->mb_id,
                    'username'      => $row->username,
                    'mb_name'       => $row->mb_name,
                    'mb_position'   => $row->mb_position,
                    'mb_marjor'     => $row->mb_marjor,
                    'mb_tel'        => $row->mb_tel,
                    'mb_level'      => $row->mb_level,
                    'mb_allow'      => $row->mb_allow,
                ];
            }
        }
        return  $json ;
    }
}
