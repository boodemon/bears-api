<?php 
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(12);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(12.5);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(12);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(9);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(11);
    $xls->getActiveSheet()->getColumnDimension('F')->setWidth(11);
        
    $xls->getActiveSheet()->getColumnDimension('G')->setWidth(35);
        
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $xls->getActiveSheet()->getColumnDimension('I')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('J')->setWidth(6);
    $xls->getActiveSheet()->getColumnDimension('K')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('L')->setWidth(8);
    $xls->getActiveSheet()->getColumnDimension('M')->setWidth(13);
    $xls->getActiveSheet()->getColumnDimension('N')->setWidth(25);
    $xls->getActiveSheet()->getColumnDimension('O')->setWidth(12.5);
    $xls->getActiveSheet()->getColumnDimension('P')->setWidth(36);

//-----------------// HEADER TITLE //------------------------------//
$xls->getActiveSheet()->mergeCells('A1:P1');
$xls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$xls->getActiveSheet()->mergeCells('A2:B2');
$xls->getActiveSheet()->mergeCells('C2:E2');
$xls->getActiveSheet()->mergeCells('F2:G2');
$xls->getActiveSheet()->mergeCells('H2:K2');
$xls->getActiveSheet()->mergeCells('O2:P2');

$xls->getActiveSheet()->getStyle('A1')->getFont()->setSize(18)->setBold(true);
$xls->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
$xls->getActiveSheet()->getStyle('N2')->getFont()->setBold(true);

$xls->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$xls->getActiveSheet()->getStyle('N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$xls->getActiveSheet()->SetCellValue('A1','ORDER SHEET');
$xls->getActiveSheet()->SetCellValue('A2','ORDER SHEET');
$xls->getActiveSheet()->SetCellValue('C2',$heads->form_name);
$xls->getActiveSheet()->SetCellValue('F2','DATE : ');
$xls->getActiveSheet()->SetCellValue('H2',date('M d, Y', strtotime( $heads->created_at) ) );
$xls->getActiveSheet()->SetCellValue('N2','P.O. NO.');
$xls->getActiveSheet()->SetCellValue('P2',$heads->po_no);
//-----------------// HEADER TITLE //------------------------------//
//----------------:: TABLE HEADER ::-------------------------------//
$xls->getActiveSheet()->getStyle('A3:P4')->applyFromArray( $style_head_title );
$xls->getActiveSheet()->getStyle('A3:P4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A3:P4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
$xls->getActiveSheet()->getStyle('A3:P4')->getFont()->setSize(16)->setBold(true);

$xls->getActiveSheet()->mergeCells('A3:A4');
$xls->getActiveSheet()->mergeCells('B3:B4');
$xls->getActiveSheet()->mergeCells('C3:C4');
$xls->getActiveSheet()->mergeCells('D3:D4');
$xls->getActiveSheet()->mergeCells('E3:E4');
$xls->getActiveSheet()->mergeCells('F3:F4');
$xls->getActiveSheet()->mergeCells('G3:G4');
$xls->getActiveSheet()->mergeCells('H3:H4');
$xls->getActiveSheet()->mergeCells('I3:J3');
$xls->getActiveSheet()->mergeCells('K3:K4');
$xls->getActiveSheet()->mergeCells('L3:L4');
$xls->getActiveSheet()->mergeCells('M3:M4');
$xls->getActiveSheet()->mergeCells('N3:N4');
$xls->getActiveSheet()->mergeCells('O3:O4');
$xls->getActiveSheet()->mergeCells('P3:P4');

$xls->getActiveSheet()->SetCellValue('A3','ORDER NO');
$xls->getActiveSheet()->SetCellValue('B3','CODE');
$xls->getActiveSheet()->SetCellValue('C3','DELIVERY');
$xls->getActiveSheet()->SetCellValue('D3','TYPE');
$xls->getActiveSheet()->SetCellValue('E3','QUANTITY');
$xls->getActiveSheet()->SetCellValue('F3','SIZE');
$xls->getActiveSheet()->SetCellValue('G3','MATERIAL/COLOR');
$xls->getActiveSheet()->SetCellValue('H3','LINING');
$xls->getActiveSheet()->SetCellValue('I3','MAGIC TAP');
$xls->getActiveSheet()->SetCellValue('K3','KEEPER');
$xls->getActiveSheet()->SetCellValue('L3','STITCH');
$xls->getActiveSheet()->SetCellValue('M3','MATAL PART');
$xls->getActiveSheet()->SetCellValue('N3','SPRING BAR');
$xls->getActiveSheet()->SetCellValue('O3','CYLINDE');
$xls->getActiveSheet()->SetCellValue('P3','BUCKLE');

$xls->getActiveSheet()->SetCellValue('I4','1QN');
$xls->getActiveSheet()->SetCellValue('J4','2QM');
$row = 5;
$total = 0;
foreach( $fields as $field ){
    $xls->getActiveSheet()->getStyle("A$row:P$row")->applyFromArray( $all_border );

    $xls->getActiveSheet()->SetCellValue("A$row",@$field->order_prefix .'-'. @$field->order_number );
    $xls->getActiveSheet()->SetCellValue("B$row",@$field->spec_no->name );
    $xls->getActiveSheet()->SetCellValue("C$row",date('M d, Y', strtotime( @$field->delivery ) ) );
    $xls->getActiveSheet()->SetCellValue("D$row",@$field->type->name );
    $xls->getActiveSheet()->SetCellValue("E$row",@$field->quantity );
    $xls->getActiveSheet()->SetCellValue("F$row",@$field->size_tip->name );
    $xls->getActiveSheet()->SetCellValue("G$row",@$field->material->name  .((!empty(@$field->material->name) && !empty(@$field->color->name) ) ? '/':'' ) . @$field->color->name );
    $xls->getActiveSheet()->SetCellValue("H$row",@$field->lining->name );
    $xls->getActiveSheet()->SetCellValue("I$row",@$field->magic_qn == '1QN' ? '/' : '-' );
    $xls->getActiveSheet()->SetCellValue("J$row",@$field->magic_qm == '2QM' ? '/' : '-' );
    $xls->getActiveSheet()->SetCellValue("K$row",@$field->keeper );
    $xls->getActiveSheet()->SetCellValue("L$row",@$field->stitch->name );
    $xls->getActiveSheet()->SetCellValue("M$row",@$field->metal_part );
    $xls->getActiveSheet()->SetCellValue("N$row",@$field->spring_bar->name );
    $xls->getActiveSheet()->SetCellValue("O$row",@$field->cylinder->name );
    $xls->getActiveSheet()->SetCellValue("P$row",@$field->buckle->name );

    $row++;
    $total += $field->quantity;
}
$xls->getActiveSheet()->getStyle('A5:P'. $row)
->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)->setWrapText(true); 
$xls->getActiveSheet()->mergeCells("A$row:D$row");
$xls->getActiveSheet()->mergeCells("F$row:P$row");
$xls->getActiveSheet()->getStyle("E$row")->applyFromArray( $standard_border );
$xls->getActiveSheet()->getStyle("E$row")->applyFromArray( $bottom_line_double );

$xls->getActiveSheet()->SetCellValue("E$row",$total);

//----------------:: TABLE HEADER ::-------------------------------//
// ตั้งชื่อ Sheet
$xls->getActiveSheet()->setTitle($subject);
// บันทึกไฟล์ Excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($excel); 
