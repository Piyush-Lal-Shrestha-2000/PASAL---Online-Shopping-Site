<?php
	//require("PdfToText-master\PdfToText.phpclass");
	require_once __DIR__ . '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$data = "<table><tr><td>HELP</td></tr><tr><td>This is something...</td></tr></table>";
	$dat = "HELP This is something...";
	//$mpdf->SetVisibility('hidden');
	//$mpdf->WriteHTML($data);
	//$mpdf->SetVisibility('visible');
	//$mpdf->WriteHTML("HELLO");
	//$mpdf->Output("Test.pdf","D");
	$parser = new \Smalot\PdfParser\Parser();
	$pdf    = $parser->parseFile('Test.pdf');
	$text = $pdf->getText();
	//if($text==$dat)
	//	echo "OK";
	//else 
		//echo "Not ok";
	echo $text;
?>