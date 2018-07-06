<?php 
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(14);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('F')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('G')->setWidth(10); 
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('I')->setWidth(18);
    $xls->getActiveSheet()->getColumnDimension('J')->setWidth(14);
    $xls->getActiveSheet()->getColumnDimension('K')->setWidth(16);

//-----------------// HEADER TITLE //------------------------------//
$xls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A1')->getFont()->setSize(18)->setBold(true);

//-----------------// HEADER TITLE //------------------------------//
//----------------:: TABLE HEADER ::-------------------------------//
$xls->getActiveSheet()->getStyle('A4:K4')->applyFromArray( $style_head_title );
$xls->getActiveSheet()->getStyle('A1:K2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$xls->getActiveSheet()->getStyle('A4:K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$xls->getActiveSheet()->getStyle('A4:K4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
$xls->getActiveSheet()->getStyle('A4:K4')->getFont()->setSize(16)->setBold(true);

$xls->getActiveSheet()->getStyle('A4:K4')
                        ->getAlignment()
                        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                        ->setWrapText(true); 

$xls->getActiveSheet()->mergeCells('A1:E1');
$xls->getActiveSheet()->mergeCells('A2:E2');
$xls->getActiveSheet()->mergeCells('F4:G4');
$xls->getActiveSheet()->mergeCells('J2:K2');


$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(10);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);
$xls->getActiveSheet()->getRowDimension(1)->setRowHeight(21);

$xls->getActiveSheet()->SetCellValue('A1','DATE : ' . $rows->onDate );
$xls->getActiveSheet()->SetCellValue('A2','TO : '   . $rows->to );
$xls->getActiveSheet()->SetCellValue('J2','NO. : '  . $rows->no );

$xls->getActiveSheet()->SetCellValue('A4','FOR ORDER');
$xls->getActiveSheet()->SetCellValue('B4','FOR MODEL');
$xls->getActiveSheet()->SetCellValue('C4','DESCRIPTION');
$xls->getActiveSheet()->SetCellValue('D4','KMG DATE REQUIRED');
$xls->getActiveSheet()->SetCellValue('E4','CUSTOMER DATE REQUIRED');
$xls->getActiveSheet()->SetCellValue('F4','QUANTITY');
$xls->getActiveSheet()->SetCellValue('H4','UNIT PRICE (HK$)');
$xls->getActiveSheet()->SetCellValue('I4','IMPORT INVOICE');
$xls->getActiveSheet()->SetCellValue('J4','DATE');
$xls->getActiveSheet()->SetCellValue('K4','BALANCE QUANTITY');
$row = 5;
$total = 0;
foreach( $rows->detail as $rs ){
    $sheets = $rs->sheets;
    $xls->getActiveSheet()->getStyle("A$row:K$row")->applyFromArray( $all_border );
    $xls->getActiveSheet()->mergeCells("F$row:G$row");

    $xls->getActiveSheet()->SetCellValue("A$row",$rs->for_order );
    $xls->getActiveSheet()->SetCellValue("B$row",$rs->for_model );
    $xls->getActiveSheet()->SetCellValue("C$row",$rs->description );
    $xls->getActiveSheet()->SetCellValue("D$row",date('M d, Y', strtotime( @$rs->kmg_date_required ) ) );
    $xls->getActiveSheet()->SetCellValue("E$row",date('M d, Y', strtotime( @$rs->customer_date_required ) ) );
    $xls->getActiveSheet()->SetCellValue("F$row",$rs->quantity );
    $xls->getActiveSheet()->SetCellValue("G$row",$rs->qty_unit );
    $xls->getActiveSheet()->SetCellValue("H$row",$rs->unit_price_hk );
    $xls->getActiveSheet()->SetCellValue("I$row",$rs->import_invoice );
    $xls->getActiveSheet()->SetCellValue("J$row",$rs->onDate );
    $xls->getActiveSheet()->SetCellValue("K$row",$rs->balance_quantity );

    $row++;
    $total += $rs->quantity;
}
$xls->getActiveSheet()->getStyle('A5:K'. $row)
                        ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                        ->setWrapText(true); 
/*
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $standard_border );
$xls->getActiveSheet()->getStyle("H$row")->applyFromArray( $bottom_line_double );

$xls->getActiveSheet()->SetCellValue("H$row",$total);
//$xls->getActiveSheet()->SetCellValue("A($row+1)",print_r($items));
*/
//----------------:: TABLE HEADER ::-------------------------------//
// ตั้งชื่อ Sheet
$xls->getActiveSheet()->setTitle($subject);
// บันทึกไฟล์ Excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($excel); 
