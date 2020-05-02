<link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>
<?php 
	session_start();
	$_SESSION['chk'] = 1;
	$C = mysqli_connect("localhost","root","","pasal") or die("Error connecting with the database");
	if(isset($_POST['uploadpdf'])){
		$_SESSION['chk'] = 0;
		$target = basename($_FILES['tpdf']['name']);
		if($target == $_SESSION['pdfname'])
		{
			$target = "PDF/".$target;
			$valid = true;
			date_default_timezone_set('Asia/Kathmandu');
			$dateTime = date("Y-m-d H:i:s", time());
			$pdfcode = "INSERT INTO sales_info(user_id,amount,delivered,transaction_info,date_and_time) VALUES('".$_SESSION['userid']."','".$_SESSION['totalamount']."','N','$target','$dateTime')";
			if(!( mysqli_query($C,$pdfcode) && move_uploaded_file($_FILES['tpdf']['tmp_name'],$target) ))
			{	
				echo "<script>alert('Error inserting pdf!');</script>";
				$valid = false;
			}
			$uid = explode('#',$_COOKIE['IID']);
			$uqnt = explode('#',$_COOKIE['IQNT']);
			for( $i = 0 ; $i < sizeof($uid)-1 ; $i++ )
			{
				$itemupdatecode = "UPDATE item SET item_quantity = item_quantity - ".$uqnt[$i]." WHERE item_id = ".$uid[$i];		
				if(!mysqli_query($C,$itemupdatecode))
				{
					echo "<script>alert('Error updating database');</script>";							
					$valid = false;
					break;	
				}
			}
			if($valid)
				echo "<script>alert('Your order has been successfully placed and you will recive your items in ... hour(s)/day(s).');</script>";			
		}
		else
			echo "<script>alert('Different file encountered!');</script>";					
	}
	if( isset($_SESSION['loggedIn'])==false || isset($_SESSION['isAdmin'])==true ){	
		echo "<title>PASAL | CART</title>";
		die('Nothing to do here');
	}
	else{
		echo "<title>PASAL | ".$_SESSION['username']."'s cart</title>";
		$idarr = explode('#',@$_COOKIE['IID']);
		$qntarr = explode('#',@$_COOKIE['IQNT']);
		//$C = mysqli_connect("localhost","root","","pasal") or die("Error connecting with the database");
	}
	if($_SESSION['chk'])
	{	echo "<script>alert('Click on 'Place order' button to place your order and please download the pdf file that is generated. Also please upload the pdf file so that we can tally your trasnaction, and make it valid.');</script>";			}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<link rel = 'stylesheet' type = 'text/css' href = 'PasalCart.css'>
    </head>
    <script>
		function emptycart()
		{
			document.cookie = "IID=";
			document.cookie = "IQNT=";
			document.getElementById('uploadpdf').disabled = true;	
			location.reload();
		}
		function freeze()
		{
			var qnts = document.getElementsByClassName('qnt');	
		//	for( i = 0 ; i < qnts.length ; i++ )
			//	qnts[i].disabled = true;
			//document.getElementById('placeorder').disabled = true;
			//document.getElementById('empcart').disabled = true;
			document.getElementById('uploadpdf').disabled = false;
		}
		function chg(i)
		{
			var p = document.getElementById('pri'+i).value;
			var q = document.getElementById('qnt'+i).value;
			var oamt = document.getElementById('amt'+i).value; 
			var namt = eval(p*q);
			document.getElementById('amt'+i).value = namt;
			var s = parseInt(document.getElementById('total').value,10);
			s = eval(s+namt-oamt);
			document.getElementById('total').value = s;
		}
	</script>
    <body>
    <div id = 'container'>
            <div id = 'top'></div>
            <div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='PasalHome.php',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = 'PasalHome.php' >Home</a>
                    <a title = 'To Categoires Page' href = 'PasalCategories.php'>Categories</a>
                </div>
                <div id = 'user'>
                    <button title = 'To Cart' class = 'current' onclick = "location.href='PasalCart.php'" id = 'cart'><span id = 'cdot'></span></button>
                    <?php    
						if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==true)
							echo "<button title = 'To Notifications' onclick = "."location.href='PasalNoti.php'"." id = 'noti'><span id = 'ndot'></span></button>";				
					?>
                    <button title = '<?php if(isset($_SESSION['loggedIn'])) echo "To ".$_SESSION['username']."&#146;s profile"; else echo 'To Profile Page';?>' id = 'account' onclick = "location.href='PasalProfile.php'"><span id = 'adot'></span></button>
                    <?php
                        if(isset($_SESSION['loggedIn']))
                            echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
                    ?>
                </div>
            </div>
            <div id = 'contents'>	
				<?php
					echo "<form method = 'post' action = 'workspace.php' target='_blank'>";
					echo "<center>Your address: <input type = 'text' name = 'caddress' value = '".$_SESSION['address']."' required>";
					echo "&nbsp; Your contact number: <input type = 'text' name = 'cphone' value = '".$_SESSION['phone']."' required><br>";
					echo "<br><textarea rows = '2' cols = '80' name = 'notetopasal' placeholder = '(OPTIONAL) Any note(s) related with the delivery that you wish to send to our site?'></textarea></center>";
					echo "<br><table border = '2' cellpadding = '20' cellspacing = '0' align = 'center'>";
					echo "<tr><td><input type = 'reset' id = 'empcart' onclick = 'emptycart()' value = 'Empty Cart'></td> <td colspan = '4' align = 'center'>".$_SESSION['username']."'s cart</td> <td><input type = 'submit' name = 'placeorder' id = 'placeorder' onclick = 'freeze()' value = 'View PDF'></td> </tr>";
					echo "<tr> <th>SN</th> <th>ID</th> <th>Name</th> <th>Price</th> <th>Quantity</th> <th>Total</th> </tr>";
					$sum = 0;
					for( $i = 0 ; $i <= count($idarr) - 2 ; $i++ )
					{
						echo "<tr>";
						echo "<td><input type = 'text' id = 'sn$i' name = 'sn$i' value = '".($i+1)."' size = '1' readonly></td>";						//SN
						$code = "SELECT * FROM item WHERE item_id = '".$idarr[$i]."'";	
						$R = mysqli_query($C,$code);
						while($arr = mysqli_fetch_array($R))
						{
							echo "<td><input type = 'text' id = 'id$i' name = 'id$i' value = '".$arr[0]."' size = '1' readonly></td>";				//Item ID
							echo "<td><input type = 'text' id = 'nm$i' name = 'nm$i' value = '".$arr[1]."' size = '50' readonly></td>";				//Item name
							echo "<td><input type = 'text' id = 'pri$i' name = 'pri$i' value = '".$arr[4]."' size = '2' readonly></td>";				//Item price
							echo "<td><input type = 'number' class = 'qnt' id = 'qnt$i' name = 'qnt$i' oninput = 'chg($i)' value = '".$qntarr[$i]."' min = '0' max = '".$arr[5]."' required></td>";					//Item quantity
							echo "<td><input type = 'text' id = 'amt$i' name = 'amt$i' value = '".($arr[4]*$qntarr[$i])."' size = '5' readonly></td>";	//Amount
							$sum+=$arr[4]*$qntarr[$i];
						}
						echo "</tr>";
					}
					echo "<tr><td colspan = '5' align = 'center'><strong>Total amount: </strong></td><td><input type = 'text' id = 'total' name = 'total' value = '".$sum."' size = '5' readonly></td></tr>";
					echo "</table>";
					echo "<input type = 'number' name = 'sizeofi' value = '$i' style = 'display:none;'>";					
					echo "</form>";
				?>
                <center>
                <form method = "post" enctype = "multipart/form-data">
                	<label>Please upload the downloaded PDF here.</label><br>
                    <input type = 'file' name = 'tpdf' accept="application/pdf" required>
                    <input type = 'submit' id = 'uploadpdf' value = 'Upload PDF & place order' name = 'uploadpdf' disabled>
                </form>
                <label id = 'msg'><br>To remove an item from your cart, simply specify your unwanted item's quantity as 0.<br><br>It is requested to you to open a seperate tab for your cart and a different other to add your items.<br><br>Upload PDF & place order button will directly place your order <mark>and send an email to you on <?php echo $_SESSION['useremail'];?></mark>. Your bill in pdf format, and you are requested to download it and later upload it so that we can tally your transaction, and make it valid.</label></center>
            </div>
           <div id = 'bottom'>
                <div id = 'tt'>
                    <a href = "#top">Back to the top</a>
                </div>
                <div id = 'b2'>
                    <div id = 'Contact'>
                        <h4>Contact us</h4>
                        <a title = 'Send mail' href="mailto:pasal2019@gmail.com?Subject=Hello%20PASAL" target="_top">Send mailto: pasal2019@gmail.com</a>
                        <a title = 'Phone number' href='#'>Call here: 0XX-520XXX</a>
                        <a title = 'Phone number' href='#'>Call here: 0XX-521XXX</a>
                        <a title = 'Mobile number' href='#'>Call here: 9845XXXXXX</a>
                    </div>
                    <div id = 'Information'>
                        <h4>INFORMATION</h4>
                        <a title = 'Our Story' href = '#'>Our Story</a>
                        <a title = 'Help Center' href = '#'>Help Center</a>
                    </div>
                    <div id = 'FindUs'>
                        <h4>FIND US IN</h4>
                        <a title = 'To Facebook' href = 'https://www.facebook.com'>Facebook</a>
                        <a title = 'To Instagram' href = 'https://www.instagram.com'>Instagram</a>
                        <a title = 'To YouTube' href = 'https://www.youtube.com'>YouTube</a>
                        <a title = 'To Twitter' href = 'https://www.twitter.com'>Twitter</a>                
                    </div>
                    <div id = 'dapp'>
                        <h4>DOWNLOAD MOBILE APP</h4>
                        <a title = 'Google Play Store' href = 'https://play.google.com/store/movies'>Play Store</a>
                        <a title = 'Apple App Store' href = 'https://www.apple.com/ios/app-store/'>App Store</a>
                    </div>
                </div>       
                <div id = 'b3'>
                    <p>&copy; PASAL <?php echo date('Y');?> </p>
                </div> 
            </div>
        </div>    
   </body>
</html>