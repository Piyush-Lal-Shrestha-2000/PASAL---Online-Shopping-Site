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
		<link rel = "stylesheet" href = "HomePage.css">
        <style>
        </style>
        <script>
		</script>
    </head>
    <body>
        <div id = 'container'>
        	<div id = 'top'>
            	<div id = 'tlogo' >
                    <a href = '#'><img src = 'Images/OnTest.png' height = '70px' width = '100px'></a>
                </div>
            </div>
            <div id = 'contents'>
            	<slider>
                	<slide></slide>
                    <slide></slide>
                    <slide></slide>
                    <slide></slide>
                </slider>
            </div>
            <div id = 'end'>
            	<div><hr noshade><center>&copy; PASAL 2019 PVT. LTD.</center></div>
                <hr><p style = 'margin:0;padding:0;font-size: 12px;'>Connect with us in:</p><br>&nbsp;
                <abbr title = 'To our Facebook Page'><button style = 'background-image:url(Images/fb.png)' ></button></abbr>&nbsp;
                <abbr title = 'Connect with us in Gmail'><button style = 'background-image:url(Images/gmail.jpg)' ></button></abbr>
            </div>
        </div> 
	</body>
</html>