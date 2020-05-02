<?php
	require_once 'dompdf/dompdf/autoload.inc.php';
	//require_once __DIR__ . '../vendor/autoload.php';
	//use Dompdf\Dompdf;
	//require_once __DIR__ . '../vendor/autoload.php';
	use \Dompdf\Dompdf;
	class Pdf extends Dompdf{
		public function __construct()
		{
			parent::__construct();	
		}
	}
?>