<?php
	require_once __DIR__ . '/vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();	
	$data = 'Hello this should be in my pdf';
	$mpdf->WriteHTML($data);
	$mpdf->Output("MyPDF.pdf","D");
	//echo $arr;
?>