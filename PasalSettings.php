<?php
	session_start();
	if(!isset($_SESSION['isAdmin']))
		die("Nothing to do here");
?>
<!doctype html>
<html>
<head>
<link rel = 'stylesheet' href = 'PasalProfile.css'>
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
<meta charset="utf-8">
<title>PASAL | Settings</title>
<?php echo "<link rel ='icon' href = 'https://img.icons8.com/color/48/000000/shopping-cart.png'>";?>
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
	<?php
		$C = mysqli_connect("localhost","root",'','pasal') or die("Error");
		$output = '';
		if(isset($_POST['add'])){
			$fn = $_FILES['image']['name'];
			$ext = explode('.',$fn);
			//$target = "SavedImages/".basename($_FILES['image']['name']);
			$target = md5(rand()).".".$ext[1];//
			$nm=$_POST['name'];$pri=$_POST['price'];$qty=$_POST['quantity'];
			$cat=explode(';',$_POST['category']);
			$img=$_FILES['image']['name']; 
			$code = "INSERT INTO item(item_name,item_category,item_sub_category,item_price, item_quantity, item_image) VALUES('$nm','$cat[0]','$cat[1]','$pri','$qty','$target')";
			$target = 'SavedImages/'.$target;
			if(!mysqli_query($C,$code))
				die("Error");
			if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
				echo "<script>alert('Successfully added item into the database.');</script>";
			else
				echo "<script>alert('Error while adding item into the database.');</script>";	
		}
		function dis($code)
		{
			$output = '';
			$C = mysqli_connect("localhost","root",'','pasal') or die("Error while connecting to the database");
			$R = mysqli_query($C,$code);
			$i = 0;
			$output.= "<br><center><table border = '1' cellspacing = '5' cellpadding = '5px'><tr><th colspan = '5'>Contents:</th><tr>";
			while($row = mysqli_fetch_array($R))
			{
				if($i%5==0)
					$output.="</tr><tr>";		
				$i++;
				$output.= "<td>";
				$output.= "<b>ID:</b> ".$row[0]."<br><b>Name:</b> ".$row[1]."<br><b>Category:</b> ".$row[2]."<br><b>Sub-category:</b> ".$row[3]."<br><b>Price:</b> ".$row[4]."<br><b>Quantity:</b> ".$row[5];
				$output.= "<br><b>Image:</b> <br><img style = 'border: solid thin black;'src='SavedImages/".$row[6]."' height = '200px' width = '200px' >";	
				$output.= "</td>";
			}	
			$output.="</tr></table></center>";			
			return $output;
		}
		function disuser($code)
		{
			
		}
	?>
    <script>
    	function change(i)
		{
			//alert("HERE"+i);	
			if( i == 4 || i == 5 ){
				document.getElementById('search').innerHTML = 'Between';	
				document.getElementById('searchbox').innerHTML = " To/From <input type = 'number' name = 'nm1' value = '1' size = '10' required> From/To <input type = 'number' name = 'nm2' value = '5' size = '10' required>";	
			}
			else{
				document.getElementById('search').innerHTML = 'Search';	
				document.getElementById('searchbox').innerHTML = "<input type = 'text' name = 'inp' required size = '35'>";	
			}
		}
    </script>
    <details>
    <summary id = 'red'>Items' settings</summary>
    <fieldset>
    <legend>Insert item</legend>
    <form method = "post" enctype = "multipart/form-data">
    	<table border = "1" cellpadding="1" cellspacing="1" >
    		<tr><th colspan="2">Item details</th></tr>
            <tr><td>Name: </td> <td><input type = "text" name = "name" placeholder = "Enter item name" required></td></tr>
            <tr><td>Category: </td><td><select name = "category" required>
            <option></option>
            <optgroup label = "Food & Snacks">
            	<option name = "Biscuits&Cookies" value = "Food & Snacks;Biscuits & Cookies" >Biscuits & Cookies</option>
                <option name = "Cakes&Icecream" value = "Food & Snacks;Cakes & Icecream">Cakes & Icecream</option>
                <option name = "Chocolates" value = "Food & Snacks;Chocholates">Chocolates</option>
                <option name = "Fruits" value = "Food & Snacks;Fruits">Fruits</option>
                <option name = "Namkeen" value = "Food & Snacks;Namkeen">Namkeen</option>
            	<option name = "NoodlesChips&Pasta" value = "Food & Snacks;Noodles, Chips & Pasta">Noodles, Chips & Pasta</option>
                <option name = "Vegetables" value = "Food & Snacks;Vegetables">Vegetables</option>
                <option name = "SOthers" value = "Food & Snacks;Others(Food & Snacks)">Others</option>
            </optgroup>
            <optgroup label = "Beverages">
            	<option name = "EnergyDrinks&SoftDrinks" value = "Beverages;Energy Drinks & Soft Drinks">Energy Drinks & Soft Drinks</option>
                <option name = "FruitJuice" value = "Beverages;Fruit Juice">Fruit Juice</option>
                <option name = "Tea&Coffee" value = "Beverages;Tea & Coffee">Tea & Coffee</option>
                <option name = "BOthers" value="Beverages;Others(Beverages)">Others</option>
            </optgroup>
            <optgroup label = "Frozen, Canned & Preserved">
            	<option name = "Eggs" value = "Frozen, Canned & Preserved;Eggs">Eggs</option>
                <option name = "Fish" value = "Frozen, Canned & Preserved;Fish">Fish</option>
                <option name = "Meat" value = "Frozen, Canned & Preserved;Meat">Meat</option>
            	<option name = "FOthers" value = "Frozen, Canned & Preserved;Others(Frozen, Canned & Preserved)">Others</option>
            </optgroup>
            <optgroup label = "Cleaning & Household">
            	<option name = "Detergent&Dishwash" value = "Cleaning & Household;Detergent & Dishwash">Detergent & Dishwash</option>
                <option name = "MopsBrushes&Scrubs" value = "Cleaning & Household;Mops, Brushes & Scrubs">Mops, Brushes & Scrubs</option>
            	<option name = "BOthers" value="Cleaning & Household;Others(Cleaning & Household)">Others</option>
            </optgroup>
            <optgroup label = "Beauty & Hygiene">
            	<option name = "Bath & Handwash" value = "Beauty & Hygiene;Bath & Handwash">Bath & Handwash</option>
                <option name = "BodySoap" value = "Beauty & Hygiene;Fragnances & Deos">Fragnances & Deos</option>
                <option name = "HairProducts" value = "Beauty & Hygiene;Hair Products">Hair Products</option>
                <option name = "HOthers" value = "Beauty & Hygiene;Others(Beauty & Hygiene)" >Others</option>
            </optgroup>
            <option name = "Others" value = "Others;Others" >Others</option>
            </select></td></tr>
            <tr><td>Price: </td> <td><input type = "number" name = "price" placeholder = "Enter item price"  required></td></tr>
            <tr><td>Quantity: </td> <td><input type = "number" name = "quantity" placeholder = "Enter item quantity" required></td></tr>
    		<tr><td>Image: </td> <td><input type = "file" name = "image" placeholder = "Enter item image" required></td></tr>
            <tr><td><input type = "submit" name = "add" value = "Add item"></td> <td><input type = "reset" name = "reset" value = "Reset values"></td></tr>
        </table>
    	</form>
    </fieldset>
    <fieldset>
    	<legend>Delete item</legend>
    	<form method = 'post'>
        	<table border = "1" cellpadding="1" cellspacing="1" >
				<tr>
                	<th colspan = '2' >Remove item by Item ID/Name</th>
                </tr>
                <tr>
                	<td>Item ID/name: </td>
                    <td><input type = 'text' name = 'inp' required></td>
                </tr>
                <tr>
                	<td>Given data is: </td>
                    <td> ID <input type = 'radio' name = 'typeofinp' value = 'item_id' checked> Name <input type = 'radio' name = 'typeofinp' value = 'item_name'></td>
                </tr>
                <tr>
                	<td><input type = 'submit' name = 'deleteitem' value = 'Remove item'></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <fieldset>
    	<legend>View item</legend>
    	<form method = 'post'>
        	<table border = "1" cellpadding="1" cellspacing="1" >
				<tr>
                	<th colspan = '2' >Search item</th>
                </tr>
                <tr>
                	<td id = 'search'>Search: </td>
                    <td id = 'searchbox' colspan = '2'><input type = 'text' name = 'inp' required size = '35'></td>
                </tr>
                <tr>
                	<td>Search by: </td>
                    <td> ID <input type = 'radio' name = 'typeofinp' value = 'item_id' oninput = 'change(0)' checked> Name <input type = 'radio' name = 'typeofinp' value = 'item_name' oninput = 'change(1)'> Category <input type = 'radio' name = 'typeofinp' value = 'item_category' oninput = 'change(2)'> Sub-Category <input type = 'radio' name = 'typeofinp' value = 'item_sub_category' oninput = 'change(3)'> Price <input type = 'radio' name = 'typeofinp' value = 'item_price' oninput = 'change(4)'> Quantity <input type = 'radio' name = 'typeofinp' value = 'item_quantity' oninput = 'change(5)'></td>
                </tr>
                <tr>
                	<td><input type = 'submit' name = 'searchitem' value = 'Search item'></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <fieldset>
    	<legend>Update item</legend>
    	<form method = 'post'>
        	<table border = "1" cellpadding="1" cellspacing="1" >
            	<tr>
                	<th colspan = '4'>Update item</th>
                </tr>
				<tr>
                	<td>Set:</td>
                    <td>
                    	<select name = 'column'>
                        	<option value = 'item_id'>ID</option>
                            <option value = 'item_name'>Name</option>
                            <option value = 'item_price'>Price</option>
                            <option value = 'item_quantity'>Quantity</option>
                        </select>
                    </td>
                	<td>As:</td>
                    <td>
                    	<input type = 'text' name = 'set'>
                    </td>
                </tr>
                <tr>
                	<td>Where:</td>
                    <td>
                    	<select name = 'where'>
                        	<option value = 'item_id'>ID</option>
                            <option value = 'item_name'>Name</option>
                            <option value = 'item_price'>Price</option>
                            <option value = 'item_quantity'>Quantity</option>
                        </select>
                	</td>
                    <td>Is:</td>
                    <td>
                    	<input type = 'text' name = 'is'>
                    </td>
                </tr>
            </table>
            <label><mark>It is recommended to update items through the database.</mark></label>
        </form>
    </fieldset>
    <fieldset>
    	<form method = 'post'>
        	<button name = "view">View recently added item</button>
        	<button name = "viewall">View all</button>
            <button name = 'hideall'>Hide all</button>
        </form>
    </fieldset>
    </details><br>
    <details>
    	<summary id = 'red'>User's settings</summary>
        <fieldset>
        	<legend >Search user</legend>
            <table>
            	<form method = 'post'>
        	<table border = "1" cellpadding = "1" cellspacing = "1" >
				<tr>
                	<th colspan = '2' >Search user</th>
                </tr>
                <tr>
                	<td id = 'search'>Search: </td>
                    <td id = 'searchbox' colspan = '2'><input type = 'text' name = 'inp' required size = '35'></td>
                </tr>
                <tr>
                	<td>Search by: </td>
                	<td>
                    	ID <input type = 'radio' name = 'suser' value = 'user_id'>
                        Firstname <input type = 'radio' name = 'suser' value = 'firstname'>
                        Lastname <input type = 'radio' name = 'suser' value = 'lastname'>
                    </td>
                </tr>
                <tr>
                	<td><input type = 'submit' name = 'searchuser' value = 'Search user'></td>
                </tr>
            </table>
        </form>
            </table>
        </fieldset>
        <fieldset>
        	<legend>Update user</legend>
            
        </fieldset>
        <fieldset>
        	<legend>Remove user</legend>
        	
        </fieldset>
        <fieldset>
            <form method = 'post'>
                <button name = 'viewalluser'>View all users</button>
                <button name = 'hideall'>Hide all users</button>
            </form>
		</fieldset>
    </details>
	<?php
    	if(isset($_POST['view'])){
			$code = "SELECT * FROM item ORDER BY item_id DESC LIMIT 1";
			$output = dis($code);
		}
		if(isset($_POST['viewall'])){
			$code = "SELECT * FROM item order by item_id";
			$output = dis($code);	
		}
		if(isset($_POST['hideall']))
		{
			$output = '';	
		}
		if(isset($_POST['deleteitem'])){
			$type = $_POST['typeofinp'];	
			$inp = $_POST['inp'];
			$code = "DELETE FROM item WHERE $type = '$inp'";
			if(mysqli_query($C,$code))
				echo "<script>alert('Removed item with the item id/name $inp.');</script>";
			else
				echo "<script>alert('Error removing item with the item id/name $inp, the item may not exist.');</script>";
		}
		if(isset($_POST['searchitem'])){
			$type = $_POST['typeofinp'];	
			if( $type == 'item_price' || $type == 'item_quantity')
			{
				$val1 = $_POST['nm1'];
				$val2 = $_POST['nm2'];	
				$code = "SELECT * FROM item WHERE $type BETWEEN $val1 AND $val2";
			}
			else{
				$inp = $_POST['inp'];
				$code = '';
				if(strlen($inp)<3)
					$code = "SELECT * FROM item WHERE $type LIKE '$inp%'";		
				else
					$code = "SELECT * FROM item WHERE $type LIKE '%$inp%'";
			}
			$output = dis($code);
		}
		echo $output;
		$output= '';
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
