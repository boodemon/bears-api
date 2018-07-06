<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Request as Req;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\OrderHeader;
use App\Models\OrderSheet;
use App\Models\PoHeader;
use App\Models\PoDetail;
use App\User;
use App\Lib;
use Auth;
use DB;
use Excel;
use PHPExcel;
use JWTAuth;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $token = Req::input('token');
        $this->user  = JWTAuth::toUser( Req::input('token') );
    }
    public function index(Request $request)
    {
        $jdata = [];
        $rows = PoHeader::orderBy('status');
        if( !empty( $request->input('keywords') ) ){
            $rows = $rows->where(function($query) use ($request){
                $keys = explode(' ', $request->input('keywords') );
                $field = $request->input('field');
                foreach( $keys as $idx => $key ){
                    $query->where( $field ,'like','%' . $key .'%') ;
                }
            });
        }
        if( $request->input('onStart') ){
            $between    = [
                            $this->ymd( $request->input('onStart') ), 
                            $this->ymd( $request->input('onEnd') )
                         ];
            $rows       = $rows->whereBetween('onDate',$between)->orderBy('created_at');
        }
                
        $rows = $rows->orderBy('onDate','DESC')
                        ->orderBy('no')
                        ->orderBy('to')
                        ->paginate(500);
        if( $rows ){
            foreach( $rows as $row ){
                $jdata[] = PoHeader::fieldRows( $row );
            }
        }
        $data = [
            'code' => 200,
            'data' => $jdata,
            'cpage' => $rows->currentPage(),
            'lpage' => $rows->lastPage()
        ];
        return response()->json($data);
    }
    public function ymd($date = ''){
        if( $date == '' ) return false;
        return date('Y-m-d',strtotime($date) );
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
        //Lib::printR($request->all());
        $head = new PoHeader;
        $head->no = $request->input('head.no');
        $head->to = $request->input('head.to');
        $head->onDate = date('Y-m-d', strtotime( $request->input('head.dated_at') ) );
        $head->status = $request->input('head.status') ? 1 : 0;
        $head->user_id = $this->user->id;
        $head->save();
        $po_status      = $request->input('head.status') ? 6 : 5;
        $sheet_status   = $request->input('head.status') ? 4 : 3;
        if( $request->input('data') ){
            foreach( $request->input('data') as $field ){
                $detail = new PoDetail;
                $detail->header_id          = $head->id;
                $detail->for_order          = $field['for_order'];
                $detail->for_model          = $field['for_model'];
                $detail->description        = $field['description'];
                if( $field['kmg_date_required'] )
                $detail->kmg_date_required  = date('Y-m-d', strtotime( $field['kmg_date_required'] ) );
                if( $field['customer_date_required'] )
                $detail->customer_date_required = date('Y-m-d', strtotime( $field['customer_date_required'] ) );
                if( $field['quantity'] )
                $detail->quantity       = $field['quantity'];
                $detail->qty_unit       = $field['qty_unit'];
                if( $field['unit_price_hk'] )
                $detail->unit_price_hk  = $field['unit_price_hk'];
                if( $field['import_invoice'] )
                $detail->import_invoice = $field['import_invoice'];
                if( $field['onDate'] )
                $detail->onDate = date('Y-m-d', strtotime( $field['onDate'] ) );
                if( $field['balance_quantity'] )
                $detail->balance_quantity = $field['balance_quantity'];
                $detail->user_id        = $this->user->id;
                $detail->status         = $head->status;
                $detail->ordersheet_id  = $field['sheet_id'];
                if( $detail->save() ){
                    $sheet = OrderSheet::where('id',$field['sheet_id'])->first();
                    $sheet->status = $sheet_status;
                    $sheet->save();
                    OrderHeader::where('id',$sheet->order_id)->update([ 'po_status' => $po_status ]);
                }
            }
        }
        if( $head ){
            $data = [
                'code' => 200
            ];
        }else{ 
            $data = [
                'code' => 402
            ];
        }
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
        $row = PoHeader::where('id',$id)->first();
        $jdata = [];
        if( $row ){
            $data = [
                'code' => 200,
                'data' => PoHeader::fieldRows( $row )
            ];
        }else{ 
            $data = [
                'code' => 402,
                'data' => []
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
        $head =  PoHeader::where('id',$id)->first();
        if(!$head) return response()->json(['code'=> 402]);

        $head->no = $request->input('head.no');
        $head->to = $request->input('head.to');
        $head->onDate = date('Y-m-d', strtotime( $request->input('head.dated_at') ) );
        $head->status = $request->input('head.status') ? 1 : 0;
        $head->user_id = $this->user->id;
        $head->save();
        $po_status      = $request->input('head.status') ? 6 : 5;
        $sheet_status   = $request->input('head.status') ? 4 : 3;
        if( $request->input('data') ){
            foreach( $request->input('data') as $field ){
                $chk = PoDetail::where('ordersheet_id',$field['sheet_id'])
                               // ->where('header_id',$id)
                                ->first();
                $detail = $chk ? $chk : new PoDetail;
                $detail->header_id          = $head->id;
                $detail->for_order          = $field['for_order'];
                $detail->for_model          = $field['for_model'];
                $detail->description        = $field['description'];
                if( $field['kmg_date_required'] )
                $detail->kmg_date_required  = date('Y-m-d', strtotime( $field['kmg_date_required'] ) );
                if( $field['customer_date_required'] )
                $detail->customer_date_required = date('Y-m-d', strtotime( $field['customer_date_required'] ) );
                if( $field['quantity'] )
                $detail->quantity       = $field['quantity'];
                $detail->qty_unit       = $field['qty_unit'];
                if( $field['unit_price_hk'] )
                $detail->unit_price_hk  = $field['unit_price_hk'];
                if( $field['import_invoice'] )
                $detail->import_invoice = $field['import_invoice'];
                if( $field['onDate'] )
                $detail->onDate = date('Y-m-d', strtotime( $field['onDate'] ) );
                if( $field['balance_quantity'] )
                $detail->balance_quantity = $field['balance_quantity'];
                $detail->user_id        = $this->user->id;
                $detail->status         = $head->status;
                $detail->ordersheet_id  = $field['sheet_id'];
                if( $detail->save() ){
                    $sheet = OrderSheet::where('id',$field['sheet_id'])->first();
                    $sheet->status = $sheet_status;
                    $sheet->save();
                    OrderHeader::where('id',$sheet->order_id)->update([ 'po_status' => $po_status ]);
                }
            }
        }    
        if( $head ){
            $data = [
                'code' => 200
            ];
        }else{ 
            $data = [
                'code' => 402
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
    public function destroy($id)
    {
        $type = Req::input('type');
        $data = ['code' => 404 ];
        if( $type == 'row'){
            $row = PoDetail::where('id',$id)->first();
            $sheet = OrderSheet::where('id',$row->sheet_id)->update(['status' => 2]);
            if( $row->delete() ){
                $data = [
                    'code' => 200
                ];
            }else{
                $data = [
                    'code' => 402
                ];
            }
        }

        if( $type == 'head'){
            $ids = explode('-',$id);
            foreach( $ids as $no => $id ){
                $head = PoHeader::where('id',$id)->first();
                if( $head ){
                    $rows = PoDetail::where('header_id',$id)->get();
                    if( $rows ){
                        foreach( $rows as $row ){
                            $sheet = OrderSheet::where('id',$row->ordersheet_id )->first();
                            $sheet->status = 2;
                            $sheet->save();
                            OrderHeader::where('id',$sheet->order_id)->update([ 'po_status' => 4 ]);
                        }
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

        return response()->json($data);
    }
    public function onExport($id = 0){
        $head = PoHeader::where('id',$id)->first();
        if( $head ){
            $rows = @json_decode( json_encode( PoHeader::fieldRows( $head ) ) );
            $xls 	= new PHPExcel();
            $excel 	= 'public/documents/materials-po-'. $id . date('YmdHis') .'.xlsx';
            include storage_path() . '/export-class/xls-header-legal-landscape.php';
			$subject 	= 	'Materials PO';
            include storage_path() . '/export-class/xls-materials-po.php';
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
