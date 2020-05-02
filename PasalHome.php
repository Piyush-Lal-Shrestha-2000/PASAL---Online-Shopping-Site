<?php 
	session_start();
	//$_SESSION['loggedIn'] = false;
	//$_SESSION['isAdmin'] = false;
	$_SESSION['hello'] = 'hey';
	if(isset($_POST['ssearch']))
	{
		echo $_POST['searchb'];	
	}
?>
<script>
</script>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PASAL | HOME</title>
        <link rel = 'stylesheet' href = 'PasalHome.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png' type="image/x-icon">
        <script src="PasalHome.js"></script>
    </head>
    <body onload = 'ld()'>
        <div id = 'container'>
            <div id = 'top'></div>
            <div id = 'start'>
                <div title = 'To Home Page' id = 'logo' onclick = "setTimeout(location.href='#',5000);">PASAL<i class="fa fa-shopping-cart"></i></div>
                <div id = 'menu'>
                    <a title = 'To Home Page' href = '#' class = 'current'>Home</a>
                    <a title = 'To Categoires Page' href = 'PasalCategories.php'>Categories</a>
                    <?php 
                        if(!isset($_SESSION['loggedIn']))
                            echo "<a title = 'To Login Page' href = 'PasalLogin.php'>Login</a>";	
                    ?>         
                    <form method = 'post' id = 'search' action = 'PasalSearch.php'  target = '_blank'>
                        <input type = 'search' name = 'searchb' id = 'searchb' >
                        <!input type = 'submit' name = 'ssearch' id = 'ssearch' value = 'Search'>
                        <button title = 'Search' name = 'ssearch' id = 'ssearch'></button>
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
							echo "<button title = 'To Notifications' onclick = "."location.href='PasalNoti.php'"." id = 'noti'><span id = 'ndot'></span></button>";				
					?>
                    <button title = 'To Account' id = 'account' onclick = "setTimeout(location.href='PasalProfile.php',5000);"><span id = 'adot'></span></button>
                    <?php
						if(isset($_SESSION['loggedIn']))
							echo "<script language = 'javascript'>document.getElementById('adot').style.visibility = 'visible';</script>";
					?>
                </div>
            </div>
            <div id = 'mid'>
            	<div id = 'mid1'></div>
                <div id = 'imgsli'>
                	<img src = 'Images/AffordablePrices.jpg' height = '200px' width = '500px'>
                	<img src = 'Images/GreatService.jpg' height = '200px' width = '500px'>
                    <img src = 'Images/Sale.jpg' height = '200px' width = '500px'>
                </div>
                <div id = 'contents'>
                	<?php
						include('display.php');
						echo "<div><h3>New <a href = '#PasalCategories.php' title = 'New'>See all</a></h3>";
							discode('Recent additions',"SELECT * FROM item ORDER BY item_id desc LIMIT 5",5);
							discode('On discount',"SELECT * FROM item WHERE old_price > item_price LIMIT 5",5);
							//dis();
							//dis('');
						echo "</div>";
						echo "<div><h3>Food & Snacks <a href = 'PasalCategories.php#Food&Snacks' title = 'Food & Snacks'>See all</a></h3>";
							dis('Biscuits & Cookies',5);
							dis('Noodles, Chips & Pasta',5);
							dis('Chocolates',5);
							dis('Namkeen',5);
						echo "</div>";
						echo "<div><h3>Beauty & Hygiene <a href = 'PasalCategories.php#Beauty&Hygiene' title = 'Beauty & Hygiene'>See all</a></h3>";
							dis("Bath & Handwash",5);
							dis("Hair Products",5);
							dis("Fragnances & Deos",5);
						echo "</div>";
						echo "<div><h3>Cleaning & Household <a href = 'PasalCategories.php#Cleaning&Household' title = 'Cleaning & Household'>See all</a></h3>";
							dis("Mops, Brushes & Scrubs",5);
							dis('Others(Cleaning & Household)',5);
						echo "</div>";
						echo "<div><h3>Beverages <a href = 'PasalCategories.php#Beverages' title = 'Beverages'>See all</a></h3>";
							dis("Tea & Coffee",5);
							dis('Fruit Juice',5);
							dis("Energy Drinks & Soft Drinks",5);
						echo "</div>";
						echo "<div><h3>Frozen, Canned & Preserved <a href = 'PasalCategories.php#Frozen,Canned&Preserved' title = 'Frozen, Canned & Preserved'>See all</a></h3>";
							dis("Meat",5);
						echo "</div>";
						echo "<div><h3>Others <a href = '#' title = 'PasalCategories.php#Others'>See all</a></h3>";
							dis("Others",5);
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
