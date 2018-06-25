<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Request as Req;
use App\Http\Requests;
use JWTAuth;
use Excel;
use PHPExcel;
use File;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\Spec;

class SpecController extends Controller
{
    public function index()
    {
        if((Req::exists('field') || Req::exists('keywords')) && Req::input('keywords') != ''){
            $rows = Spec::where(Req::input('field'),'like','%'. Req::input('keywords') .'%')
            ->orderBy('create_date','desc')->paginate(100);
        }else {
            $rows = Spec::orderBy('create_date','desc')->paginate(100);
        }
        
        $json = [];
        if( $rows ){
            foreach( $rows as $row ){
                $json[] = $this->json($row);
            }
        }
        $data = [
            'code' => 200,
            'data' => $json,
            'cpage' => $rows->currentPage(),
            'lpage' => $rows->lastPage()
        ];
        return response()->json($data);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $chk = Spec::where('spec_no','like','%"name":"'. $request->input('spec.name') .'"%')
        //            ->where('spec_no','like','%"descript":"'. $request->input('spec.descript') .'"%')
                    ->orderBy('id','desc')
                    ->first();
        $row = $chk ? $chk : new Spec;
        if( !$chk )
        $row->create_date = date('Y-m-d H:i:s');
        $this->fieldPost($row,$request);
        if( $row->save() ){
            $data = [
                'code'  => 200,
                'msg'   => $chk ? 'Update Spec model success full' : 'Add new Spec Model Success full'
            ];
        }else{ 
            $data = [
                'code' => 202,
                'msg'   => 'Error!! Cannot save Spec model. Please try again'
            ];
        }
        return response()->json($data);
    }

    public function fieldPost($row, $request){
        $user = JWTAuth::toUser( $request->input('token') );
        //echo '<pre>',print_r( $request->all() ) ,'</pre>';
        $eyelet = [
            'id'        => $request->input('eyelet.id'),
            'name'      => $request->input('eyelet.name'),
            'descript'  => $request->input('eyelet.descript'),
            'rate'      => $request->input('eyelet.rate')
        ];

        $row->buckle            = json_encode( $request->input('buckle') );
        $row->color             = json_encode( $request->input('color')  );
        $row->cylinder          = json_encode( $request->input('cylinder') );
        $row->double_filler     = json_encode( $request->input('double_filler') );
        $row->edge_thickness    = $request->input('edge_thickness');
        $row->end_piece_inside  = json_encode( $request->input('end_piece_inside') );
        $row->end_piece_outside = json_encode( $request->input('end_piece_outside') );
        $row->eyelet            = json_encode( $eyelet );
        $row->filler            = json_encode( $request->input('filler') );
        $row->kanmoto_thickness = $request->input('kanmoto_thickness');
        $row->keeper            = $request->input('keeper');
        $row->keeper_stich      = $request->input('keeper_stitch');
        $row->keeper_type       = $request->input('keeper_type');
        $row->keeper_width      = $request->input('keeper_width');
        $row->keeper2           = $request->input('keeper2');
        $row->keeper2_stitch    = $request->input('keeper2_stitch');
        $row->keeper2_type      = $request->input('keeper2_type');
        $row->keeper2_width     = $request->input('keeper2_width');
        $row->lining            = json_encode( $request->input('lining') );
        $row->matal_part        = json_encode( $request->input('matal_part') );
        $row->material          = json_encode( $request->input('material') );
        $row->metal_keeper      = json_encode( $request->input('metal_keeper') );
        $row->model_length      = json_encode( $request->input('model_length') );
        $row->paint             = json_encode( $request->input('paint') );
        $row->punch_hole_dia    = $request->input('punch_hole_dia');
        $row->punch_hole_kensaki = $request->input('punch_hole_kensaki');
        $row->punch_hole_length = $request->input('punch_hole_length');
        $row->bijow_width       = $request->input('punch_hole_width');
        $row->remarks           = $request->input('remarks');
        $row->magic_qm          = $request->input('eyelet.magic_qm');
        $row->magic_qn          = $request->input('eyelet.magic_qn');
        $row->size_tip          = json_encode( $request->input('size_tip') );
        $row->spec_no           = json_encode( $request->input('spec') );
        $row->spring_bar        = json_encode( $request->input('spring_bar') );
        $row->stamping          = json_encode( $request->input('stamping') );
        $row->stitch            = json_encode( $request->input('stitch') );
        $row->total_thickness   = json_encode( $request->input('total_thickness') );
        $row->type              = json_encode( $request->input('type') );
        $row->staff             = $user->username;

        //echo '<pre>Row => ', print_r( $row ) ,'</pre>';
        /*
        $arr = json_encode([
            'id'        => '',
            'name'      => '',
            'descript'  => '',
            'rate'      => ''
        ]);

        $row->delivery = $arr;
        $row->linning_over = $arr;
        $row->linning_under = $arr;
        $row->Quantity = $arr;
        $row->unit_price = $arr;
        $row->magic_qn = '';
        $row->magic_qm = '';
        $row->picture = '';
        $row->attachment = '';
        */
        
    }
    public function show($id)
    {
        $row = Spec::where('id',$id)->first();
        $json = [];
        if( $row ){
            $json[] = $this->json($row);
            $data = [
                'data'  => $json,
                'code'  => 200
            ];
        }else{ 
            $data = [
                'data'  => false,
                'code'  => 202
            ];
        }
        return response()->json($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $row = Spec::where('id',$id)->first();
        $this->fieldPost($row,$request);
        if( $row->save() ){
            $data = [
                'code'  => 200,
                'msg'   => 'Update Spec model success full'
            ];
        }else{ 
            $data = [
                'code' => 202,
                'msg'   => 'Error!! Cannot save Spec model. Please try again'
            ];
        }
        return response()->json($data);
    }

    public function destroy($id)
    {
        $ids = explode('-',$id);
 
            if( Spec::whereIn('id',$ids)->delete() ){
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
        return Response()->json($result);
    }

    public function json($row){
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

    public function onSearch(Request $request){
        //echo '<pre>',print_r($request->all() ),'</pre>';
        $term = strtoupper( Req::input('term') );
        $field = $request->input('fields');
        $rows = Spec::where( $field ,'like','%'. $term .'%')
                        ->skip(0)->take(10)
                        ->orderBy('spec_no')->get();
        $sdata = [];
        $fdata = [];
        if( $rows ){
            foreach( $rows as $row){
                $rowData = $this->json( $row );
                //echo '<pre>',print_r( $rowData['spec_no'] ),'</pre>';
                //echo 'spec_no = '. $rowData['spec_no']->name .'<br>';
                $fieldVal = @$rowData[$field]->name;
                if( strpos(strtoupper( $fieldVal ),$term) !== false ){
                    if( !in_array($fieldVal,$fdata)){
                        $sdata[] = $rowData;
                        $fdata[] = $fieldVal;
                    }
                }
                
            }
        }
        $data = [
            'data' => $sdata,
            'code' => 200,
        ];
        return response()->json($data);    
    }

    public function search(){
        $term = strtoupper( Req::input('term') );
        $rows = Spec::where('spec_no','like','%'. $term .'%')
                        ->skip(0)->take(10)
                        ->orderBy('spec_no')->get();
        $sdata = [];
        if( $rows ){
            foreach( $rows as $row){
                $rowData = $this->json( $row );
                //echo '<pre>',print_r( $rowData['spec_no'] ),'</pre>';
                //echo 'spec_no = '. $rowData['spec_no']->name .'<br>';
                if( strpos(strtoupper($rowData['spec_no']->name),$term) !== false )
                $sdata[] = $rowData;
            }
        }
        $data = [
            'data' => $sdata,
            'code' => 200,
        ];
        return response()->json($data);
    }

    public function exportPdf($id = 0){
        //echo 'export pdf';
        
        // $data = [];
         $pdf = PDF::loadView('spec.export-pdf', [])
                     ->save( public_path() .'/documents/export-'. time() .'.pdf');
        return view('spec.export-pdf');   
    }

    public function exportXls($id = 0){
        $query = Spec::where('id',$id)->first();
        if( $query ){
            $row = @json_decode( json_encode( Spec::fieldRows( $query ) ) );
            $xls 	= new PHPExcel();
            $excel 	= 'public/documents/spec-model-no-'. $row->spec_no->name .'.xlsx';
            include storage_path() . '/export-class/xls-header.php';
			$subject 	= 	'New Spec Modification';
            include storage_path() . '/export-class/xls-spec-model.php';
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
