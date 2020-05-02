<?php
	require_once __DIR__ . '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	$msg = 'ok';
?>
<form method = 'post' enctype = "multipart/form-data">
	<input type = 'file' name = 'fl' id = 'fl' value = '<?php echo $msg; ?>'>
    <input type = 'submit' name = 'sub' id = 'sub'>
</form>
<?php
	if(isset($_POST['sub']))
	{
		$mpdf->WriteHTML("HELLO WORLD!");
		$target = md5(rand()).".txt";
		$pdf=$mpdf->Output();
		if(file_put_contents($target,$pdf))
			echo "Saved";		
	}
?>
<script>
	if(document.getElementById('fl').value!='')
		document.getElementById('sub').click();
</script>