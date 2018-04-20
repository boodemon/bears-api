<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $table = 'model_spec';

    public static function fieldRows($row){
        if( !$row )
            return false;
        return [
            'id'            => $row->id,
            'spec_no'       => @json_decode( $row->spec_no),
            'type'          => @json_decode( $row->type),
            'material'      => @json_decode( $row->material),
            'color'         => @json_decode( $row->color),
            'filler'        => @json_decode( $row->filler),
            'double_filler' => @json_decode( $row->double_filler),
            'lining'        => @json_decode( $row->lining),
            'linning_over'  =>  $row->linning_over,
            'linning_under' =>  $row->linning_under,
            'stitch'        => @json_decode( $row->stitch),
            'paint'         => @json_decode( $row->paint),
            'buckle'        => @json_decode( $row->buckle),
            'keeper'        => $row->keeper,
            'keeper_type'   => $row->keeper_type,
            'keeper_width'  => $row->keeper_width,
            'keeper_stich'  => $row->keeper_stich,
            'punch_hole_kensaki'=> $row->punch_hole_kensaki,
            'punch_hole_dia'    => $row->punch_hole_dia,
            'bijow_width'       => $row->bijow_width,
            'punch_hole_length' => $row->punch_hole_length,
            'size_tip'          => @json_decode( $row->size_tip),
            'model_length'      => @json_decode( $row->model_length),
            'total_thickness'   => @json_decode( $row->total_thickness),
            'kanmoto_thickness' => $row->kanmoto_thickness,
            'edge_thickness'    => $row->edge_thickness,
            'Quantity'          => @json_decode( $row->Quantity),
            'delivery'          => @json_decode( $row->delivery),
            'unit_price'        => @json_decode( $row->unit_price),
            'stamping'          => @json_decode( $row->stamping),
            'magic_qn'          => $row->magic_qn,
            'magic_qm'          => $row->magic_qm,
            'matal_part'        => @json_decode( $row->matal_part),
            'spring_bar'        => @json_decode( $row->spring_bar),
            'cylinder'          => @json_decode( $row->cylinder),
            'picture'           => $row->picture,
            'remarks'           => $row->remarks,
            'attachment'        => $row->attachment,
            'staff'             => $row->staff,
            'create_date'       => $row->create_date,
            'model_status'      => $row->model_status,
            'po_no'             => $row->po_no,
            'model_daft'        => $row->model_daft,
            'created_at'        => $row->created_at,
            'updated_at'        => $row->updated_at,
            
            'end_piece_inside'  => @json_decode( $row->end_piece_inside),
            'end_piece_outside' => @json_decode( $row->end_piece_outside),
            'eyelet'            => @json_decode( $row->eyelet),
            
            'keeper2'           => $row->keeper2,
            'keeper2_stitch'    => $row->keeper2_stitch,
            'keeper2_type'      => $row->keeper2_type,
            'keeper2_width'     => $row->keeper2_width,

            'metal_keeper'      => @json_decode( $row->metal_keeper),
        ];
    }
}
