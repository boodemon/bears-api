<?php
        //Page Setup: Scaling options

        //$label=$xls->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT)->setBold(true);
        $xls->getActiveSheet()->getDefaultStyle()->getFont()->setName("Browallia New")->setSize(14);
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
        $xls->getActiveSheet()->getRowDimension(1)->setRowHeight(36);
        $xls->getActiveSheet()->getRowDimension(2)->setRowHeight(36);
        $xls->getActiveSheet()->getRowDimension(3)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(4)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(5)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(6)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(7)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(8)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(9)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(10)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(11)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(12)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(13)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(14)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(15)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(16)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(17)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(18)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(19)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(20)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(21)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(22)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(23)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(24)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(25)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(26)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(27)->setRowHeight(32);
        $xls->getActiveSheet()->getRowDimension(28)->setRowHeight(32);

//$sheet->getStyle('A1:A2')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$xls->getActiveSheet()->getColumnDimension('B')->setWidth(3.71);
		$xls->getActiveSheet()->getColumnDimension('C')->setWidth(8.71);
		$xls->getActiveSheet()->getColumnDimension('D')->setWidth(7.43);
		$xls->getActiveSheet()->getColumnDimension('F')->setWidth(11.71);
		$xls->getActiveSheet()->getColumnDimension('F')->setWidth(12.57);
		$xls->getActiveSheet()->getColumnDimension('G')->setWidth(12);
		$xls->getActiveSheet()->getColumnDimension('H')->setWidth(6);
		$xls->getActiveSheet()->getColumnDimension('I')->setWidth(6);
		$xls->getActiveSheet()->getColumnDimension('J')->setWidth(6);
		$xls->getActiveSheet()->getColumnDimension('K')->setWidth(6);
		
		$xls->getActiveSheet()->SetCellValue('B3',':');
		$xls->getActiveSheet()->SetCellValue('B4',':');
		$xls->getActiveSheet()->SetCellValue('B5',':');
		$xls->getActiveSheet()->SetCellValue('B6',':');
		$xls->getActiveSheet()->SetCellValue('B7',':');
		$xls->getActiveSheet()->SetCellValue('B8',':');
		$xls->getActiveSheet()->SetCellValue('B9',':');
		$xls->getActiveSheet()->SetCellValue('B10',':');
		$xls->getActiveSheet()->SetCellValue('B11',':');
		$xls->getActiveSheet()->SetCellValue('B12',':');
		$xls->getActiveSheet()->SetCellValue('B13',':');
		$xls->getActiveSheet()->SetCellValue('B14',':');
		$xls->getActiveSheet()->SetCellValue('B17',':');
		$xls->getActiveSheet()->SetCellValue('B18',':');
		$xls->getActiveSheet()->SetCellValue('B19',':');
		$xls->getActiveSheet()->SetCellValue('B20',':');
		$xls->getActiveSheet()->SetCellValue('B24',':');
		$xls->getActiveSheet()->SetCellValue('B27',':');
		$xls->getActiveSheet()->SetCellValue('B21',':');
		$xls->getActiveSheet()->SetCellValue('B22',':');
		$xls->getActiveSheet()->SetCellValue('B23',':');
		$xls->getActiveSheet()->SetCellValue('B25',':');
		$xls->getActiveSheet()->SetCellValue('B26',':');
		$xls->getActiveSheet()->SetCellValue('B28',':');
		$xls->getActiveSheet()->SetCellValue('B29',':');
		
		$xls->getActiveSheet()->getStyle('G2:K2')->applyFromArray( $bottom_line );
		//$xls->getActiveSheet()->getStyle('A4:K4')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A3:K3')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A4:K4')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A5:K5')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A6:K6')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A7:K7')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A8:K8')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A9:K9')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A10:K10')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A11:K11')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A12:K12')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A13:K13')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A14:K14')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A15:K15')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A16:K16')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A17:K17')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A18:K18')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A19:K19')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A20:K20')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A21:K21')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A22:K22')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A23:K23')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A24:K24')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A25:K25')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A26:K26')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A27:K27')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A28:K28')->applyFromArray( $bottom_line );
		$xls->getActiveSheet()->getStyle('A29:K29')->applyFromArray( $bottom_line );
        //------------// Set Array Style //---------------------------------//

        //$xls->setActiveSheetIndex(0);
        //-----------------// HEADER TITLE //------------------------------//
        $xls->getActiveSheet()->mergeCells('A1:K1');
        $xls->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $xls->getActiveSheet()->getStyle('A1')->getFont()->setSize(18)->setBold(true);

        $xls->getActiveSheet()->SetCellValue('A1','NEW MODEL SPECIFICATION');
        //-----------------// HEADER TITLE //------------------------------//

        //-----------------// DATE CREATE //------------------------------//
        $xls->getActiveSheet()->mergeCells('G2:K2');
        $xls->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->SetCellValue('F2','DATE ');
        $xls->getActiveSheet()->SetCellValue('G2',date('F d,Y',strtotime($row->create_date)));
        $xls->getActiveSheet()->getStyle('F2')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //-----------------// DATE CREATE //------------------------------//

        $xls->getActiveSheet()->getStyle('A3:A32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('C3:C32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('F3:F31')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('B19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('B20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('A3:A32')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->getStyle('B3:B29')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        //---------------// SPEC NO //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C3:E3');
        $xls->getActiveSheet()->mergeCells('F3:K3');
        $xls->getActiveSheet()->SetCellValue('A3', 'SPEC NO. ');
        $xls->getActiveSheet()->SetCellValue('C3',$row->spec_no->name );
        $xls->getActiveSheet()->SetCellValue('F3',$row->spec_no->descript );
        //---------------// END SPEC NO //------------------------------------//

        //---------------// TYPE //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C4:E4');
        $xls->getActiveSheet()->mergeCells('F4:K4');
        $xls->getActiveSheet()->SetCellValue('A4', 'TYPE ');
        $xls->getActiveSheet()->SetCellValue('C4',$row->type->name);
        $xls->getActiveSheet()->SetCellValue('F4',$row->type->descript);
        //---------------// END TYPE //------------------------------------//

        //---------------// MATERIAL //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C5:E5');
        $xls->getActiveSheet()->mergeCells('F5:K5');
        $xls->getActiveSheet()->SetCellValue('A5', 'MATERIAL ');
        $xls->getActiveSheet()->SetCellValue('C5',$row->material->name );
        $xls->getActiveSheet()->SetCellValue('F5',$row->material->descript );
        //---------------// END MATERIAL //------------------------------------//

        //---------------// COLOR //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C6:E6');
        $xls->getActiveSheet()->mergeCells('F6:K6');
        $xls->getActiveSheet()->SetCellValue('A6', 'COLOR ');
        $xls->getActiveSheet()->SetCellValue('C6',$row->color->name );
        $xls->getActiveSheet()->SetCellValue('F6',$row->color->descript );
        //---------------// END COLOR //------------------------------------//

        //---------------// FILLER //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C7:E7');
        $xls->getActiveSheet()->mergeCells('F7:K7');
        $xls->getActiveSheet()->SetCellValue('A7', 'FILLER ');
        $xls->getActiveSheet()->SetCellValue('C7',$row->filler->name);
        $xls->getActiveSheet()->SetCellValue('F7',$row->filler->descript);
        //---------------// END FILLER //------------------------------------//

        //---------------// DOUBLE FILLER //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C8:E8');
        $xls->getActiveSheet()->mergeCells('F8:K8');
        $xls->getActiveSheet()->SetCellValue('A8', 'DOUBLE FILLER ');
        $xls->getActiveSheet()->SetCellValue('C8',$row->double_filler->name);
        $xls->getActiveSheet()->SetCellValue('F8',$row->double_filler->descript);
        //---------------// END DOUBLE FILLER //------------------------------------//

        //---------------// LINING //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C9:E9');
        $xls->getActiveSheet()->mergeCells('F9:G9');
        $xls->getActiveSheet()->mergeCells('H9:K9');
        $xls->getActiveSheet()->SetCellValue('A9', 'LINING ');
        $xls->getActiveSheet()->SetCellValue('C9',$row->lining->name);
        $xls->getActiveSheet()->SetCellValue('F9',$row->lining->descript);
        $xls->getActiveSheet()->SetCellValue('F9',$row->lining->rate .' DM2');

        //---------------// STITCH //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C10:E10');
        $xls->getActiveSheet()->mergeCells('F10:G10');
        $xls->getActiveSheet()->mergeCells('H10:K10');
        $xls->getActiveSheet()->SetCellValue('A10', 'STITCH ');
        $xls->getActiveSheet()->SetCellValue('C10',$row->stitch->name);
        $xls->getActiveSheet()->SetCellValue('F10',$row->stitch->descript);
        $xls->getActiveSheet()->SetCellValue('F10',$row->stitch->rate . ' M');
        //---------------// END STITCH //------------------------------------//

        //---------------// PAINT //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C11:E11');
        $xls->getActiveSheet()->mergeCells('F11:K11');
        $xls->getActiveSheet()->SetCellValue('A11', 'PAINT ');
        $xls->getActiveSheet()->SetCellValue('C11',$row->paint->name);
        $xls->getActiveSheet()->SetCellValue('F11',$row->paint->descript);
        //---------------// END PAINT //------------------------------------//

        //---------------// BUCKLE //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C12:K12');
        //$xls->getActiveSheet()->mergeCells('F12:G12');
        //$xls->getActiveSheet()->mergeCells('H12:K12');
        $xls->getActiveSheet()->SetCellValue('A12', 'BUCKLE ');
        $xls->getActiveSheet()->SetCellValue('C12',$row->buckle->name);
        //$xls->getActiveSheet()->SetCellValue('F12',$row->buckle->descript);
        //$xls->getActiveSheet()->SetCellValue('H12',$row->buckle->rate .' SET');
        //---------------// END BUCKLE //------------------------------------//


        //---------------// KEEPER //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C13:D13');
        $xls->getActiveSheet()->mergeCells('F13:G13');
        $xls->getActiveSheet()->mergeCells('I13:K13');
        $xls->getActiveSheet()->getStyle('H13')->getFont()->setName("Wingdings 2")->setSize(18);
        $xls->getActiveSheet()->getStyle('H13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->SetCellValue('A13', 'KEEPER ');
        $xls->getActiveSheet()->SetCellValue('C13', $row->keeper);
        $xls->getActiveSheet()->SetCellValue('E13', 'TYPE '.$row->keeper_type);
        $xls->getActiveSheet()->SetCellValue('F13', 'WIDTH '.$row->keeper_width .' MM.');
        $xls->getActiveSheet()->SetCellValue('H13',  @$row->keeper_stich == 'STICH' ? 'P' : '');
        $xls->getActiveSheet()->SetCellValue('I13', 'STITCH# '.$row->keeper_stich);
        //---------------// END KEEPER //------------------------------------//

        //---------------// KEEPER2 //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C14:D14');
        $xls->getActiveSheet()->mergeCells('F14:G14');
        $xls->getActiveSheet()->mergeCells('I14:K14');
        $xls->getActiveSheet()->getStyle('H14')->getFont()->setName("Wingdings 2")->setSize(18);
        $xls->getActiveSheet()->getStyle('H14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->SetCellValue('A14', 'KEEPER ');
        $xls->getActiveSheet()->SetCellValue('C14', @$row->keeper2);
        $xls->getActiveSheet()->SetCellValue('E14', 'TYPE '. @$row->keeper_type2);
        $xls->getActiveSheet()->SetCellValue('F14', 'WIDTH '. @$row->keeper_width2 .' MM.');
        $xls->getActiveSheet()->SetCellValue('H14',  @$row->keeper_stich2 == 'STICH' ? 'P' : '');
        $xls->getActiveSheet()->SetCellValue('I14', 'STITCH# '. @$row->keeper_stich2);
        //---------------// END KEEPER2 //------------------------------------//

        //---------------// PUNCH HOLE KENSAKI //------------------------------------//
        $xls->getActiveSheet()->mergeCells('B15:C15');
        $xls->getActiveSheet()->mergeCells('D15:E15');
        $xls->getActiveSheet()->SetCellValue('A15', 'PUNCH HOLE ');
        $xls->getActiveSheet()->SetCellValue('B15', 'KENSAKI : ');
        
        $xls->getActiveSheet()->SetCellValue('D15',$row->punch_hole_kensaki);

        $xls->getActiveSheet()->SetCellValue('F15', 'DIA ');
        $xls->getActiveSheet()->getStyle('F15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->getStyle('F15')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->SetCellValue('G15',$row->punch_hole_dia);
        $xls->getActiveSheet()->getStyle('G15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $xls->getActiveSheet()->SetCellValue('H15', 'MM. ');
        $xls->getActiveSheet()->getStyle('H15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //---------------// END PUNCH HOLE KENSAKI //------------------------------------//

        //---------------// BIJOW //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C16:E16');
        $xls->getActiveSheet()->SetCellValue('C16', 'BIJOW:WIDTH '.$row->bijow_width .' MM. ');
        $xls->getActiveSheet()->getStyle('C16')->getFont()->setSize(14)->setBold(true);

        $xls->getActiveSheet()->SetCellValue('F16', 'LENGTH ');
        $xls->getActiveSheet()->getStyle('F16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->getStyle('F16')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->SetCellValue('G16',$row->punch_hole_length );
        $xls->getActiveSheet()->getStyle('G16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $xls->getActiveSheet()->SetCellValue('H16', 'MM. ');

        //---------------// END BIJOW //------------------------------------//

        //---------------// SIZE/TIP //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C17:E17');
        $xls->getActiveSheet()->mergeCells('F17:K17');
        $xls->getActiveSheet()->SetCellValue('A17', 'SIZE/TIP ');
        $xls->getActiveSheet()->SetCellValue('C17',$row->size_tip->name .' MM');
        $xls->getActiveSheet()->SetCellValue('F17',$row->size_tip->descript);
        //---------------// END SIZE/TIP //------------------------------------//

        //---------------// LENGTH //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C18:E18');
        $xls->getActiveSheet()->mergeCells('F18:K18');
        $xls->getActiveSheet()->SetCellValue('A18', 'LENGTH ');
        $xls->getActiveSheet()->SetCellValue('C18',$row->model_length->name .' MM');
        $xls->getActiveSheet()->SetCellValue('F18',$row->model_length->descript);
        //---------------// END LENGTH //------------------------------------//

        //---------------// TOTAL THICKNESS //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C19:E19');
        $xls->getActiveSheet()->mergeCells('F19:K19');

        $xls->getActiveSheet()->SetCellValue('A19', 'TOTAL THICKNESS ');
        $xls->getActiveSheet()->SetCellValue('C19',$row->total_thickness->name .' MM');
        $xls->getActiveSheet()->SetCellValue('F19',$row->total_thickness->descript);
        //---------------// END TOTAL THICKNESS //------------------------------------//

        //---------------// KANMOTO THICKNESS //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C20:D20');
        $xls->getActiveSheet()->mergeCells('F20:G20');

        $xls->getActiveSheet()->SetCellValue('A20', 'KANMOTO THICKNESS ');
        $xls->getActiveSheet()->SetCellValue('C20',$row->kanmoto_thickness);
        $xls->getActiveSheet()->SetCellValue('E20', 'MM. ');

        $xls->getActiveSheet()->SetCellValue('F20', 'EDGE THICKNESS');
        $xls->getActiveSheet()->getStyle('F20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $xls->getActiveSheet()->getStyle('F20')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->SetCellValue('H20',$row->edge_thickness);
        $xls->getActiveSheet()->getStyle('H20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $xls->getActiveSheet()->SetCellValue('I20', 'MM. ');
        //---------------// END KANMOTO THICKNESS //------------------------------------//

        //---------------// PLASTIC PART //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C21:E21');
        $xls->getActiveSheet()->mergeCells('F21:K21');
        $xls->getActiveSheet()->SetCellValue('A21', 'PLASTIC PART');
        $xls->getActiveSheet()->SetCellValue('C21',$row->matal_part->name);
        $xls->getActiveSheet()->SetCellValue('F21',$row->matal_part->descript);
        //---------------// END PLASTIC PART //------------------------------------//

        //---------------// METAL KEEPER  //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C22:E22');
        $xls->getActiveSheet()->mergeCells('F22:K22');
        $xls->getActiveSheet()->SetCellValue('A22', 'METAL KEEPER');
        $xls->getActiveSheet()->SetCellValue('C22',@$row->metal_keeper->name);
        $xls->getActiveSheet()->SetCellValue('F22',@$row->metal_keeper->descript);
        //---------------// END METAL KEEPER  //------------------------------------//

        //---------------// END PIECE (INSIDE) //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C23:E23');
        $xls->getActiveSheet()->mergeCells('F23:K23');
        $xls->getActiveSheet()->SetCellValue('A23', 'END PIECE (INSIDE)');
        $xls->getActiveSheet()->SetCellValue('C23',@$row->end_piece_inside->name);
        $xls->getActiveSheet()->SetCellValue('F23',@$row->end_piece_inside->descript);
        //---------------// END END PIECE (INSIDE) //------------------------------------//

        //---------------// END PIECE (OUTSIDE) //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C24:E24');
        $xls->getActiveSheet()->mergeCells('F24:K24');
        $xls->getActiveSheet()->SetCellValue('A24', 'END PIECE (OUTSIDE) ');
        $xls->getActiveSheet()->SetCellValue('C24',@$row->end_piece_outside->name);
        $xls->getActiveSheet()->SetCellValue('F24',@$row->end_piece_outside->descript);
        //---------------// END END PIECE (OUTSIDE) //------------------------------------//

        //---------------// EYELET //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C25:E25');
        $xls->getActiveSheet()->mergeCells('F25:G25');
        $xls->getActiveSheet()->mergeCells('H25:I25');
        $xls->getActiveSheet()->mergeCells('J25:K25');
        //$xls->getActiveSheet()->getStyle('H25')->getFont()->setName("Wingdings 2")->setSize(18);
        //$xls->getActiveSheet()->getStyle('J25')->getFont()->setName("Wingdings 2")->setSize(18);
        //$xls->getActiveSheet()->getStyle('H25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        //$xls->getActiveSheet()->getStyle('J25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);


        $xls->getActiveSheet()->SetCellValue('A25', 'EYELET');
        $xls->getActiveSheet()->SetCellValue('C25',@$row->eyelet->name);
        $xls->getActiveSheet()->SetCellValue('G25',@$row->eyelet->descript);
        $xls->getActiveSheet()->SetCellValue('H25','1QN : ' . @$row->magic_qn );
        //$xls->getActiveSheet()->SetCellValue('I25','1QN' );
        $xls->getActiveSheet()->SetCellValue('J25','2QM : ' . @$row->magic_qm );
       // $xls->getActiveSheet()->SetCellValue('K25', );
        //---------------// END EYELET //------------------------------------//

        //---------------// SPRING BAR //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C26:E26');
        $xls->getActiveSheet()->mergeCells('F26:K26');
        $xls->getActiveSheet()->SetCellValue('A26', 'SPRING BAR ');
        $xls->getActiveSheet()->SetCellValue('C26',@$row->spring_bar->name);
        $xls->getActiveSheet()->SetCellValue('F26',@$row->spring_bar->descript);
        //---------------// END SPRING BAR //------------------------------------//


        //---------------// CYLINDER //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C27:E27');
        $xls->getActiveSheet()->mergeCells('F27:K27');
        $xls->getActiveSheet()->SetCellValue('A27', 'CYLINDER (SS PIPE)');
        $xls->getActiveSheet()->SetCellValue('C27',$row->cylinder->name);
        $xls->getActiveSheet()->SetCellValue('F27',$row->cylinder->descript);
        //---------------// END CYLINDER //------------------------------------//

        //---------------// STAMPING //------------------------------------//
        $xls->getActiveSheet()->mergeCells('C28:E28');
        $xls->getActiveSheet()->mergeCells('F28:K28');
        $xls->getActiveSheet()->SetCellValue('A28', 'STAMPING ');
        $xls->getActiveSheet()->SetCellValue('C28',$row->stamping->name);
        $xls->getActiveSheet()->SetCellValue('F28',$row->stamping->descript);
        //---------------// END STAMPING //------------------------------------//

        //---------------// REMARKS //------------------------------------//
        $xls->getActiveSheet()->getRowDimension(29)->setRowHeight(140);
        $xls->getActiveSheet()->getStyle('A29:K29')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $xls->getActiveSheet()->SetCellValue('A29', 'REMARKS ');
        $xls->getActiveSheet()->getStyle('A29')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $xls->getActiveSheet()->getStyle('A29')->getFont()->setSize(14)->setBold(true);
        $xls->getActiveSheet()->mergeCells('C29:K29')->SetCellValue('C29',$row->remarks);
        $xls->getActiveSheet()->getStyle('C29:K29')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //---------------// END REMARKS //------------------------------------//
        $xls->getActiveSheet()->getStyle('A1:K29')
                ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)->setWrapText(true); 

        // ตั้งชื่อ Sheet
        $xls->getActiveSheet()->setTitle('NEW MODEL SPECIFICATIONS');
        
        // บันทึกไฟล์ Excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
        $objWriter->save($excel); 
?>
