<?php
	session_start();
	if(isset($_POST['ssearch']))
		$val = $_POST['searchb'];
	else 
		die("Nothing to do here");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PASAL | Search </title>
    <link rel = 'stylesheet' href = 'PasalCategories.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>
    <script src="PasalHome.js"></script>
</head>
<body>
	<div id = 'container'>
            <div id = 'top'></div>
            <div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='#',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = 'PasalHome.php'>Home</a>
                    <a title = 'To Categoires Page' href = 'PasalCategoires.php' class = 'current'>Categories</a>
                    <?php 
                        if(!isset($_SESSION['loggedIn']))
                            echo "<a title = 'To Login Page' href = 'PasalLogin.php'>Login</a>";	
                    ?>         
                    <form method = 'post' id = 'search' action = 'PasalSearch.php'>
                        <input type = 'search' name = 'searchb' id = 'searchb' >
                        <input type = 'submit' name = 'ssearch' id = 'ssearch' value =''>
                        <!button title = 'Search' name = 'ssearch' id = 'ssearch'><!/button>
                    </form>
                </div>
                <div id = 'user'>
					<?php
                        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==true)
                            echo "<button title = 'To Settings' onclick = "."location.href='PasalSettings.php'"." id = 'settings'><span></span></button>";
                        else
                            echo "<button title = 'To Cart' onclick = "."location.href='PasalCart.php'"." id = 'cart'><span id = 'cdot'></span></button>";
                    ?>
                    <form id = 'fm' method = 'post' action = '#'>
                    	<input type = 'text' value = '' name = 'cid' id = 'cid'>
                        <input type = 'text' value = '' name = 'cq' id = 'cq'>
                    	<input type = 'submit' name = 'csub' id = 'csub' value = 'Cart'>
                    </form>
                    <?php
                    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==true)
                        echo "<button title = 'To Notifications' id = 'noti' onclick = 'setTimeout(location.href='PasalNoti.php',5000);'><span id = 'ndot'></span></button>";
                    ?>
                    <button title = 'To Account' id = 'account' onclick = "setTimeout(location.href='PasalProfile.php',5000);"><span id = 'adot'></span></button>
                    <?php
						if(isset($_SESSION['loggedIn']))
							echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
					?>
                </div>
            </div>
	</div>
     <div id = 'mid'>
          <div id = 'mid1'></div>
          <div id = 'contents'>
				<?php
					 echo "<script>document.title = 'PASAL | Search | $val'</script>";
					 include('display.php');
					 echo "<div><h3>Available results for '$val':</h3>";
					 $code = (strlen($val)<3)?"SELECT * FROM item WHERE item_name LIKE '$val%'":"SELECT * FROM item WHERE item_name LIKE '%$val%'";
					 displaysearch('<u>'.$val.'</u> in item&apos;s name',$code);
					 $code = (strlen($val)<3)?"SELECT * FROM item WHERE item_category LIKE '$val%'":"SELECT * FROM item WHERE item_category LIKE '%$val%'";
					 displaysearch('<u>'.$val.'</u> in item&apos;s category',$code);
					 $code = (strlen($val)<3)?"SELECT * FROM item WHERE item_sub_category LIKE '$val%'":"SELECT * FROM item WHERE item_sub_category LIKE '%$val%'";
					 displaysearch('<u>'.$val.'</u> in item&apos;s sub category',$code);
  					echo "</div>";
				?>
           	</div>
           	<div id = 'mid1'></div>
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
</body>
</html>