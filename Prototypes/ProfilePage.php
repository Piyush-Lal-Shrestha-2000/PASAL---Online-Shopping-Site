<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile Page</title>
</head>
<body>
	<h1>Profile Page</h1>
	<?php
		if(isset($_POST['register']))
		{
			$a = $_POST;
			echo 'Username: '.$a['username'].'<br>';	
			echo "Profile Picture: <br><img src='53 MINS.png'>";
		}
	?>
</body>
</html>