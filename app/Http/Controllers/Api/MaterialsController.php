<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\MaterialsHead;
use App\Models\MaterialsDetail;
use App\Models\OrderHeader;
use App\Models\OrderSheet;
use App\User;
use App\Lib;
use Auth;
use DB;
use Excel;
use PHPExcel;



class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = MaterialsHead::orderBy('status')
                                ->orderBy('created_at','desc')
                                ->paginate(54);
        $jdata = [];
        $user =  User::json() ;
        if( $rows ){
            foreach( $rows as $row ){
                $jdata[] = [
                    'created_at' => date('Y-m-d', strtotime( $row->created_at )),
                    'updated_at' => date('Y-m-d', strtotime( $row->updated_at )),
                    'id'         => $row->id,
                    'status'     => $row->status,
                    'user'       => $user[$row->user_id],
                    'user_id'   => $row->user_id,
                    'detail'    => MaterialsDetail::where('head_id',$row->id)->count()
                ];
            }
        }
        $data = [
            'code' => 200,
            'data' => $jdata
        ];
        return response()->json($data);

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
    public function store(Request $request)
    {
        //echo '<pre>',print_r($request->all() ),'</pre>';
        $user = JWTAuth::toUser($request->input('token'));
        $head = new MaterialsHead;
        $head->user_id = $user->id;
        $head->status = $request->input('head.status') ? 1 : 0;
        $head->save();
        $po_status = $request->input('head.status') ? 4 : 3;
        $sheet_status = $request->input('head.status') ? 2 : 1;

        if( $request->input('data') ){
            foreach( $request->input('data') as $field ){
                $detail = new MaterialsDetail;
                $detail->user_id = $user->id;
                $detail->head_id = $head->id;
                $detail->sheet_head_id = $field['head_id'];
                $detail->sheet_id = $field['sheet_id'];
                $detail->delivery = date('Y-m-d', strtotime( $field['delivery'] ) );
                $detail->quantity = $field['quantity'];
                if( !empty($field['sheet_id']) && !empty($field['delivery']) ){
                    $detail->save();
                    $sheet = OrderSheet::where('id',$field['sheet_id'])->first();
                    $sheet->status = $sheet_status;
                    $sheet->save();
                    OrderHeader::where('id',$sheet->order_id)->update([ 'po_status' => $po_status ]);
                }
            }
        }

        $data = [
            'code' => 200,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rows = MaterialsDetail::where('head_id',$id)->get();
        $head = MaterialsHead::where('id',$id)->first();
        $jdata = [];
        if( $rows ){
            foreach( $rows as $row ){
                $sheet = OrderSheet::where('id',$row->sheet_id)->first();
                $jdata[] = MaterialsDetail::fieldRows($row, OrderSheet::fieldRows( $sheet ) );
            }
        }
        $data = [
            'code' => 200,
            'head' => $head,
            'data' => $jdata
        ];
        return response()->json($data);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->onExport($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Lib::printR( $request->all() );
        $user = JWTAuth::toUser($request->input('token'));
        $head =  MaterialsHead::where('id',$id)->first();
        if( !$head ) return false;

        $head->user_id = $user->id;
        $head->status = $request->input('head.status') ? 1 : 0;
        $head->save();
        $po_status = $request->input('head.status') ? 4 : 3;
        $sheet_status = $request->input('head.status') ? 2 : 1;
        if( $request->input('data') ){
            foreach( $request->input('data') as $field ){
                $chk = MaterialsDetail::where('sheet_id',$field['sheet_id'])
                                        ->where('head_id',$head->id)
                                        ->first();

                $detail = $chk ? $chk : new MaterialsDetail;
                $detail->user_id = $user->id;
                $detail->head_id = $head->id;
                $detail->sheet_head_id = $field['head_id'];
                $detail->sheet_id = $field['sheet_id'];
                $detail->delivery = date('Y-m-d',strtotime( $field['delivery'] ) );
                $detail->quantity = $field['quantity'];
                if( !empty($field['sheet_id']) && !empty($field['delivery']) ){
                    $detail->save();
                    $sheet = OrderSheet::where('id',$field['sheet_id'])->first();
                    $sheet->status = $sheet_status;
                    $sheet->save();
                    OrderHeader::where('id',$sheet->order_id)->update(['po_status' => $po_status ]);
                }
            }
        }

        $data = [
            'code' => 200,
        ];
        return response()->json($data);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {   if( $request->input('type') == 'head'){
            $ids = explode('-',$id);
            foreach( $ids as $no => $id ){
            $head = MaterialsHead::where('id',$id)->first();
            if( $head ){
                $rows = MaterialsDetail::where('head_id',$id)->get();
                if( $rows ){
                    foreach( $rows as $row )
                    OrderSheet::where('id',$row->sheet_id)->update(['status'=>0]);
                    OrderHeader::where('id',$row->sheet_head_id)->update(['po_status'=>2]);
                    $row->delete();
                }
                $head->delete();
                $data = [
                    'code' => 200
                ];

            }else{
                $data = [
                    'code' => 401
                ];
            }
            }


        }
        if($request->input('type') == 'row'){
            $row = MaterialsDetail::where('id',$id)->first();
            if( $row ){
                OrderSheet::where('id',$row->sheet_id)->update(['status'=>0]);
                $row->delete();
                $data = [
                    'code' => 200
                ];
            }else{
                $data = [
                    'code' => 401
                ];
            }
        }
        return response()->json($data);
    }

    public function searchSpec(Request $request,$type='spec'){
        $term   = $request->input('term');
        $status = $request->exists('status') ? $request->input('status') : 2;
        $rows = DB::table('order_headers as head')
                    ->join('order_sheet as sheet','head.id','=','sheet.order_id')
                    ->select('head.id as head_id',
                            'head.created_at as created_head',
                            'head.updated_at as updated_head',
                            'head.*',
                            'sheet.id as sheet_id',
                            'sheet.created_at as created_sheet',
                            'sheet.updated_at as updated_sheet',
                            'sheet.*')
                    ->where('head.po_status', $status )
                    ->where('sheet.status',( $status == 2 ? 0 : 1 ));
        if( $type == 'spec'){
                $rows = $rows->where('sheet.spec_no','like','%' . $term .'%');
        }else{ 
            $rows = $rows->where( function($query) use ($term){
                $tx = explode('-',$term);
                $query->where('order_prefix','like','%'.$tx[0] .'%');
                if( count($tx) > 1 )
                    $query->where('order_number','like','%'. $tx[1].'%');
            })
            ->orderBy('sheet.order_prefix')
            ->orderBy('sheet.order_number');
        }
        $rows = $rows->skip(0)->take(20)
                    ->orderBy('sheet.spec_no')
                    ->get();
        $jdata = [];
        if( $rows ){
            foreach($rows as $row ){
                $jdata[] = [
                    'head_id'            => $row->head_id ,
                    'po_no'         => $row->po_no ,
                    'form_type'     => $row->form_type ,
                    'form_name'     => $row->form_name ,
                    'customer'      => $row->customer ,
                    'po_date'       => $row->po_date ,
                    'po_status'     => $row->po_status ,
                    'po_staff'      => $row->po_staff ,
                    'created_head'    => $row->created_head ,
                    'updated_head'    => $row->updated_head,


                    'sheet_id'                => $row->sheet_id ,
                    'order_id'          => $row->order_id ,
                    'order_prefix'      => $row->order_prefix ,
                    'order_number'      => $row->order_number ,
                    'ctc_code'          => $row->ctc_code ,
                    'delivery'          => $row->delivery ,
                    'quantity'          => $row->quantity ,
                    'os_staff'          => $row->os_staff ,
                    'spec_id'           => $row->spec_id ,
                    'spec_no'           => @json_decode( $row->spec_no),
                    'type'              => @json_decode( $row->type),
                    'material'          => @json_decode( $row->material),
                    'color'             => @json_decode( $row->color),
                    'filler'            => @json_decode( $row->filler),
                    'double_filler'     => @json_decode( $row->double_filler),
                    'lining'            => @json_decode( $row->lining),
                    'linning_over'      =>  $row->linning_over,
                    'linning_under'     =>  $row->linning_under,
                    'stitch'            => @json_decode( $row->stitch),
                    'paint'             => @json_decode( $row->paint),
                    'buckle'            => @json_decode( $row->buckle),
                    'keeper'            => $row->keeper,
                    'keeper_type'       => $row->keeper_type,
                    'keeper_width'      => $row->keeper_width,
                    'keeper_stich'      => $row->keeper_stich,
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
                    'created_sheet'        => $row->created_sheet ,
                    'updated_sheet'        => $row->updated_sheet ,
                ];
            }
        }
        $data = [
            'data' => $jdata,
            'code' => 200,
        ];
        return response()->json($data);
    }

    public function searchPo(Request $request){
        $term = $request->input('term');
        $status = $request->exists('status') ? $request->input('status') : 2;
        $rows = OrderHeader::where('po_no','like','%'. $term .'%')
                            ->where('po_no','!=','')
                            ->where('po_status', $status)
                            ->orderBy('po_no')->skip(0)->take(20)->get();
        $jdata = [];
        //echo 'resule '. count($rows ) .' search '. $term ;
        if($rows){
            foreach( $rows as $row ){
                $jdata[] = OrderHeader::fieldRows( $row );
            }
        }
        $data = [
            'data' => $jdata,
            'code' => 200,
        ];
        return response()->json($data);

    }

    public function onExport($id = 0){
        $head = MaterialsHead::where('id',$id)->first();
        if( $head ){
            $rows = MaterialsDetail::where('head_id',$id)->orderBy('id')->get();
            $xls 	= new PHPExcel();
            $excel 	= 'public/documents/materials-order-'. $id . time() .'.xlsx';
            include storage_path() . '/export-class/xls-header-legal-landscape.php';
			$subject 	= 	'Materials Order';
            include storage_path() . '/export-class/xls-materials-order.php';
            $data = [
                'code' => 200,
                'file' => asset( $excel )
            ];
        }else{ 
            $data = [
                'code' => 202,
                'file' => ''
            ];
        }
        return response()->json( $data );
    }
}