<?php 
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(12);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(2);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(12);
    $xls->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $xls->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(8);
    $xls->getActiveSheet()->getColumnDimension('I')->setWidth(32);
    $xls->getActiveSheet()->getColumnDimension('J')->setWidth(12);
    $xls->getActiveSheet()->getColumnDimension('K')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $xls->getActiveSheet()->getColumnDimension('M')->setWidth(8);
    $xls->getActiveSheet()->getColumnDimension('N')->setWidth(8);
    $xls->getActiveSheet()->getColumnDimension('O')->setWidth(10);
    $xls->getActiveSheet()->getColumnDimension('P')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
    $xls->getActiveSheet()->getColumnDimension('R')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('S')->setWidth(10);
    $xls->getActiveSheet()->getColumnDimension('T')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('U')->setWidth(4);

//-----------------// HEADER TITLE //------------------------------//
$xls->getActiveSheet()->mergeCells('A2:G2');
$xls->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$xls->getActiveSheet()->mergeCells('K1:L1');
$xls->getActiveSheet()->mergeCells('K2:L2');

$xls->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('J2')->getFont()->setBold(true);

$xls->getActiveSheet()->SetCellValue('J1','PAGE:');
$xls->getActiveSheet()->SetCellValue('J2','DATE:');
$xls->getActiveSheet()->SetCellValue('K2',date('M d, Y', strtotime( $heads->created_at) ) );
$xls->getActiveSheet()->SetCellValue('A2','ORDER SHEET ' . $heads->form_name);

//-----------------// HEADER TITLE //------------------------------//
//----------------:: TABLE HEADER ::-------------------------------//
$xls->getActiveSheet()->getStyle('A4:U5')->applyFromArray( $style_head_title );
$xls->getActiveSheet()->getStyle('A4:U5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A4:U5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
$xls->getActiveSheet()->getStyle('A4:U5')->getFont()->setSize(16)->setBold(true);

$xls->getActiveSheet()->mergeCells('A4:A5');
$xls->getActiveSheet()->mergeCells('B4:B5');
$xls->getActiveSheet()->mergeCells('C4:C5');
$xls->getActiveSheet()->mergeCells('D4:D5');
$xls->getActiveSheet()->mergeCells('E4:E5');
$xls->getActiveSheet()->mergeCells('F4:F5');
$xls->getActiveSheet()->mergeCells('G4:G5');
$xls->getActiveSheet()->mergeCells('H4:H5');
$xls->getActiveSheet()->mergeCells('I4:I5');
$xls->getActiveSheet()->mergeCells('J4:J5');
$xls->getActiveSheet()->mergeCells('K4:K5');
$xls->getActiveSheet()->mergeCells('L4:L5');
$xls->getActiveSheet()->mergeCells('M4:M5');
$xls->getActiveSheet()->mergeCells('N4:N5');
$xls->getActiveSheet()->mergeCells('O4:O5');
$xls->getActiveSheet()->mergeCells('P4:P5');
$xls->getActiveSheet()->mergeCells('Q4:R4');
$xls->getActiveSheet()->mergeCells('S4:T4');
$xls->getActiveSheet()->mergeCells('U4:U5');

$xls->getActiveSheet()->SetCellValue('A4','ORDER NO');
$xls->getActiveSheet()->SetCellValue('B4','');
$xls->getActiveSheet()->SetCellValue('C4','TYPE');
$xls->getActiveSheet()->SetCellValue('D4','MATERIAL');
$xls->getActiveSheet()->SetCellValue('E4','COLOR');
$xls->getActiveSheet()->SetCellValue('F4','SIZE');
$xls->getActiveSheet()->SetCellValue('G4','TYPE');
$xls->getActiveSheet()->SetCellValue('H4','QUANT');
$xls->getActiveSheet()->SetCellValue('I4','BUCKLE');
$xls->getActiveSheet()->SetCellValue('J4','DELIVERY DATE');
$xls->getActiveSheet()->SetCellValue('K4','MODEL CODE');
$xls->getActiveSheet()->SetCellValue('L4','LINING');
$xls->getActiveSheet()->SetCellValue('M4','FILLER');
$xls->getActiveSheet()->SetCellValue('N4','DBL. FILL');
$xls->getActiveSheet()->SetCellValue('O4','STITCH #NO');
$xls->getActiveSheet()->SetCellValue('P4','PT EG.');
$xls->getActiveSheet()->SetCellValue('Q4','HOLE');
$xls->getActiveSheet()->SetCellValue('S4','KEEPER');
$xls->getActiveSheet()->SetCellValue('U4','P');

$xls->getActiveSheet()->SetCellValue('Q5','K');
$xls->getActiveSheet()->SetCellValue('R5','B');

$xls->getActiveSheet()->SetCellValue('S5','TYPE');
$xls->getActiveSheet()->SetCellValue('T5','ST.');

$row = 6;
$total = 0;
foreach( $fields as $field ){
    $xls->getActiveSheet()->getStyle("A$row:U$row")->applyFromArray( $all_border );

    $xls->getActiveSheet()->SetCellValue("A$row",@$field->order_prefix .'-'. @$field->order_number );
    $xls->getActiveSheet()->SetCellValue("B$row",'');
    $xls->getActiveSheet()->SetCellValue("C$row",@$field->type->name );
    $xls->getActiveSheet()->SetCellValue("D$row",@$field->material->name );
    $xls->getActiveSheet()->SetCellValue("E$row",@$field->color->name );
    $xls->getActiveSheet()->SetCellValue("F$row",@$field->size_tip->name );
    $xls->getActiveSheet()->SetCellValue("G$row",@$field->size_tip->descript );
    $xls->getActiveSheet()->SetCellValue("H$row",@$field->quantity );
    $xls->getActiveSheet()->SetCellValue("I$row",@$field->buckle->name );
    $xls->getActiveSheet()->SetCellValue("J$row",date('M d, Y', strtotime( @$field->delivery ) ) );
    $xls->getActiveSheet()->SetCellValue("K$row",@$field->spec_no->name );
    $xls->getActiveSheet()->SetCellValue("L$row",@$field->lining->name );
    $xls->getActiveSheet()->SetCellValue("M$row",@$field->filler->name );
    $xls->getActiveSheet()->SetCellValue("N$row",@$field->double_filler->name );
    $xls->getActiveSheet()->SetCellValue("O$row",@$field->stitch->name );
    $xls->getActiveSheet()->SetCellValue("P$row",@$field->edge_thickness );
    $xls->getActiveSheet()->SetCellValue("Q$row",@$field->punch_hole_kensaki );
    $xls->getActiveSheet()->SetCellValue("R$row",@$field->bijow_width );
    $xls->getActiveSheet()->SetCellValue("S$row",@$field->keeper_type );
    $xls->getActiveSheet()->SetCellValue("T$row",@$field->keeper_stich );
    $xls->getActiveSheet()->SetCellValue("U$row",@$field->keeper_stich == 'STICH' ? '-' : '/' );

    $row++;
    $total += $field->quantity;
}
$xls->getActiveSheet()->getStyle('A5:U'. $row)
->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)->setWrapText(true); 

$xls->getActiveSheet()->mergeCells("A$row:G$row");
$xls->getActiveSheet()->mergeCells("I$row:U$row");
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $standard_border );
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $bottom_line_double );

$xls->getActiveSheet()->SetCellValue("H$row",$total);

//----------------:: TABLE HEADER ::-------------------------------//
// ตั้งชื่อ Sheet
$xls->getActiveSheet()->setTitle($subject);
// บันทึกไฟล์ Excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($excel); 
