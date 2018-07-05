<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderSheet;
class PoDetail extends Model
{
    protected $table = 'po_details';

    public function scopeRef($query, $id){
        return $query->where('header_id',$id);
    }

    public static function fieldRows($row){
        return [
            'id'            => $row->id ,
            'header_id'     => $row->header_id ,
            'for_order'     => $row->for_order ,
            'for_model'     => $row->for_model ,
            'description'   => $row->description ,
            'kmg_date_required'         => $row->kmg_date_required ,
            'customer_date_required'    => $row->customer_date_required ,
            'quantity'          => $row->quantity ,
            'qty_unit'          => $row->qty_unit ,
            'unit_price_hk'     => $row->unit_price_hk ,
            'import_invoice'    => $row->import_invoice ,
            'onDate'            => $row->onDate ,
            'balance_quantity'  => $row->balance_quantity ,
            'user_id'           => $row->user_id ,
            'status'            => $row->status ,
            'ordersheet_id'     => $row->ordersheet_id ,
            'sheets'            => PoDetail::sheetRow($row->ordersheet_id ),
            'created_at'        => $row->created_at ,
            'updated_at'        => $row->updated_at ,
        ];
    }

    public static function sheetRow( $id ){
        $row = OrderSheet::where('id',$id)->first();
        return $row ? OrderSheet::fieldRows( $row ) : [];
    }
}
