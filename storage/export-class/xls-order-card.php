<?php
        //Page Setup: Scaling options

        //$label=$xls->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)->setBold(true);
        $xls->getActiveSheet()->getDefaultStyle()->getFont()->setName("Calibri (Body)")->setSize(10);
        $xls->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
        $xls->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

        $xls->getActiveSheet()->getPageSetup()->setFitToWidth(1); 
        $xls->getActiveSheet()->getPageSetup()->setFitToHeight(0);
        //Page margins // กำหนดระยะขอบ
        $xls->getActiveSheet()->getPageMargins()->setTop(0.5); 
        $xls->getActiveSheet()->getPageMargins()->setRight(0.5); 
        $xls->getActiveSheet()->getPageMargins()->setLeft(0.5); 
        $xls->getActiveSheet()->getPageMargins()->setBottom(0.5); 
        //------------// EXAMPLE //-----------------------------------------//
	$xls->getActiveSheet()->getColumnDimension('A')->setWidth(19.3);
	$xls->getActiveSheet()->getColumnDimension('B')->setWidth(1.2);
	$xls->getActiveSheet()->getColumnDimension('C')->setWidth(12.5);
	$xls->getActiveSheet()->getColumnDimension('D')->setWidth(12.5);
	$xls->getActiveSheet()->getColumnDimension('E')->setWidth(12.5);
        $xls->getActiveSheet()->getColumnDimension('F')->setWidth(12.5);
        
        $xls->getActiveSheet()->getColumnDimension('G')->setWidth(7.67);
        
	$xls->getActiveSheet()->getColumnDimension('H')->setWidth(19.3);
        $xls->getActiveSheet()->getColumnDimension('I')->setWidth(1.2);
        $xls->getActiveSheet()->getColumnDimension('J')->setWidth(12.5);
        $xls->getActiveSheet()->getColumnDimension('K')->setWidth(12.5);
        $xls->getActiveSheet()->getColumnDimension('L')->setWidth(12.5);
        $xls->getActiveSheet()->getColumnDimension('M')->setWidth(12.5);
                
        foreach( $fields as $n => $field ){
                $m2 = ($i%2);
                $cmn = $clm[$m2];
                //-----------------// HEADER & STYLE //------------------------------//
                $xls->getActiveSheet()->mergeCells( $cmn[0] . $row . ':' . $cmn[5] . $row );
                $xls->getActiveSheet()->getStyle( $cmn[0] . $row )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $xls->getActiveSheet()->getStyle( $cmn[0] . ( $row+1 ) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $xls->getActiveSheet()->getStyle(  $cmn[0] .( $row+2) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $xls->getActiveSheet()->getStyle(  $cmn[5] .( $row+1) .':'. $cmn[5] .( $row+3) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $xls->getActiveSheet()->getStyle( $cmn[2] . $row .':' . $cmn[2] . ($row+3) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                $xls->getActiveSheet()->getStyle( $cmn[4] . ($row+1) .':' . $cmn[4] . ($row+2) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $xls->getActiveSheet()->getStyle( $cmn[0] . ($row+4) .':' . $cmn[5] . ($row+29) )
                                      ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                $xls->getActiveSheet()->getStyle( $cmn[0] . $row .':'.  $cmn[0] . ($row+1) )->getFont()->setName("Bookman Old Style")
                                      ->setSize(12)->setBold(true);

                $xls->getActiveSheet()->mergeCells( $cmn[0] . $row .':' . $cmn[5] . $row );
                $xls->getActiveSheet()->mergeCells( $cmn[0] . ($row+1) .':' . $cmn[1] . ($row+1) );
                $xls->getActiveSheet()->mergeCells( $cmn[0] . ($row+2) .':' . $cmn[1] . ($row+2) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+4) .':' . $cmn[3] . ($row+4) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+4) .':' . $cmn[5] . ($row+4) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+5) .':' . $cmn[3] . ($row+5) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+5) .':' . $cmn[5] . ($row+5) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+6) .':' . $cmn[3] . ($row+6) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+6) .':' . $cmn[5] . ($row+6) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+7) .':' . $cmn[3] . ($row+7) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+7) .':' . $cmn[5] . ($row+7) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+8) .':' . $cmn[3] . ($row+8) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+8) .':' . $cmn[5] . ($row+8) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+9) .':' . $cmn[3] . ($row+9) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+9) .':' . $cmn[5] . ($row+9) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+10) .':' . $cmn[3] . ($row+10) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+10) .':' . $cmn[5] . ($row+10) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+11) .':' . $cmn[3] . ($row+11) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+11) .':' . $cmn[5] . ($row+11) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+12) .':' . $cmn[3] . ($row+12) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+12) .':' . $cmn[5] . ($row+12) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+13) .':' . $cmn[3] . ($row+13) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+13) .':' . $cmn[5] . ($row+13) );
                $xls->getActiveSheet()->mergeCells( $cmn[3] . ($row+14) .':' . $cmn[4] . ($row+14) );
                $xls->getActiveSheet()->mergeCells( $cmn[3] . ($row+15) .':' . $cmn[4] . ($row+15) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+16) .':' . $cmn[3] . ($row+16) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+16) .':' . $cmn[5] . ($row+16) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+17) .':' . $cmn[3] . ($row+17) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+17) .':' . $cmn[5] . ($row+17) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+18) .':' . $cmn[3] . ($row+18) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+18) .':' . $cmn[5] . ($row+18) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+19) .':' . $cmn[3] . ($row+19) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+19) .':' . $cmn[5] . ($row+19) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+20) .':' . $cmn[3] . ($row+20) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+20) .':' . $cmn[5] . ($row+20) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+21) .':' . $cmn[5] . ($row+21) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+22) .':' . $cmn[3] . ($row+22) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+22) .':' . $cmn[5] . ($row+22) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+23) .':' . $cmn[3] . ($row+23) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+23) .':' . $cmn[5] . ($row+23) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+24) .':' . $cmn[3] . ($row+24) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+24) .':' . $cmn[5] . ($row+24) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+25) .':' . $cmn[3] . ($row+25) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+25) .':' . $cmn[5] . ($row+25) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+26) .':' . $cmn[3] . ($row+26) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+26) .':' . $cmn[5] . ($row+26) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+27) .':' . $cmn[3] . ($row+27) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+27) .':' . $cmn[5] . ($row+27) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+28) .':' . $cmn[3] . ($row+28) );
                $xls->getActiveSheet()->mergeCells( $cmn[4] . ($row+28) .':' . $cmn[5] . ($row+28) );
                $xls->getActiveSheet()->mergeCells( $cmn[2] . ($row+29) .':' . $cmn[5] . ($row+29) );

                $xls->getActiveSheet()->getStyle( $cmn[0] . $row .':' . $cmn[5] . ($row+29) )->applyFromArray( $standard_border );
                $xls->getActiveSheet()->getStyle( $cmn[0] . $row .':'. $cmn[5] . $row )->applyFromArray( $bottom_line );
                $xls->getActiveSheet()->getStyle( $cmn[2] . ($row+1) .':'. $cmn[2] . ($row+2) )->applyFromArray( $border_left );
                $xls->getActiveSheet()->getStyle( $cmn[2] . ($row+1) .':'. $cmn[2] . ($row+3) )->applyFromArray( $border_bottom_no );
                $xls->getActiveSheet()->getStyle( $cmn[4] . ($row+1) .':'. $cmn[4] . ($row+3) )->applyFromArray( $border_bottom_no );
                $xls->getActiveSheet()->getStyle( $cmn[1] . ($row+3) )->applyFromArray( $border_rignt );
                $xls->getActiveSheet()->getStyle( $cmn[3] . ($row+1) .':'. $cmn[3] . ($row+3) )->applyFromArray( $border_rignt );
                $xls->getActiveSheet()->getStyle( $cmn[3] . ($row+1) )->applyFromArray( $bottom_line );
                $xls->getActiveSheet()->getStyle( $cmn[3] . ($row+2) )->applyFromArray( $bottom_line );
                $xls->getActiveSheet()->getStyle( $cmn[5] . ($row+1) )->applyFromArray( $bottom_line );
                $xls->getActiveSheet()->getStyle( $cmn[5] . ($row+2) )->applyFromArray( $bottom_line );

                for($n=1; $n<=30; $n++){
                        //echo 'n :' . $n .'<br/>';
                        $xls->getActiveSheet()->getRowDimension($n)->setRowHeight(18);
                        if( $n > 2 && $n < 29)
                        $xls->getActiveSheet()->getStyle( $cmn[0] . ($row+$n) .':' . $cmn[5] . ($row+$n) )->applyFromArray( $bottom_line );
                }
               //-----------------// HEADER & STYLE //------------------------------//

                $xls->getActiveSheet()->SetCellValue("$cmn[0]$row",'ORDER CARD');
                $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+1),'ORDER NO.');
                $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+1),'เข้างาน');
                $xls->getActiveSheet()->SetCellValue($cmn[3] . ($row+1),'');
                $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+1),'จำนวน ORD.');
                $xls->getActiveSheet()->SetCellValue($cmn[5] . ($row+1),$field->quantity);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+2), $field->order_prefix .'-'. $field->order_number );
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+2),'วันตัด');
                        $xls->getActiveSheet()->SetCellValue($cmn[3] . ($row+2),'');
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+2),'จำนวนเผื่อ');
                        $xls->getActiveSheet()->SetCellValue($cmn[5] . ($row+2),'');

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+3),'');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+3),'');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+3),'กำหนดส่ง');
                        $xls->getActiveSheet()->SetCellValue($cmn[3] . ($row+3),date('M d, Y',strtotime($field->delivery) ) );
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+3),'จำนวนผลิต');
                        $xls->getActiveSheet()->SetCellValue($cmn[5] . ($row+3),'');

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+4),'SPEC NO.');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+4),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+4),@$field->spec_no->name );
                        //$xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+4),@$field->spec_no->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+5),'TYPE');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+5),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+5),@$field->type->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+5),@$field->type->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+6),'MATERIAL');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+6),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+6),@$field->material->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+6),@$field->material->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+7),'COLOR');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+7),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+7),@$field->color->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+7),@$field->color->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+8),'FILLER');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+8),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+8),@$field->filler->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+8),@$field->filler->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+9),'DOUBLE FILLER');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+9),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+9),@$field->double_filler->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+9),@$field->double_filler->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+10),'LINING');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+10),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+10),@$field->lining->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+10),@$field->lining->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+11),'STITCH');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+11),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+11),@$field->stitch->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+11),@$field->stitch->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+12),'PAINT');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+12),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+12),@$field->paint->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+12),@$field->paint->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+13),'BUCKLE');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+13),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+13),@$field->buckle->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+13),@$field->buckle->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+14),'KEEPER');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+14),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+14), @$field->keeper );
                        $xls->getActiveSheet()->SetCellValue($cmn[3] . ($row+14),'TYPE:'. @$field->keeper_type .'   WIDTH. '. @$field->keeper_width .' MM');
                        $xls->getActiveSheet()->SetCellValue($cmn[5] . ($row+14),'STITCH: '. @$field->keeper_stich );

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+15),'KEEPER');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+15),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+15), @$field->keeper2 );
                        $xls->getActiveSheet()->SetCellValue($cmn[3] . ($row+15),'TYPE:'. @$field->keeper2_type .'   WIDTH. '. @$field->keeper2_width .' MM');
                        $xls->getActiveSheet()->SetCellValue($cmn[5] . ($row+15),'STITCH: '. @$field->keeper2_stich );

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+16),'PUNCH HOLE');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+16),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+16),'KENSAKI: '. @$field->punch_hole_kensaki);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+16),'DIA: ' . @$field->punch_hole_dia );

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+17),'');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+17),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+17),'Bijow width: ' . @$field->bijow_width );
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+17),'LENGTH: '. @$field->punch_hole_length );

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+18),'SIZE/TIP');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+18),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+18),@$field->size_tip->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+18),@$field->size_tip->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+19),'LENGTH');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+19),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+19),@$field->model_length->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+19),@$field->model_length->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+20),'TOTAL THICKNESS');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+20),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+20),@$field->total_thickness->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+20),@$field->total_thickness->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+21),'KANMOTO THICKNESS');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+21),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+21),@$field->kanmoto_thickness);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+22),'PLASTIC PART');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+22),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+22),@$field->matal_part->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+22),@$field->matal_part->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+23),'METAL KEEPER');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+23),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+23),@$field->metal_keeper->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+23),@$field->metal_keeper->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+24),'END PIECE (INSIDE');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+24),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+24),@$field->end_piece_inside->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+24),@$field->end_piece_inside);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+25),'END PIECE (OUTSIDE)');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+25),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+25),@$field->end_piece_outside->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+25),@$field->end_piece_outside->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+26),'EYELET');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+26),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+26),@$field->eyelet->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+26),@$field->eyelet->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+27),'SPRING BAR');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+27),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+27),@$field->spring_bar->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+27),@$field->spring_bar->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+28),'CYLINDER (SS PIPE)');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+28),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+28),@$field->cylinder->name);
                        $xls->getActiveSheet()->SetCellValue($cmn[4] . ($row+28),@$field->cylinder->descript);

                        $xls->getActiveSheet()->SetCellValue($cmn[0] . ($row+29),'STAMPING');
                        $xls->getActiveSheet()->SetCellValue($cmn[1] . ($row+29),':');
                        $xls->getActiveSheet()->SetCellValue($cmn[2] . ($row+29),@$field->stamping->name . ' ' . @$field->stamping->descript);
        
                if( $m2 != 0 )
                $row = $row + 35;

                $i++;
        }
        // ตั้งชื่อ Sheet
        $xls->getActiveSheet()->setTitle('ORDER CARD');
        // บันทึกไฟล์ Excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
        $objWriter->save($excel); 
?>