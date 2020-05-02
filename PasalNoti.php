<?php session_start(); 
	//header("Refresh:0");
?>
<!doctype html>
<html>
<head>
<style>
	th{
		color:#13962A;	
	}
	#red{
		color: #CB4446;
		background:#D9CCCC;
		font-weight:bolder;
	}
	#green{
		//color:#13962A;
		color: black;
		background:#64C8C0;
		font-weight:bolder;
	}
	#maincontents{
		padding: 10px;
		margin: 20px 0;
	}
</style>
<link rel = 'stylesheet' href = 'PasalProfile.css'>
<meta charset="utf-8">
	<?php
		if(!isset($_SESSION['loggedIn']))
			die("Nothing to show here....<br><a href = 'PasalHome.php'>Go to home page.</a> <a href = 'PasalLogin.php'>Go to login page.</a>");		
		if(isset($_SESSION['username'])) 
 			echo "<title>PASAL | Notifications | ".$_SESSION['username']."</title>";
		else
			echo "<title>PASAL | Notifications</title>";
		echo "<link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>";
		$C = mysqli_connect("localhost",'root','','pasal');
		$arrofid = array();
	?>
</head>
<body>
	<div id = 'container'>
            <div id = 'top'></div>
            <div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='PasalHome.php',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = 'PasalHome.php' >Home</a>
                </div>
                <div id = 'user'>
					<?php
                        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==true){
                            echo "<button title = 'To Settings' onclick = "."location.href='PasalSettings.php'"." id = 'settings'><span></span></button>";					echo "&nbsp;<button title = 'To Notifications' class = 'current' onclick = "."location.href='PasalNoti.php'"." id = 'noti'><span id = 'ndot'></span></button>";}
						else
                            echo "<button title = 'To Cart' onclick = "."location.href='PasalCart.php'"." id = 'cart'><span id = 'cdot'></span></button>";				
					?>
                    <button title = '<?php if(isset($_SESSION['loggedIn'])) echo "To ".$_SESSION['username']."&#146;s profile"; else echo 'To Profile Page';?>'  id = 'account' onclick = "location.href='PasalProfile.php'"><span id = 'adot'></span></button>
                    <?php
						if(isset($_SESSION['loggedIn']))
							echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
					?>
                </div>
            </div>
			<div id = 'maincontents'>
	<?php
		$itr = 0;
			if(isset($_SESSION['isAdmin'])){
    			echo "<details ><br>";
				echo "<summary id = 'red'>Item's notifications</summary>";
				$code = "SELECT * FROM item WHERE item_quantity<5";
				$res = mysqli_query($C,$code);
				$chk = true;$i=1;
				echo "<table border = '1' cellpadding = '20' cellspacing = '2'>";
				echo "<tr> <th id = 'green'>SN</th> <th id = 'green'>Item ID</th> <th id = 'green'>Items with quantity below 5</th> <th id = 'green'>Quantity</th> </tr>";
				while($R = mysqli_fetch_array($res))
				{
					$chk = false;
					echo "<tr id = 'red'> <td>".$i++."</td> <td>".$R['item_id']."</td> <td>".$R['item_name']."</td> <td>".$R['item_quantity']."</td> </tr>";	
				}
				if($chk)
					echo "<tr> <td>$i</td> <td>None</td> </tr>";	
				echo "<a href = 'PasalSettings.php'>Goto settings</a><br><br>";
				echo "</table><br></details>";
				echo "<br><details> <summary id = 'red'>User's notifications</summary> </details>";
				echo "<br><details open>";
				echo "<summary id = 'red'>Transactions</summary><br>";
				$code = "SELECT * FROM sales_info";
				$R = mysqli_query($C,$code);
				echo "<table border = '1' cellpadding = '10' cellspacing = '5'><form method = 'post'>";
				echo "<tr> <th>SN.</th> <th>Bill no</th> <th>User ID</th> <th>Amount(in Rs.)</th> <th>Delivered(Y/N)</th> <th>Transaction info</th> <th>Date & Time</th><th>Delivered on</th> </tr>";
				while($arr = mysqli_fetch_array($R))
				{
					$arrofid[$itr] = $arr[0];
					if($arr[3]=='N')
						echo "<tr align = 'center' id = 'red'>";
					else
						echo "<tr align = 'center' id = 'green'>";
					echo "<td>".++$itr."</td><td>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>";
					$statement = $arr[3]=='N'?"Y <input type = 'radio' value = 'Y#$arr[0]' name = 'det$itr'> N <input type = 'radio' value = 'dis' name = 'det$itr' checked disabled>":"Y <input type = 'radio' value = 'dis' name = 'det$itr' disabled checked> N <input type = 'radio' value = 'N#$arr[0]' name = 'det$itr'>";
					echo $statement."</td><td><a href = '".$arr[4]."' target = '_blank'>View PDF</a></td><td>".$arr[5]."</td><td>".$arr[6]."</td>";
					echo "</tr>";	
				}
				echo "<tr><td><input type = 'submit' id = 'updatedelivery' value = 'Update' name = 'updatedelivery'></td></tr></form></table></details>";	
			}
			else 
				echo "No notifications yet";
		$performreload = false;
		if(isset($_POST['updatedelivery']))
		{
			$n = sizeof($arrofid);
			for( $i = 0 ; $i < $n ; $i++ )
			{
				$c = $i + 1;
				echo "<pre>";
				if( isset($_POST["det$c"]))//&& $_POST["det$c"] != 'dis' )
				{
					//$billno = substr($_POST["det$c"],1);		
					date_default_timezone_set('Asia/Kathmandu');
					$dateTime = date("Y-m-d H:i:s", time());
					$valarr = explode('#',$_POST["det$c"]); // 0 -> val, 1 -> billno
					if($valarr[0]=='N')
						$dateTime = "0000-00-00 00:00:00";
					$code = "UPDATE sales_info SET delivered = '$valarr[0]', date_of_delivery = '$dateTime' WHERE bill_no = '$valarr[1]' ";
					mysqli_query($C,$code);
					$performreload = true;
					/*if(mysqli_query($C,$code))
						echo "Bill no: ".$valarr[1]." | Delivered: ".$valarr[0];*/
				}	
			}
			//sleep(2);
			//echo "<script> location.reload();";
			@header("Refresh:0");
		}
	?>
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
                        <a title = 'Our Story' href = 'PasalExtra.php'>Our Story</a>
                        <a title = 'Help Center' href = 'PasalExtra.php'>Help Center</a>
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
<?php
	//if($performreload)
		//header("Refresh:0");
?>