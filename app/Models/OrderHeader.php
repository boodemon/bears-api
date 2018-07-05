<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderSheet;
class OrderHeader extends Model
{
    protected $table = 'order_headers';

    public static function fieldRows($row){
        if( !$row ) return false;
        return [
                'id'            => $row->id ,
                'po_no'         => $row->po_no ,
                'form_type'     => $row->form_type ,
                'form_name'     => $row->form_name ,
                'customer'      => $row->customer ,
                'po_date'       => $row->po_date ,
                'po_status'     => $row->po_status ,
                'po_staff'      => $row->po_staff ,
                'sheets'        => OrderHeader::detailFieldRows( $row->id ),
                'created_at'    => $row->created_at ,
                'updated_at'    => $row->updated_at
        ];
    }

    public static function detailFieldRows($id){
        $rows = OrderSheet::where('order_id',$id)
                            ->orderBy('order_prefix')
                            ->orderBy('order_number')
                            ->get();
        $data = [];
        if( $rows ){
            foreach( $rows as $row ){
                $data[] = OrderSheet::fieldRows( $row );
            }
        }
        return $data;
    }
}
