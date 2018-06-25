<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\OrderHeader;
use App\Models\OrderSheet;
use App\Models\Spec;
use App\User;
use JWTAuth;
use Excel;
use PHPExcel;
use File;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = OrderHeader::orderBy('po_status','asc')
                            ->orderBy('po_date','desc')
                            ->orderBy('updated_at','desc')
                            ->paginate(500);
        $odata = [];
        if( $rows ){
            foreach( $rows as $row ){
                $odata['rows'][] = OrderHeader::fieldRows( $row );
                $odata['order_sheet'][$row->id] = OrderSheet::where('order_id',$row->id)->count();
            }
            $data = [
                'code' => 200,
                'data' => $odata['rows'],
                'sheets' => $odata['order_sheet']
            ];
        }else{ 
            $data = [
                'code' => 202,
                'data' => [],
                'sheets' => []
            ];
        }
        return response()->json( $data );
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
        //echo '<pre>', print_r( $request->all() ) ,'</pre>';
        $user = JWTAuth::toUser($request->input('token'));
        $header = new OrderHeader;
        if( $request->exists('header.po_no') )
        $header->po_no   = $request->input('header.po_no');

        if( $request->exists('header.customer') )
        $header->customer   = $request->input('header.customer');

        $header->form_name  = $request->input('header.name');
        $header->form_type  = $request->input('header.type');
        $header->po_status  = $request->input('header.status') == 1 ? 2:1;

        $header->po_staff   = $user->username;

        $header->po_date    = date('Y-m-d');
        $header->save();

        if( $request->input('detail') ){
            foreach( $request->input('detail') as $detail ){
                $this->detailRecord($detail,$header->id,$user);
            }
        }
        if( $header ){
            $data = [
                'code' => 200,
            ];
        }else {
            $data = [
                'code' => 202,
            ];
        }
        return response()->json($data);
    }

    public function detailRecord( $field,$head_id,$user ){
        $chk = OrderSheet::where('order_id',$head_id)
                            ->where('id',$field['sheet_id'] )
                            ->first();
        $spec = Spec::where('id',$field['spec_id'])->first();
        if( !$spec ) return false;

        $row = $chk ? $chk : new OrderSheet;
        $row->order_id          = $head_id;
        $row->spec_id           = $field['spec_id'];
        $row->order_prefix      = $field['order_prefix'];
        $row->order_number      = $field['order_number'];
        $row->ctc_code          = $field['quant'];
        $row->delivery          = $field['deli'];
        $row->quantity          = $field['quant'];
        $row->os_staff          = $user->username;

        $row->buckle            = $spec->buckle;
        $row->color             = $spec->color;
        $row->cylinder          = $spec->cylinder;
        $row->double_filler     = $spec->double_filler;
        $row->edge_thickness    = $spec->edge_thickness;
        $row->end_piece_inside  = $spec->end_piece_inside;
        $row->end_piece_outside = $spec->end_piece_outside;
        $row->eyelet            = $spec->eyelet;
        $row->filler            = $spec->filler;
        $row->kanmoto_thickness = $spec->kanmoto_thickness;
        $row->keeper            = $spec->keeper;
        $row->keeper_stich      = $spec->keeper_stich;
        $row->keeper_type       = $spec->keeper_type;
        $row->keeper_width      = $spec->keeper_width;
        $row->keeper2           = $spec->keeper2;
        $row->keeper2_stitch    = $spec->keeper2_stitch;
        $row->keeper2_type      = $spec->keeper2_type;
        $row->keeper2_width     = $spec->keeper2_width;
        $row->lining            = $spec->lining;
        $row->matal_part        = $spec->matal_part;
        $row->material          = $spec->material;
        $row->metal_keeper      = $spec->metal_keeper;
        $row->model_length      = $spec->model_length;
        $row->paint             = $spec->paint;
        $row->punch_hole_dia    = $spec->punch_hole_dia;
        $row->punch_hole_kensaki = $spec->punch_hole_kensaki;
        $row->punch_hole_length = $spec->punch_hole_length;
        $row->bijow_width       = $spec->bijow_width;
        $row->remarks           = $spec->remarks;
        $row->size_tip          = $spec->size_tip;
        $row->spec_no           = $spec->spec_no;
        $row->spring_bar        = $spec->spring_bar;
        $row->stamping          = $spec->stamping;
        $row->stitch            = $spec->stitch;
        $row->total_thickness   = $spec->total_thickness;
        $row->type              = $spec->type;
        $row->staff             = $user->username;
        $row->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $heads = OrderHeader::where('id',$id)->first();
        $sheetData = [];
        $sheets = OrderSheet::where('order_id',$id)->orderBy('order_prefix')
                                                ->orderBy('order_number')
                                                ->orderBy('updated_at')
                                                ->get();
        if( $sheets ){
            foreach( $sheets as $sheet ){
                $sheetData[] = OrderSheet::fieldRows( $sheet );
            }
        }
        if( $heads ){
            $data = [
                'data' => OrderHeader::fieldRows( $heads ),
                'sheets'=> $sheetData,
                'code' => 200
            ];
        }else{ 
            $data = [
                'data' => [],
                'sheets' => [],
                'code' => 202
            ];
        }
        return response()->json( $data );
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
    public function update(Request $request, $id)
    {
        //echo '<pre>UPDATE : ', print_r( $request->all() ) ,'</pre>';
        $user = JWTAuth::toUser($request->input('token'));
        $header = OrderHeader::where('id',$id)->first();
        if( $request->exists('header.po_no') )
        $header->po_no   = $request->input('header.po_no');

        if( $request->exists('header.customer') )
        $header->customer   = $request->input('header.customer');

        $header->form_name  = $request->input('header.name');
        $header->form_type  = $request->input('header.type');
        $header->po_staff   = $user->username;
        $header->po_status  = $request->input('header.status') == 1 ? 2:1;
        //$header->po_date    = date('Y-m-d');
        $header->save();

        if( $request->input('detail') ){
            foreach( $request->input('detail') as $detail ){
                $this->detailRecord($detail,$header->id,$user);
            }
        }
        if( $header ){
            $data = [
                'code' => 200,
            ];
        }else {
            $data = [
                'code' => 202,
            ];
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $ids = explode('-',$id);
        if( $request->input('type') == 'sheet'){
            if( OrderSheet::where('id',$id)->delete() ){
                $result = [
                    'result'    => 'successful',
                    'code'      => 200
                ];
            }else{
                $result = [
                    'result'    => 'error',
                    'msg'       => 'เกิดข้อผิดพลาดจากระบบไม่สามารถทำการลบข้อมูลได้ โปรดลองใหม่ภายหลัง',
                    'code'      => 204
                ];
    
            }
        }else{ 
            if( OrderHeader::whereIn('id',$ids)->delete() ){
                OrderSheet::whereIn('order_id',$ids)->delete();
                $result = [
                    'result'    => 'successful',
                    'code'      => 200
                ];
            }else{
                $result = [
                    'result'    => 'error',
                    'msg'       => 'เกิดข้อผิดพลาดจากระบบไม่สามารถทำการลบข้อมูลได้ โปรดลองใหม่ภายหลัง',
                    'code'      => 204
                ];
    
            }
        }
        return Response()->json($result);    
    }

    public function export($form='',$id = 0){
        $heads      = OrderHeader::where('id',$id)->first();
        $sheetData  = [];
        if( $heads ){
                $sheets     = OrderSheet::where('order_id',$id)->orderBy('order_prefix')
                                                        ->orderBy('order_number')
                                                        ->orderBy('updated_at')
                                                        ->get();
                if( $sheets ){
                    foreach( $sheets as $sheet ){
                        $sheetData[] = OrderSheet::fieldRows( $sheet );
                    }
                }
                $fields = @json_decode( json_encode( $sheetData ) );
                $xls 	= new PHPExcel();

                //echo '<pre>', print_r( $clm ) ,'</pre>';
                if( $form == 'order-card'){
                    $excel 	= 'public/documents/order-card-'. $heads->id .'.xlsx';
                    $i = 0;
                    $row = 1;
                    $clm = [
                            [
                                'A','B','C','D','E','F'
                            ],
                            [
                                'H','I','J','K','L','M'
                            ]
                            ];                    
                    $subject 	= 	'ORDER CARD';
                    include storage_path() . '/export-class/xls-header-a4-landscape.php';
                    include storage_path() . '/export-class/xls-order-card.php';
                }else{
                    $excel 	= 'public/documents/order-sheet-'. $heads->form_type .'-'. $heads->id .'.xlsx';
                    $subject 	= 	'ORDER SHEET ' . $heads->form_name;
                    include storage_path() . '/export-class/xls-header-legal-landscape.php';
                    if( $heads->form_type == 'coj')
                        include storage_path() . '/export-class/xls-form-coj.php';
                    if( $heads->form_type == 'ctc')
                        include storage_path() . '/export-class/xls-form-ctc.php';
                    if( $heads->form_type == 'standard')
                        include storage_path() . '/export-class/xls-form-standard.php';
                }
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
