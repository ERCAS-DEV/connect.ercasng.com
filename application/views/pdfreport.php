<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
//$title = "PDF Report";
$title  = $billerdt[0]->company_name;
$logo = $billerdt[0]->company_logo;
$obj_pdf->SetTitle($title);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->SetHeaderData($logo, PDF_HEADER_LOGO_WIDTH, $title,'Address - '. $billerdt[0]->billerAddress.' Mobile - '.$billerdt[0]->mobile);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
 // we can have any view part here like HTML, PHP etc
//$content = ob_get_contents();
//$content = $analysisarr;
$filds = array();
$content = '<table><tr>';
$i=0;
foreach($tbl_str as $fields){
	if($i>1 && $i<= 9){
		$content .= '<td style="font-weight:bold;">'.$fields.'</td>';
	}
	$i++;
}
$content .= '</tr>';
$j=0;
foreach($analysisarr as $list){	
	$k=0;
	$content .= '<tr>';	
	foreach($list as $ls){	
		if($k>1 && $j <= 7){
			$content .= '<td>'.$ls.'</td>';
		}
		$k++;
	}
	$content .= '</tr>';
	$j++;
}
$content .= '</table>';
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');

?>