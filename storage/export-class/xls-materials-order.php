<?php 
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(13);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(9);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $xls->getActiveSheet()->getColumnDimension('F')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('G')->setWidth(14); 
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(8);
    $xls->getActiveSheet()->getColumnDimension('I')->setWidth(22);
    $xls->getActiveSheet()->getColumnDimension('J')->setWidth(9);
    $xls->getActiveSheet()->getColumnDimension('K')->setWidth(16);
    $xls->getActiveSheet()->getColumnDimension('L')->setWidth(18);
    $xls->getActiveSheet()->getColumnDimension('M')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('N')->setWidth(12.5);
    $xls->getActiveSheet()->getColumnDimension('O')->setWidth(12.5);
    $xls->getActiveSheet()->getColumnDimension('P')->setWidth(10);
    $xls->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

//-----------------// HEADER TITLE //------------------------------//
$xls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$xls->getActiveSheet()->getStyle('A1')->getFont()->setSize(18)->setBold(true);

//-----------------// HEADER TITLE //------------------------------//
//----------------:: TABLE HEADER ::-------------------------------//
$xls->getActiveSheet()->getStyle('A1:Q1')->applyFromArray( $style_head_title );
$xls->getActiveSheet()->getStyle('A1:Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A1:Q1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
$xls->getActiveSheet()->getStyle('A1:Q1')->getFont()->setSize(16)->setBold(true);

$xls->getActiveSheet()->SetCellValue('A1','DELIVERY');
$xls->getActiveSheet()->SetCellValue('B1','MODEL');
$xls->getActiveSheet()->SetCellValue('C1','ORDER');
$xls->getActiveSheet()->SetCellValue('D1','TYPE');
$xls->getActiveSheet()->SetCellValue('E1','MATERIAL');
$xls->getActiveSheet()->SetCellValue('F1','COLOR');
$xls->getActiveSheet()->SetCellValue('G1','SIZE');
$xls->getActiveSheet()->SetCellValue('H1','QTY');
$xls->getActiveSheet()->SetCellValue('I1','LINING');
$xls->getActiveSheet()->SetCellValue('J1','FILLER');
$xls->getActiveSheet()->SetCellValue('K1','METAL KEEPER');
$xls->getActiveSheet()->SetCellValue('L1','SPRING BAR');
$xls->getActiveSheet()->SetCellValue('M1','SS PIPE');
$xls->getActiveSheet()->SetCellValue('N1','END PIECE INSIDE');
$xls->getActiveSheet()->SetCellValue('O1','END PIECE OUTSIDE');
$xls->getActiveSheet()->SetCellValue('P1','EYELET');
$xls->getActiveSheet()->SetCellValue('Q1','BUCKLE');
$row = 2;
$total = 0;
foreach( $rows as $rs ){
    $sheets = App\Models\OrderSheet::where('id',$rs->sheet_id)->first();
    $fields = App\Models\MaterialsDetail::fieldRows( $rs , App\Models\OrderSheet::fieldRows($sheets) );
    $items = @json_decode( @json_encode( $fields ) );
    $field = $items->sheets;
    $xls->getActiveSheet()->getStyle("A$row:Q$row")->applyFromArray( $all_border );

    $xls->getActiveSheet()->SetCellValue("A$row",date('M d, Y', strtotime( @$rs->delivery ) ) );
    $xls->getActiveSheet()->SetCellValue("B$row",@$field->spec_no->name );
    $xls->getActiveSheet()->SetCellValue("C$row",@$field->order_prefix .'-'. @$field->order_number );
    $xls->getActiveSheet()->SetCellValue("D$row",@$field->type->name );
    $xls->getActiveSheet()->SetCellValue("E$row",@$field->material->name );
    $xls->getActiveSheet()->SetCellValue("F$row",@$field->color->name );
    $xls->getActiveSheet()->SetCellValue("G$row",@$field->size_tip->name );
    $xls->getActiveSheet()->SetCellValue("H$row",@$rs->quantity );
    $xls->getActiveSheet()->SetCellValue("I$row",@$field->lining->name );
    $xls->getActiveSheet()->SetCellValue("J$row",@$field->filler->name );
    $xls->getActiveSheet()->SetCellValue("K$row",@$field->metal_keeper->name );
    $xls->getActiveSheet()->SetCellValue("L$row",@$field->spring_bar->name );
    $xls->getActiveSheet()->SetCellValue("M$row",@$field->cylinder->name );
    $xls->getActiveSheet()->SetCellValue("N$row",@$field->end_piece_inside->name );
    $xls->getActiveSheet()->SetCellValue("O$row",@$field->end_piece_outside->name );
    $xls->getActiveSheet()->SetCellValue("P$row",@$field->eyelet->name );
    $xls->getActiveSheet()->SetCellValue("Q$row",@$field->buckle->name );

    $row++;
    $total += $rs->quantity;
}
$xls->getActiveSheet()->getStyle('A2:Q'. $row)
->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)->setWrapText(true); 

$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $standard_border );
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $bottom_line_double );

$xls->getActiveSheet()->SetCellValue("H$row",$total);
//$xls->getActiveSheet()->SetCellValue("A($row+1)",print_r($items));

//----------------:: TABLE HEADER ::-------------------------------//
// ตั้งชื่อ Sheet
$xls->getActiveSheet()->setTitle($subject);
// บันทึกไฟล์ Excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($excel); 
