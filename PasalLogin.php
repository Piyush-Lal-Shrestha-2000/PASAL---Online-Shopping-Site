<?php session_start();
$C = mysqli_connect("localhost","root","","pasal");
	if(isset($_SESSION['loggedIn'])){
			echo "<title>PASAL | LOGOUT</title><link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>";
			echo "<form method = 'post'><button name = 'logout'>Logout</button></form>";
			if(isset($_POST['logout']))
			{
				session_destroy();
				header("location:PasalLogin.php");
			}
			die("<br><a href = 'PasalHome.php'>To homepage</a>");
	}
?>
<!doctype html>
<html>
	<head>
        <meta charset="utf-8">
        <title>PASAL | LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ='icon' href = 'https://img.icons8.com/officel/16/000000/shopping-cart.png'>
		<link rel = 'stylesheet' type = 'text/css' href = 'PasalLogin.css'>
    </head>
    <body>
    	<div id = 'top'></div>
       	<div id = "container">
        	<div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='#',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = 'PasalHome.php'>Home</a>
                    <a title = 'To Login Page' href = '#' class = 'current'>Login</a>
            	</div>
            </div>
            <div id = "boxholder">
            	<center>
                <div class = 'box'>
                    <h2>Login</h2>
                    <form method = 'post'>
                        <div class = 'inputbox'>
                            <input type = 'text' name = 'username' required>
                            <label>Username</label>
                        </div>
                        <div class = 'inputbox'>
                            <input type = 'password' name = 'password' required>
                            <label>Password</label>
                        </div>
                        <input type = 'submit' name = 'login' style = 'float: left;' value = 'Login'>
                    </form>
                    <input type = 'submit' name = 'create' class = 'sty' onclick = "location.href = 'PasalCreateAccount.php';" value = 'Create your account'>
                </div> 
                </center>
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
	if(isset($_POST['login']))
	{
		$nm = $_POST['username']; $pw = $_POST['password']; $chk = false;
		$code = "SELECT * FROM user_accounts WHERE username = '$nm'";
		$res = mysqli_query($C,$code);
		while($row = mysqli_fetch_array($res))
		{
			if(password_verify($pw,$row['password'])){
				$chk = true;
				$_SESSION['username'] = $nm;
				$_SESSION['loggedIn'] = true;
				$_SESSION['userid'] = $row['user_id'];
				$_SESSION['fullname'] = $row[3]." ".$row[4];
				$_SESSION['useremail'] = $row['email'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['phone'] = $row['contact_no'];
				if($row['post']=='admin')
					$_SESSION['isAdmin'] = 	true;
				else
				{ $_COOKIE['IID']=''; $_COOKIE['IQNT']='';}
			}
		}		
		if($chk){echo "<script>alert('WELCOME');</script>'";	
			header("location: PasalHome.php");	
		}else
			echo "<script>alert('Invalid username or password');</script>'";
	}
?>