<?php 
	session_start();
	$C = mysqli_connect("localhost","root","","pasal");
?>
<!doctype html>
<html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>PASAL | HOME</title>
        <link rel = "icon" href = "Images/OnTest.png">
		<link rel = "stylesheet" href = "Home.css">
        <style>
        </style>
        <script>
			var id='',qty='';
			var a = "<div id = 'top'><div id = 'tlogo' ><a href = '#'><img src = 'Images/OnTest.png' height = '75px' width = '100px'></a></div><div id = 't1'><div id = 'tmenu'><a href = '#' style = 'background-color:#000; color: red; font-size:15px;'>HOME</a><a href = '#' id = 'categories'>CATEGORIES</a><a href = '#'>CONTACT US</a><a id = 'tlogin' href = 'LoginPage.php'>LOGIN</a> </div> <div id = 'tsearch'><form method = 'post' name = 'f1' id = 'f1'><input type = 'search' name= 'searchbox' placeholder = 'Type an item name or category you wish to search' size = '50px' id= 'searchbox'><input type = 'submit' name = 'search' value = 'Search' id = 'search'> </form></div></div> <div id = 'Cart' ><button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:1;background-image:url(Images/cartt.jpg);background-color:#EB8F90; height:55px; background-position:center;background-size:cover;width: 60px;'></button><div id = 'cartdot' style = 'background:red; height: 10px;width:20px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; margin:10px 80px;z-index:9;'></div></div><div id = 'Notifications'><button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:2;background-image:url(Images/bell.jpg);background-color:#EB8F90; height:55px; background-position:center;background-size:contain;width: 60px;'></button><div style = 'background:red; height: 10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; width: 10px;margin:10px 80px;z-index:2;'></div></div><div id = 'Account'><button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:-1;background-image:url(Images/user.png);background-color:#EB8F90; height:55px; background-size:cover;width: 60px;'></button><div style = 'background:red; height: 10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; width: 10px;margin:10px 80px;z-index:2;'></div></div></div>";
			var b = "<style> #top{z-index:2;padding: 0px 5px 0px 3px;display: flex;position: sticky;top: 0px;height:15%;width:100%;background-color:#EB8F90;border: solid thin #EB8F90;border-bottom-left-radius: 20px;box-shadow: 5px 5px 5px 1px #000000;}  #tlogo{width: 7%;}  #tlogo a img{border: solid thin black;border-bottom-left-radius: 20px;box-shadow: 1px 1px 1px 1px #000000;margin: 1px 10px 0 0;}  #tlogo a img:hover{box-shadow: 2px 2px 2px 2px #000000;}#t1{height: 100%;margin: 10px 7px 7px 7px;width: 63%;}#tsearch{margin: 2px 15px 0 15px;}#search{box-shadow: 1px 1px 1px 1px black;border-radius: 7px;cursor: pointer;}#search:hover{font-weight: 700;font-size:12.5px;}#searchbox{}#tmenu a{text-decoration: none;padding: 3px 10px;font-size: 13px;margin: 4px 5px;border-radius: 20px;box-shadow: 2px 2px 2px 2px #000000;}#tmenu a:hover{text-decoration: none;color: red;background-color:black;font-size: 15px;transition: .8s;}#Cart{width: 10%;border: solid thin black;}#Notifications{width: 10%;border: solid thin black;}#Account{width: 10%;border: solid thin black;}</style>     			<div id = 'top'><div id = 'tlogo' ><a href = '#'><img src = 'Images/OnTest2.png' height = '40px' width = '75px'></a></div><div id = 't1' style = 'display:flex;'><div id = 'tmenu'><a href = '#' style = 'background-color:#000; color: red; font-size:15px;'>HOME</a> <a href = '#'>CATEGORIES</a><a href = '#'>CONTACT US</a><a id = 'tlogin' href = 'LoginPage.php'>LOGIN</a></div><div id = 'tsearch'><form method = 'post' name = 'f1' id = 'f1'><input type = 'search' name= 'searchbox' placeholder = 'Type an item name or category you wish to search' size = '50px' id= 'searchbox'>&nbsp;&nbsp;<input type = 'submit' name = 'search' value = 'Search' id = 'search'></form></div></div><div id = 'Cart'><button style = 'background-color:white;'><img src = 'Images/cart.png' height = '30px'></button><button>CART</button><br></div><div id = 'Notifications'><button>NOTIFICATIONS: 0</button></div><div id = 'Account'><button>ACCOUNT: not logged in</button></div></div>";
			// When the user scrolls down 50px from the top of the document, resize the header's font size
			window.onscroll = function() {scrollFunction()};
			function scrollFunction() {
				var user = <?php echo isset($_SESSION['log'])?true:false; ?>;
				if(user==true)
				{
					document.getElementById('tlogin').style.visibility = 'hidden';
				}	
			  if(document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
				document.getElementById("top").innerHTML= b;
			  } else {
				document.getElementById("top").innerHTML = a;
			  }
			}
			function cart(a){
				//alert(a);
				var e = 'Q'+a;
				var f = 'B'+a;
				//alert('ID: '+document.getElementById('iid').value);
				//alert('Quantity: '+document.getElementById('iqty').value);
				document.getElementById('iid').value+=';';
				document.getElementById('iqty').value+=';';
				alert('ID: '+document.getElementById('iid').value);
				alert('Quantity: '+document.getElementById('iqty').value);
				//alert(f);
				document.getElementById('hello').disabled = true;
			}
			function order()
			{
				document.getElementById("ord").title = "Item(s): 1, Price: Rs. 100";	
			}
		</script>
        <?php
			if(isset($_POST['QntFM']))
			{
				$Q = $_POST['qnt'];	
				echo "<h1 style = 'color:red'>Quantity : ".$Q."</h1>";
			}
		?>
    </head>
    <body>
        <div id = "container">
        	<div id = "TT"></div>
            <div id = 'top'>
                <div id = 'tlogo' >
                    <a href = '#'><img src = 'Images/OnTest.png' height = '75px' width = '100px'></a>
                </div>
                <div id = 't1'>
                    <div id = 'tmenu'>
                        <a href = '#' style = 'background-color:#000; color: red; font-size:15px;'>HOME</a>
                        <a href = '#' id = "categories">CATEGORIES</a>		
                        <a href = '#'>CONTACT US</a>
                        <a id = 'tlogin' href = 'LoginPage.php' >LOGIN</a>
                    </div>
                    <div id = 'tsearch'>
                        <form method = 'post' name = 'f1' id = 'f1'>
                        	&nbsp;&nbsp;<input  type = 'search' name= 'searchbox' placeholder = 'Type an item name or category you wish to search' size = '50px' id= 'searchbox'required>
                        	<input type = 'submit' name = 'search' value = 'Search' id = 'search'>
                        </form>
                    </div>
                </div>
                <div id = 'Cart' >
                	<button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:-1;background-image:url(Images/cartt.jpg);background-color:#EB8F90; height:55px; background-position:center;background-size:cover;width: 60px;'></button>
                	<div id = 'cartdot' style = 'background:red; height: 10px;width:10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; margin:10px 80px;z-index:2;'></div>
                    <form name = 'cartcarry'>
                    	<?php $iid='';$iqty='';?>
                    	<input type = 'text' value = '<?php echo $iid;?>' id = 'iid' name = 'iid' value = '' disabled style = 'visibility:hidden;'>
                    	<input value = '<?php echo $iqty;?>'type = 'text' name = 'iqty' id = 'iqty' disabled style = 'visibility:hidden;'>
                        <acronym id = 'ord' onMouseOver="order()" style = 'margin:10% 0 0 15%;'><input type = 'submit' value = 'Display Order' name = 'dis'></acronym>
                    </form>
                </div>
                <div id = 'Notifications'>
                    <button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:-1;background-image:url(Images/bell.jpg);background-color:#EB8F90; height:55px; background-position:center;background-size:contain;width: 60px;'></button>
                	<div style = 'background:red; height: 10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; width: 10px;margin:10px 80px;z-index:2;'></div>
                </div>
                <div id = 'Account'><button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:-1;background-image:url(Images/user.png);background-color:#EB8F90; height:55px; background-size:cover;width: 60px;'></button>
                	<div style = 'background:red; height: 10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; width: 10px;margin:10px 80px;z-index:2;'></div></div>
            </div>
        	<div id = "contents">
            	<slider>
                	<slide></slide>
                    <slide></slide>
                    <slide></slide>
                    <slide></slide>
                	<!hr>
                </slider>
                <div id = "items">
                	<hr>
                    <div id = "IT">
                    	<span>New</span>
                    	<?php
							$code = "SELECT * FROM item ORDER BY item_id desc LIMIT 5";
							$chk = false;
							$res = mysqli_query($C,$code);
							echo "<div id = 'box'>";
								echo "<span>Recent additions</span><br>";
								echo "<center>";
								while($R = mysqli_fetch_array($res))
								{
									$chk = true;
										echo "<div >";
											echo "<img src = 'SavedImages/".$R[6]."'><hr>";
											echo "<br><b>".$R[1]."</b>";
											echo "<p>Rs. ".$R[4]."</p>";
											echo "<form id = 'F".$R[0]."' method = 'post'>Quantity:<input id = 'Q".$R[0]."' value = '1' type = 'number'  min = '0' max = '".$R[5]."' name = 'qnt' required>&nbsp;<button id = 'hello' /*onClick='cart(".$R[0].")'*/ name = 'QntFM'><abbr title='Add item to the cart'><img src = 'Images/cart.png' height = '4px'></abbr></button></form>";
										echo "</div>";
								}
								echo "</center>";	
								if($chk==true)
									echo "<br><a href = '#'>See all</a>";
								else
									echo "<br><a style = 'width: 100%;'>Empty</a><br>";
							echo '</div>';
						?><br>
                   </div>
                        <br>
                        <div id = "IT">
                        <span>Food & Snacks<a href = "#">See all</a></span>
                    	<?php
							$code = "SELECT * FROM item WHERE item_sub_category='Biscuits & Cookies' ORDER BY item_id desc LIMIT 5";
							$chk = false;
							$res = mysqli_query($C,$code);
							echo "<div id = 'box'>";
								echo "<span>Biscuits & Cookies</span><br>";
								echo "<center>";
								while($R = mysqli_fetch_array($res))
								{
									$chk = true;
									echo "<div >";
										echo "<img src = 'SavedImages/".$R[6]."'><hr>";
										echo "<br><b>".$R[1]."</b>";
										echo "<p>Rs. ".$R[4]."</p>";
									 echo "<form id = 'F".$R[0]."' >Quantity:<input id = 'Q".$R[0]."' type = 'number' value = '1' min = '0' max = '".$R[5]."' required>&nbsp;<button id = 'B".$R[0]."' onClick='cart(".$R[0].")'><abbr title='Add item to the cart'><img src = 'Images/cart.png' height = '4px'></abbr></button></form>";
									echo "</div>";		
								}
								echo "</center>";
								if($chk==true)
									echo "<br><a href = '#'>See all</a>";
								else
									echo "<br><a style = 'width: 100%;'>Empty</a><br>";
							echo '</div>';
							//if($chk==true)
								//	echo "<br><span><a href = '#'>See all</a></span>";
						?><br>
                    </div>
                    <div id = "IT">
                    	<span>New</span>
                    	<?php
							$code = "SELECT * FROM item WHERE item_sub_category='Noodles, Chips & Pasta' ORDER BY item_id desc LIMIT 5";
							$chk = false;
							$res = mysqli_query($C,$code);
							echo "<div id = 'box'>";
								echo "<span>Noodles, Chips & Pasta</span><br>";
								echo "<center>";
								while($R = mysqli_fetch_array($res))
								{
									$chk = true;
										echo "<div >";
											echo "<img src = 'SavedImages/".$R[6]."'><hr>";
											echo "<br><b>".$R[1]."</b>";
											echo "<p>Rs. ".$R[4]."</p>";
											echo "<form id = 'F".$R[0]."' >Quantity:<input id = 'Q".$R[0]."' value = '1' type = 'number'  min = '0' max = '".$R[5]."' required>&nbsp;<button id = 'hello' onClick='cart(".$R[0].")'><abbr title='Add item to the cart'><img src = 'Images/cart.png' height = '4px'></abbr></button></form>";
										echo "</div>";
								}
								echo "</center>";	
								if($chk==true)
									echo "<br><a href = '#'>See all</a>";
								else
									echo "<br><a style = 'width: 100%;'>Empty</a><br>";
							echo '</div>';
						?><br>
                   </div>
                <hr><center><a id = "ToTop" href = "#TT">Back to the top</a></center>
            </div>
            <div id = "end">
            	<div><hr noshade><center>&copy; PASAL 2019 PVT. LTD.</center></div>
            </div>
        </div>
        </div>
    </body>
    <?php
		if(isset($_POST['search']))
		{
			$a = $_POST['searchbox'];
			$code = "SELECT * FROM item WHERE item_name = '$a'";
			$res = mysqli_query($C,$code);
			while($R = mysqli_fetch_array($res))
			{
					$chk = true;
					echo "<div >";
						echo "<img src = 'SavedImages/".$R[6]."'><hr>";
						echo "<br><b>".$R[1]."</b>";
						echo "<p>Rs. ".$R[4]."</p>";
						echo "<form id = 'F".$R[0]."' >Quantity:<input id = 'Q".$R[0]."' value = '1' type = 'number'  min = '0' max = '".$R[5]."' required>&nbsp;<button id = 'hello' onClick='cart(".$R[0].")'><abbr title='Add item to the cart'><img src = 'Images/cart.png' height = '4px'></abbr></button></form>";
					echo "</div>";
			}	
		}		
		/*if(@$_SESSION['log']){
		echo "<script type='text/javascript'>
				document.getElementById('tlogin').style.visibility = 'hidden';	
            </script>";
		}*/
	?>
    <script>
		var user = <?php echo isset($_SESSION['log'])?true:false; ?>;
			if(user==true)
			{
				document.getElementById('tlogin').style.visibility = 'hidden';
				document.getElementById('contents').style.backgroundImage = "url('Images/back3.jpg')";
			}	
	</script>
</html>