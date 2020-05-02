<!doctype html>
<html>
	<head>
        <meta charset="utf-8">
        <title>PASAL | Create your account</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ='icon' href = 'https://img.icons8.com/officel/16/000000/shopping-cart.png'>
		<link rel = 'stylesheet' type = 'text/css' href = 'PasalCreateAccount.css'>
    </head>
    <body>
    	<div id = 'top'></div>
       	<div id = "container">
        	<div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='#',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = 'PasalHome.php'>Home</a>
                    <a title = 'To Login Page' href = 'PasalLogin.php' class = 'current'>Login</a>
            	</div>
            </div>
            <div id = "boxholder">
            	<center>
                <div class = 'box'>
                    <h2>Create your account</h2>
                    <form method = 'post'>
                    	<div class = 'inputbox'>
                            <input type = 'text' name = 'username' required>
                            <label>Username</label>
                        </div>
                        <div class = 'inputbox' >
                            <input type = 'password' name = 'password' required>
                            <label>Password</label>
                        </div>
                        <div class = 'inputbox'>
                            <input type = 'text' name = 'firstname' required>
                            <label>Firstname</label>
                        </div>
                        <div class = 'inputbox'>
                            <input type = 'text' name = 'lastname' required>
                            <label>Lastname</label>
                        </div>
                        <div class = 'inputbox'>
                                <input type = 'email' name = 'email' required>
                                <label>E-mail</label>
                            </div>
						<div class = 'inputbox'>
                            <input type = 'text' name = 'phone' required>
                            <label>Contact number</label>
                        </div>
                        <div class = 'inputbox'>
                            <input type = 'text' name = 'address' required>
                            <label>Address</label>
                        </div>
                        <input type = 'submit' name = 'create'  value = 'Create your account'>
                    </form>
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
<?php
	if(isset($_POST['create']))
	{
		$un = $_POST['username'];
		$pw = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$fn = $_POST['firstname'];
		$ln = $_POST['lastname'];
		$em = $_POST['email'];
		$phn = $_POST['phone'];
		$add = $_POST['address'];
		$post = 'customer';
		$C = mysqli_connect('localhost','root','','pasal') or die('Unable to connect to the database');
		$idcode = "SELECT user_id FROM user_accounts ORDER BY user_id DESC LIMIT 1";
		$id = '';
		$r = mysqli_query($C,$idcode);
		while($R = mysqli_fetch_array($r))
			$id = 1 + $R[0];	
		$inscode = "INSERT INTO user_accounts(user_id,username,password,firstname,lastname,post,email,contact_no,address) VALUES($id,'$un','$pw','$fn','$ln','$post','$em','$phn','$add')";
		if(mysqli_query($C,$inscode))
			echo "<script>alert('Your account has been successfully created! Now login to access our services'); location.replace('PasalLogin.php');</script>";		
		else
			echo "<script>alert('Error occurred while creating your account, try on a different username!');</script>";
	}?>