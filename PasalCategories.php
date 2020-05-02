<?php
	session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PASAL | Categories</title>
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
                    <a title = 'To Categoires Page' href = '#' class = 'current'>Categories</a>
                    <?php 
                        if(!isset($_SESSION['loggedIn']))
                            echo "<a title = 'To Login Page' href = 'PasalLogin.php'>Login</a>";	
                    ?>         
                    <form method = 'post' id = 'search' action = 'PasalSearch.php' target = '_blank'>
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
             <div id = 'mid'>
            	<div id = 'mid1'></div>
                <div id = 'cl'>
                	<ol>
                    	<li>
                        	<a href = '#Food&Snacks'>Food & Snacks</a>
                        	<ol>
                            	<li><a href = '#Biscuits&Cookies'>Biscuits & Cookies</a></li>
                                <li><a href = '#Cakes&Icecream'>Cakes & Icecream</a></li>
                                <li><a href = '#Chocolates'>Chocolates</a></li>
                                <li><a href = '#Fruits'>Fruits</a></li>
                            	<li><a href = '#Namkeen'>Namkeen</a></li>
                                <li><a href = '#Noodles,Chips&Pasta'>Noodles, Chips & Pasta</a></li>
                                <li><a href = '#Vegetables'>Vegetables</a></li>
                                <li><a href = '#Others(Food&Snacks)'>Others</a></li>
                            </ol>
                        </li>
                        <li>
                        	<a href = '#Beverages'>Beverages</a>
                        	<ol>
                            	<li><a href = '#EnergyDrinks&SoftDrinks'>Energy Drinks & Soft Drinks</a></li>
                                <li><a href = '#FruitJuice'>Fruit Juice</a></li>
                                <li><a href = '#Tea&Coffee'>Tea & Coffee</a></li>
                                <li><a href = '#Others(Beverages)'>Others</a></li>
                            </ol>
                        </li>
                    	<li>
                        	<a href = '#Frozen,Canned&Preserved'>Frozen, Canned & Preserved</a>
                        	<ol>
                            	<li><a href = '#Egg'>Egg</a></li>
                                <li><a href = '#Fish'>Fish</a></li>
                                <li><a href = '#Meat'>Meat</a></li>
                                <li><a href = '#Others(Frozen,Canned&Preserved)'>Others</a></li>
                            </ol>
                        </li>
                    	<li>
                        	<a href = '#Cleaning&Household'>Cleaning & Household</a>
                        	<ol>
                            	<li><a href = '#Detergent&Dishwash'>Detergent & Dishwash</a></li>
                                <li><a href = '#Mops,Brushes&Scrubs'>Mops, Brushes & Scrubs</a></li>
                                <li><a href = '#Others(Cleaning&Household)'>Others</a></li>
                            </ol>
                        </li>
                    	<li>
                        	<a href = '#Beauty&Hygiene'>Beauty & Hygiene</a>
                        	<ol>
                            	<li><a href = '#Bath&Handwash'>Bath & Handwash</a></li>
                                <li><a href = '#Fragnances&Deos'>Fragnances & Deos</a></li>
                                <li><a href = '#HairProducts'>Hair Products</a></li>
                            	<li><a href = '#Others(Beauty&Hygiene)'>Others</a></li>
                            </ol>
                        </li>
                    	<li><a href = '#Others'>Others</a></li>
                    </ol>
                </div>
                <div id = 'contents'>
					<?php
                        include('display.php');
                        echo "<div><h3 id = 'Food&Snacks'>Food & Snacks</h3>";
                            disall('Biscuits & Cookies');
                            disall('Cakes & Icecream');
                            disall('Chocolates');
                            disall('Fruits');
                            disall('Namkeen');
                            disall('Noodles, Chips & Pasta');
                            disall('Vegetables');
                            disall('Others(Food & Snacks)');
                        echo "</div>";
                        echo "<div><h3 id = 'Beverages'>Beverages</h3>";
                            disall('Energy Drinks & Soft Drinks');
                            disall('Fruit Juice');
                            disall('Tea & Coffee');
                            disall('Others(Beverages)');
                        echo "</div>";
                        echo "<div><h3 id = 'Frozen,Canned&Preserved'>Frozen, Canned & Preserved</h3>";
                            disall('Egg');
                            disall('Fish');
                            disall('Meat');
                            disall('Others(Frozen, Canned & Preserved)');
                        echo "</div>";
                        echo "<div><h3 id = 'Cleaning&Household'>Cleaning & Household</h3>";
                            disall('Detergent & Dishwash');
                            disall('Mops, Brushes & Scrubs');
                            disall('Others(Cleaning & Household)');
                        echo "</div>";
                        echo "<div><h3 id = 'Beauty&Hygiene'>Beauty & Hygiene</h3>";
                            disall('Bath & Handwash');
                            disall('Fragnances & Deos');
                            disall('Hair Products');
                            disall('Others(Beauty & Hygiene)');
                        echo "</div>";
                        echo "<div><h3 id = 'Others'>Others</h3>";
                            disall('Others');
                        echo "</div>";
						echo "<div><h3 id = 'OnDiscount'>On Discount</h3>";
                            displaysearch('On discount',"SELECT * FROM item WHERE old_price > item_price");
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