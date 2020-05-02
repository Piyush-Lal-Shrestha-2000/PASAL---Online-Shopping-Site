<?php session_start();
$C = mysqli_connect("localhost","root","","pasal");
	if(@$_SESSION['log']){
			echo "<form method = 'post'><button name = 'logout'>Logout</button></form>";
			//echo "<style>#container{visibility:hidden;}</style>";
			if(isset($_POST['logout']))
			{
				session_destroy();
				header("location:Home.php");
			}
			die();
	}
?>
<!doctype html>
<html>
	<?php
		if(isset($_POST['login']))
		{
			$nm = $_POST['username'];
			$pw = $_POST['password'];
			$code = "SELECT * FROM user_accounts WHERE username = '$nm' AND password = '$pw'";
			$res = mysqli_query($C,$code);
			$chk = false;
			while($row = mysqli_fetch_assoc($res))
			{
				$chk = true;
				$_SESSION['username'] = $nm;
				$_SESSION['log'] = true;
				if($row['post']=='admin')
					$_SESSION['isAdmin'] = 	true;
			}		
			if($chk){
				header("location: Home.php");	
			}
		}
	?>
    <head>
        <meta charset="utf-8">
        <title>PASAL | LOGIN</title>
        <link rel = "icon" href = "Images/OnTest.png">
		<link rel = 'stylesheet' type = 'text/css' href = 'PasalLogin.css'>
    </head>
    <body>
    	<div id = "TT"></div>
    	<div id = "container">
        	<div id = 'top'>
                <div id = 'tlogo' >
                    <a href = '#'><img src = 'Images/OnTest2.png' height = '40px' width = '75px'></a>
                </div>
                <div id = 't1'>
                    <div id = 'tmenu'>
                        <a href = "Home.php">HOME</a>
                   		<a href = '#' id = "categories">CATEGORIES</a>
                        <a href = '#'>CONTACT US</a>
                        <a id = 'tlogin' href = 'LoginPage.php' style = 'background-color:#000; color: red; font-size:15px;'>LOGIN</a>
                    </div>
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
                        <input type = 'submit' name = 'login' value = 'Login'>
                        <input type = 'submit' name = 'create' value = 'Create your account'>
                    </form>
                </div>
                
                <hr style = "margin:1%;"><a id = "ToTop" href = "#TT">Back to the top</a>
                </center>
             </div>
             <div id = "end">
                    <div><hr noshade><center>&copy; PASAL 2019 PVT. LTD.</center></div>
             </div>
    	</div>
    </body>
</html>