<?php

namespace App\Models;
use App\Models\PoDetail as Detail;
use Illuminate\Database\Eloquent\Model;

class PoHeader extends Model
{
    protected $table = 'po_headers';

    public static function fieldRows($row){
        return [
                'id'            => $row->id ,
                'no'            => $row->no ,
                'to'            => $row->to ,
                'onDate'        => $row->onDate ,
                'user_id'       => $row->user_id,
                'status'        => $row->status ,
                'created_at'    => $row->created_at ,
                'detail'        => PoHeader::detailRows( $row->id ),
                'updated_at'    => $row->updated_at,
        ];
    }

    public static function detailRows($id){
        $rows = Detail::ref($id)->orderBy('for_order')
                                ->orderBy('for_model')
                                ->get();
        $data = [];
        if( $rows ){
            foreach( $rows as $row ){
                $data[] = Detail::fieldRows( $row );
            }
        }
        return $data;
    }   

}
