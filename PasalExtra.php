<!doctype html>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PASAL | HOME</title>
        <link rel = 'stylesheet' href = 'PasalProfile.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>
        <style>
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
		margin: 20px 0 100px 0;
	}
		</style>
    </head>
    <body onload = 'ld()'>
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
                            echo "<button title = 'To Settings' class = 'current' onclick = "."location.href='PasalSettings.php'"." id = 'settings'><span></span></button>";					echo "&nbsp;<button title = 'To Notifications' onclick = "."location.href='PasalNoti.php'"." id = 'noti'><span id = 'ndot'></span></button>";}
						else
                            echo "<button title = 'To Cart' onclick = "."location.href='PasalCart.php'"." id = 'cart'><span id = 'cdot'></span></button>";				
					?>
                    <button title = '<?php if(isset($_SESSION['loggedIn'])) echo "To ".$_SESSION['username']."&#146;s profile"; else echo 'To Profile Page';?>' id = 'account' onclick = "location.href='PasalProfile.php'"><span id = 'adot'></span></button>
                    <?php
						if(isset($_SESSION['loggedIn']))
							echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
					?>
                </div>
            </div>
            <div id = 'maincontents'>
	
<details>
	<summary id = 'red'>Our story</summary>
    .....<br>
    This is just a project....<br>
    ....<br>
</details><br>	
<details>
	<summary id = 'red'>Help center</summary>
    Please send mail to <a href = 'mailto:thepasalofficial2019@gmail.com'>thepasalofficial2019@gmail.com</a> if you need help or need to report a problem of any sort.<br>
</details>
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