<?php 
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(12);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(9);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(11);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(9);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(38);
    $xls->getActiveSheet()->getColumnDimension('F')->setWidth(28);
        
    $xls->getActiveSheet()->getColumnDimension('G')->setWidth(8.5);
        
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('I')->setWidth(24);
    $xls->getActiveSheet()->getColumnDimension('J')->setWidth(9);
    $xls->getActiveSheet()->getColumnDimension('K')->setWidth(14.5);
    $xls->getActiveSheet()->getColumnDimension('L')->setWidth(7);
    $xls->getActiveSheet()->getColumnDimension('M')->setWidth(6.5);
    $xls->getActiveSheet()->getColumnDimension('N')->setWidth(6.5);
    $xls->getActiveSheet()->getColumnDimension('O')->setWidth(12.5);
    $xls->getActiveSheet()->getColumnDimension('P')->setWidth(4);
    $xls->getActiveSheet()->getColumnDimension('Q')->setWidth(4);
    $xls->getActiveSheet()->getColumnDimension('R')->setWidth(32);

//-----------------// HEADER TITLE //------------------------------//
$xls->getActiveSheet()->mergeCells('A1:R1');
$xls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$xls->getActiveSheet()->mergeCells('A2:B2');
$xls->getActiveSheet()->mergeCells('C2:E2');
$xls->getActiveSheet()->mergeCells('F2:G2');
$xls->getActiveSheet()->mergeCells('H2:K2');
$xls->getActiveSheet()->mergeCells('N2:O2');
$xls->getActiveSheet()->mergeCells('P2:R2');

$xls->getActiveSheet()->getStyle('A1')->getFont()->setSize(18)->setBold(true);
$xls->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('N2')->getFont()->setBold(true);

$xls->getActiveSheet()->SetCellValue('A1','ORDER SHEET');
$xls->getActiveSheet()->SetCellValue('A2','ORDER SHEET');
$xls->getActiveSheet()->SetCellValue('C2',$heads->form_name);
$xls->getActiveSheet()->SetCellValue('F2','DATE : ');
$xls->getActiveSheet()->SetCellValue('H2',date('M d, Y', strtotime( $heads->created_at) ) );
$xls->getActiveSheet()->SetCellValue('N2','P.O. NO.');
$xls->getActiveSheet()->SetCellValue('P2',$heads->po_no);
//-----------------// HEADER TITLE //------------------------------//
//----------------:: TABLE HEADER ::-------------------------------//
$xls->getActiveSheet()->getStyle('A3:R4')->applyFromArray( $style_head_title );
$xls->getActiveSheet()->getStyle('A3:R4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A3:R4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
$xls->getActiveSheet()->getStyle('A3:R4')->getFont()->setSize(16)->setBold(true);

$xls->getActiveSheet()->mergeCells('A3:A4');
$xls->getActiveSheet()->mergeCells('B3:B4');
$xls->getActiveSheet()->mergeCells('C3:C4');
$xls->getActiveSheet()->mergeCells('D3:D4');
$xls->getActiveSheet()->mergeCells('E3:E4');
$xls->getActiveSheet()->mergeCells('F3:F4');
$xls->getActiveSheet()->mergeCells('G3:G4');
$xls->getActiveSheet()->mergeCells('H3:H4');
$xls->getActiveSheet()->mergeCells('I3:I4');
$xls->getActiveSheet()->mergeCells('J3:J4');
$xls->getActiveSheet()->mergeCells('K3:K4');
$xls->getActiveSheet()->mergeCells('L3:L4');
$xls->getActiveSheet()->mergeCells('M3:N3');
$xls->getActiveSheet()->mergeCells('O3:O4');
$xls->getActiveSheet()->mergeCells('P3:P4');
$xls->getActiveSheet()->mergeCells('Q3:Q4');
$xls->getActiveSheet()->mergeCells('R3:R4');

$xls->getActiveSheet()->SetCellValue('A3','DELIVERY');
$xls->getActiveSheet()->SetCellValue('B3','CODE');
$xls->getActiveSheet()->SetCellValue('C3','ORDER NO');
$xls->getActiveSheet()->SetCellValue('D3','TYPE');
$xls->getActiveSheet()->SetCellValue('E3','MATERIAL');
$xls->getActiveSheet()->SetCellValue('F3','COLOR');
$xls->getActiveSheet()->SetCellValue('G3','SIZE');
$xls->getActiveSheet()->SetCellValue('H3','QTY');
$xls->getActiveSheet()->SetCellValue('I3','LINING');
$xls->getActiveSheet()->SetCellValue('J3','FILLER');
$xls->getActiveSheet()->SetCellValue('K3','DOUBLE FILLER');
$xls->getActiveSheet()->SetCellValue('L3','STITCH');
$xls->getActiveSheet()->SetCellValue('M3','HOLE');
$xls->getActiveSheet()->SetCellValue('O3','KEEPER');
$xls->getActiveSheet()->SetCellValue('P3','ST.');
$xls->getActiveSheet()->SetCellValue('Q3','P');
$xls->getActiveSheet()->SetCellValue('R3','BUCKLE');

$xls->getActiveSheet()->SetCellValue('M4','K');
$xls->getActiveSheet()->SetCellValue('N4','B');
$row = 5;
$total = 0;
foreach( $fields as $field ){
    $xls->getActiveSheet()->getStyle("A$row:R$row")->applyFromArray( $all_border );

    $xls->getActiveSheet()->SetCellValue("A$row",date('M d, Y', strtotime( @$field->delivery ) ) );
    $xls->getActiveSheet()->SetCellValue("B$row",@$field->spec_no->name );
    $xls->getActiveSheet()->SetCellValue("C$row",@$field->order_prefix .'-'. @$field->order_number );
    $xls->getActiveSheet()->SetCellValue("D$row",@$field->type->name );
    $xls->getActiveSheet()->SetCellValue("E$row",@$field->material->name );
    $xls->getActiveSheet()->SetCellValue("F$row",@$field->color->name );
    $xls->getActiveSheet()->SetCellValue("G$row",@$field->size_tip->name );
    $xls->getActiveSheet()->SetCellValue("H$row",@$field->quantity );
    $xls->getActiveSheet()->SetCellValue("I$row",@$field->lining->name );
    $xls->getActiveSheet()->SetCellValue("J$row",@$field->filler->name );
    $xls->getActiveSheet()->SetCellValue("K$row",@$field->double_filler->name );
    $xls->getActiveSheet()->SetCellValue("L$row",@$field->stitch->name );
    $xls->getActiveSheet()->SetCellValue("M$row",@$field->punch_hole_kensaki );
    $xls->getActiveSheet()->SetCellValue("N$row",@$field->bijow_width );
    $xls->getActiveSheet()->SetCellValue("O$row",@$field->keeper );
    $xls->getActiveSheet()->SetCellValue("P$row",@$field->keeper_stich == 'STICH' ? '-' : '/' );
    $xls->getActiveSheet()->SetCellValue("Q$row",@$field->edge_thickness );
    $xls->getActiveSheet()->SetCellValue("R$row",@$field->buckle->name );

    $row++;
    $total += $field->quantity;
}
$xls->getActiveSheet()->getStyle('A5:R'. $row)
->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)->setWrapText(true); 

$xls->getActiveSheet()->mergeCells("A$row:G$row");
$xls->getActiveSheet()->mergeCells("I$row:R$row");
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $standard_border );
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $bottom_line_double );

$xls->getActiveSheet()->SetCellValue("H$row",$total);

//----------------:: TABLE HEADER ::-------------------------------//
// ตั้งชื่อ Sheet
$xls->getActiveSheet()->setTitle($subject);
// บันทึกไฟล์ Excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($excel); 
