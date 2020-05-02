<?php
	session_start();
	require_once __DIR__ . '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
	if(isset($_POST['placeorder']))
	{
		$C = mysqli_connect('localhost','root','','pasal') or die("Error connecting with the database");
		$code = 'SELECT bill_no FROM sales_info ORDER BY bill_no DESC LIMIT 1';
		$R = mysqli_query($C,$code);
		$arr = mysqli_fetch_array($R);
		$a = $_POST;
		$n = $a['sizeofi'];	
		$sn = 0;$sum=0;
		$bid = (int)$arr[0]+1; 
		$_COOKIE['IID']='';
		$_COOKIE['IQNT']='';
		$output = "<style>span{color:green;font-size: 15px;}caption{font-size: 25px;font-weight:bold;margin-bottom:50px;}th{text-align:left;}</style><table> <caption>Pasal's bill</caption><tr><th>Date: </th><td><u>".date('Y-m-d')."</u></td></tr><tr><th>Recipient: </th><td><u>".$_SESSION['fullname']."</u></td></tr><tr><th>Address: </th><td><u>".$a['caddress']."</u></td></tr><tr><th>Phone: </th><td><u>".$a['cphone']."</u></td></tr><tr><th>Bill no:</th><td><u>".$bid."</u></td></tr></table><br><table><tr><th>SN</th><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Amount</th></tr>";
		$i=-1;
		while(++$i<$n){
			if($a["qnt$i"]==0)
				continue;
			$_COOKIE['IID'].= $a['id$i'].'#';
			$_COOKIE['IQNT'].= $a['qnt$i'].'#';
			$output.="<tr><td>".(++$sn)."</td><td>".$a["id$i"]."</td><td>".$a["nm$i"]."</td><td>".$a["pri$i"]."</td><td>".$a["qnt$i"]."</td><td>".$a["amt$i"]."</td></tr>";	
			$sum+=$a["amt$i"];
		}
		$dc = 250;
		$tax = ceil((0.15*$sum));
		$dis= 100;
		$sum+=$tax+$dc-$dis;
		$output.="<tr><th></th><th></th><th>Additional charges & discount</th></tr><tr><td>".++$sn."</td><td></td><td>Delivery charges: </td><td></td><td></td><td>".$dc."</td></tr><tr><td>".++$sn."</td><td></td><td>Tax(15%): </td><td></td><td></td><td>".$tax."</td></tr><tr><td>".++$sn."</td><td></td><td>Discount: </td><td></td><td></td><td>".$dis."</td></tr><tr><td></td><td></td><th>Total amount:</th><td></td><td></td><th>".ceil($sum)."</th></tr></table>"; 
		$_SESSION['totalamount']=ceil($sum);
		if($a['notetopasal']!='')
			$output.="<br><br><strong>Note to PASAL: </strong><label>".$a['notetopasal']."</label>";
		$output.="<br><strong>Note to the customer: </strong><label>This bill will be used for verification at the time of item delivery.</label><br><span>Thank you for shopping from PASAL.</span>";
		$mpdf->WriteHTML($output);	
		$_SESSION['pdfname'] = md5(rand()).'.pdf';
		$PDF=$mpdf->Output($_SESSION['pdfname'],'D');			
	}else	die("Nothing to do here");
?>
<style>
</style>