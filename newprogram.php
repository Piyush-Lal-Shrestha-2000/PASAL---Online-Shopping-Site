<fieldset>
    <legend>Create your account</legend>
    <form method = 'post'>
        Username: <input type = 'text' name = 'un'><br>
        Password: <input type = 'password' name = 'pw'><br>
        <input type = 'submit' name = 'register' value = 'Create'> 
    </form>
</fieldset>
<fieldset>
    <legend>Login</legend>
    <form method = 'post'>
        Username: <input type = 'text' name = 'un'><br>
        Password: <input type = 'password' name = 'pw'><br>
        <input type = 'submit' name = 'login' value = 'Login'> 
    </form>
</fieldset>
<?php
	$C = mysqli_connect("localhost","root","","test") or die("Error connecting to the database");
	function alertmsg($msg)
	{
		echo "<script language = 'javascript'>alert('$msg');</script>";	
	}
	if(isset($_POST['register']))
	{
		$un = $_POST['un'];
		$pw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
		$code = "INSERT INTO account VALUES('$un','$pw')";
		if(mysqli_query($C,$code))
			alertmsg("Your account is successfully created!");
		else
			echo mysqli_error($C);
	}
	if(isset($_POST['login']))
	{
		$un = $_POST['un'];
		$pw = $_POST['pw'];
		$code = "SELECT password FROM account WHERE username = '$un'"; 
		$R = mysqli_query($C,$code); 
		$chk = false;
		while($res = mysqli_fetch_array($R))
		{
			if(password_verify($pw,$res[0]))
			{	
				$chk = true;
				break;	
			}
		}
		if($chk)
			alertmsg("Welcome!");
		else
			alertmsg("Unknown!");
	}
?>	