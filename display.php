<?php
	function dis($subcat,$lmt)
	{
		$C = mysqli_connect('localhost','root','','pasal') or die('Error connecting with the database');	
		$code = "SELECT * FROM item WHERE item_sub_category='$subcat' ORDER BY item_id desc LIMIT $lmt";
		$res = mysqli_query($C,$code);
		echo "<div id = 'heading'>";	
			echo "<span><h4>$subcat</h4></span>";
			echo "<a href = 'PasalCategories.php#".str_replace(" ","",$subcat)."' title = '$subcat' >See all</a>";
		echo "</div>";	
		echo "<div>";
			while($R = mysqli_fetch_array($res))
			{
				echo "<div>";
					echo "<img src = 'SavedImages/".$R[6]."' height = '220px' width = '220px'><hr>";
					echo "<br><b>".$R[1]."</b>";
					if($R['old_price']>$R[4])
						echo "<p><dash>Rs. ".$R['old_price']."</dash>  Rs.".$R[4]."</p>";
					else
						echo "<p>Rs. ".$R[4]."</p>";
					echo "<div id = 'D".$R[0]."'><form style = 'float:left;' method = 'post' id = 'F".$R[0]."'><input type = 'number' id = 'Q".$R[0]."' min = '0' value = '1' max = '".$R[5]."' required></form>";
					echo "<button id = 'B".$R[0]."' onClick='cart(".$R[0].")'></button>";
					echo "<p>Quantity: $R[5]</p></div>";
				echo "</div>";			
			}
		echo "</div>";
	}
	function discode($subcat,$code,$lmt)
	{
		$C = mysqli_connect('localhost','root','','pasal') or die('Error connecting with the database');	
		$res = mysqli_query($C,$code);
		echo "<div id = 'heading'>";	
			echo "<span><h4>$subcat</h4></span>";
			echo "<a href = 'PasalCategories.php#".str_replace(" ","",$subcat)."' title = '$subcat' >See all</a>";
		echo "</div>";	
		echo "<div>";
		while($R = mysqli_fetch_array($res))
		{
			echo "<div>";
			echo "<img src = 'SavedImages/".$R[6]."' height = '220px' width = '220px'><hr>";
			echo "<br><b>".$R[1]."</b>";
			if($R['old_price']>$R[4])
				echo "<p><dash>Rs. ".$R['old_price']."</dash>  Rs.".$R[4]."</p>";
			else
				echo "<p>Rs. ".$R[4]."</p>";
			echo "<div id = 'D".$R[0]."'><form style = 'float:left;' method = 'post' id = 'F".$R[0]."'><input type = 'number' id = 'Q".$R[0]."' min = '0' value = '1' max = '".$R[5]."' required></form>";
			echo "<button id = 'B".$R[0]."' onClick='cart(".$R[0].")'></button>";
			echo "<p>Quantity: $R[5]</p></div>";
			echo "</div>";			
		}
		echo "</div>";	
	}
	//0>id,1>name,4>price,5>quantity,6>image
	function disall($subcat)
	{
		$C = mysqli_connect('localhost','root','','pasal') or die('Error connecting with the database');	
		$code = "SELECT * FROM item WHERE item_sub_category = '$subcat'";
		$res = mysqli_query($C,$code); 		
		$i = 0;
		while($R = mysqli_fetch_array($res))
		{
			if($i==0){	
				$str = str_replace(" ","",$subcat);
				echo "<table><th colspan = '5' id = '$str'>$subcat</th><tr>";
			}
			if($i++%5==0 && $i!=0)
				echo "</tr><tr>";
			echo "<td>";
			echo "<img src = 'SavedImages/".$R[6]."'><hr>";
			echo "<b id = '".$R[0]."'>".$R[1]."</b>";
			if($R['old_price']>$R[4])
				echo "<p><dash>Rs. ".$R['old_price']."</dash>  Rs.".$R[4]."</p>";
			else
				echo "<p>Rs. ".$R[4]."</p>";
			echo "<br><span id = 'D".$R[0]."'><input type = 'number' id = 'Q".$R[0]."' min = '0' value = '1' max = '".$R[5]."' required>";
			echo "<input type = 'submit' id = 'B".$R[0]."' onClick='cart(".$R[0].")' value = '' >";
			echo "<p>Quantity: $R[5]</p></span>";
			echo "</td>";		
		}
		while($i++%5!=0)
			echo "<td>Empty</td>";
		echo "</tr></table>";
	}
	function displaysearch($head,$code)
	{
		$C = mysqli_connect('localhost','root','','pasal') or die('Error connecting with the database');	
		$res = mysqli_query($C,$code); 		
		$i = 0;
		$chk = false;
		while($R = mysqli_fetch_array($res))
		{
			$chk = true;
			if($i==0){	
				$str = str_replace(" ","",$head);
				echo "<table><th colspan = '5' id = '$str'>$head</th><tr>";
			}
			if($i++%5==0 && $i!=0)
				echo "</tr><tr>";
			echo "<td>";
			echo "<img src = 'SavedImages/".$R[6]."'><hr>";
			echo "<b id = '".$R[0]."'>".$R[1]."</b>";
			if($R['old_price']>$R[4])
				echo "<p><dash>Rs. ".$R['old_price']."</dash>  Rs.".$R[4]."</p>";
			else
				echo "<p>Rs. ".$R[4]."</p>";
			echo "<br><span id = 'D".$R[0]."'><input type = 'number' id = 'Q".$R[0]."' min = '0' value = '1' max = '".$R[5]."' required>";
			echo "<input type = 'submit' id = 'B".$R[0]."' onClick='cart(".$R[0].")' value = '' >";
			echo "<p>Quantity: $R[5]</p></span>";
			echo "</td>";		
		}
		if($chk){
			while($i++%5!=0)
				echo "<td>Empty</td>";
			echo "</tr></table><br>";
			//echo "</div>";
		}
		else{
			echo "<table><tr><th>$head</th></tr><tr><td><br><br><br>Empty<br><br><br></td><td><br><br><br>Empty<br><br><br></td><td><br><br><br>Empty<br><br><br></td><td><br><br><br>Empty<br><br><br></td><td><br><br><br>Empty<br><br><br></td></tr></table><br>";	
		}
	}
	/*
	if(isset($_POST['ssearch']))
	{
		$src = $_POST['searchb'];
		$C = mysqli_connect('localhost','root','','pasal') or die('Error connecting with the database');	
		$code = "SELECT * FROM item WHERE item_name = '".$src."'";
		$R = mysqli_query($C,$code);
		while($res = mysqli_fetch_array($R))
			echo "<script>alert(".$src." found);</script>";
			echo "<script>location.href = 'PasalCategories.php#".$src."'</script>";
		echo "<script>alert(".$src." not found);</script>";
	}*/
?>