<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    protected $table = 'order_headers';

    public static function fieldRows($row){
        return [
                'id'            => $row->id ,
                'po_no'         => $row->po_no ,
                'form_type'     => $row->form_type ,
                'form_name'     => $row->form_name ,
                'customer'      => $row->customer ,
                'po_date'       => $row->po_date ,
                'po_status'     => $row->po_status ,
                'po_staff'      => $row->po_staff ,
                'created_at'    => $row->created_at ,
                'updated_at'    => $row->updated_at
        ];
    }
}
