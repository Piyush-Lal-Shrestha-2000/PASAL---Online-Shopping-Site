<?php session_start(); 
	echo "<title>PASAL | Profile Page</title>";
	if(!isset($_SESSION['loggedIn']))
		die("Nothing to do here...<br><a href='PasalHome.php'>To homepage</a> <a href='PasalLogin.php'>To loginpage</a>");
	if(!isset($_SESSION['username']))
        	echo "<title>PASAL | ".$_SESSION['username']."</title>";
	$C = mysqli_connect('localhost','root','','pasal') or die('Error while connecting with the database');
?>
<script language = 'javascript'>
	function hidetable(direction)
	{
		document.getElementById('transactionsTable').style.display = 'none';		
		document.getElementById('vhbuttonsection').innerHTML = "<button onclick = 'viewtable()' id = 'ViewHide'>View your transactions</button>";		
	}
	function viewtable()
	{
		document.getElementById('transactionsTable').style.display = 'table';	
		document.getElementById('vhbuttonsection').innerHTML = "<button onclick = 'hidetable()' id = 'ViewHide'>Hide your transactions</button>";
	}
</script>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>
        <link rel = 'stylesheet' type = 'text/css' href = 'PasalProfile.css'>
    </head>
    <body onload = "hidetable()">
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
                            echo "<button title = 'To Settings' onclick = "."location.href='PasalSettings.php'"." id = 'settings'><span></span></button>";					echo "&nbsp;<button title = 'To Notifications' onclick = "."location.href='PasalNoti.php'"." id = 'noti'><span id = 'ndot'></span></button>";}
						else
                            echo "<button title = 'To Cart' onclick = "."location.href='PasalCart.php'"." id = 'cart'><span id = 'cdot'></span></button>";				
					?>
                    <button title = '<?php if(isset($_SESSION['loggedIn'])) echo "To ".$_SESSION['username']."&#146;s profile"; else echo 'To Profile Page';?>' class = 'current' id = 'account' onclick = "location.href='PasalProfile.php'"><span id = 'adot'></span></button>
                    <?php
						if(isset($_SESSION['loggedIn']))
							echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
					?>
                </div>
            </div>
            <?php
				if(isset($_POST['lout'])){
					session_destroy();
					header("location:PasalLogin.php");
				}
			?>
            <div id = 'contents'>
            	<?php
					$code = "SELECT * FROM user_accounts WHERE username = '".$_SESSION['username']."'";
					$R = mysqli_query($C,$code);
					$arr = mysqli_fetch_array($R);
					echo "<table align = 'center'>";
					echo "<tr> <th colspan = '3'><span>".$_SESSION['username']."&#146;s profile</span> <form method = 'post'>                    <input type = 'submit' name = 'lout' value = 'Logout'></form></th> </tr>";	
					echo "<tr> <td>User ID:</td> <td>".$arr[0]."</td> <td rowspan = '6' width = '170px' align = 'center' >                    Photo here</td></tr>";
					echo "<tr><td>Name:</td><td style = 'font-weight:bold;color:#009879;'>".$arr[3].' '.$arr[4]."</td></tr>";
					echo "<tr><td>Username:</td><td>".$arr[1]."</td></tr>";
					echo "<tr><td>Contact no:</td><td>".$arr[8]."</td></tr>";
					echo "<tr><td>Email:</td><td>".$arr[7]."</td></tr>";
					echo "<tr><td>Address:</td><td>".$arr[9]."</td></tr></table>";
				?>
           </div>
		   <?php
		   		if(isset($_SESSION['isAdmin'])!=true)
					echo "<center id = 'vhbuttonsection'><button onclick = 'viewtable()' id = 'ViewHide'>View your transactions</button></center><br>";
		   		$code = "SELECT * FROM sales_info WHERE user_id = ".$_SESSION['userid'];	
				$res = mysqli_query($C,$code);
				echo "<table id = 'transactionsTable' align = 'center'>";
				echo "<tr><th>Bill number</th><th>Date & Time</th><th>Transaction</th></tr>";
				while($arr = mysqli_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>".$arr[0]."</td>";
					echo "<td>".$arr[5]."</td>";
					echo "<td><a href = '".$arr[4]."' target = '_blank'>View</a></td>";
					echo "</tr>";	
				}
				echo "</table><br>";
				echo "<div id = 'bottom'>
                <div id = 'tt'>
                    <a href = '#top'>Back to the top</a>
                </div>
                <div id = 'b2'>
                    <div id = 'Contact'>
                        <h4>Contact us</h4>
                        <a title = 'Send mail' href='mailto:pasal2019@gmail.com?Subject=Hello%20PASAL' target='_top'>Send mailto: pasal2019@gmail.com</a>
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
	        </div>";
		   ?>	
           
        </div>
    </body>
</html>