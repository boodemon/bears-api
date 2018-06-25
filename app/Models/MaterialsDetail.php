<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialsDetail extends Model
{
    protected $table = 'materials_details';

    public static function fieldRows($row,$sheet=[]){
        return [
            'id'            => $row->id,
            'head_id'       => $row->head_id,
            'sheet_head_id' => $row->sheet_head_id,
            'sheet_id'      => $row->sheet_id,
            'sheets'        => $sheet,
            'delivery'      => date('d M Y', strtotime( $row->delivery ) ),
            'quantity'      => $row->quantity,
            'created_at'    => date('Y-m-d H:i:s',strtotime( $row->created_at) ),
            'updated_at'    => date('Y-m-d H:i:s',strtotime( $row->updated_at) ),
        ];
    }
}
