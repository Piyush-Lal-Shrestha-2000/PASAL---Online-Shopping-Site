<?php
	require 'class.phpmailer.php';
 $mail = new PHPMailer;
 $mail->IsSMTP();        //Sets Mailer to send message using SMTP
 $mail->Host = 'smtpout.secureserver.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
 $mail->Port = '80';        //Sets the default SMTP server port
 $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
 $mail->Username = 'xxxxxxxxxx';     //Sets SMTP username
 $mail->Password = 'xxxxxxxxxx';     //Sets SMTP password
 $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
 $mail->From = 'info@webslesson.info';   //Sets the From email address for the message
 $mail->FromName = 'Webslesson.info';   //Sets the From name of the message
 $mail->AddAddress('web-tutorial@programmer.net', 'Name');  //Adds a "To" address
 $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
 $mail->IsHTML(true);       //Sets message type to HTML    
 $mail->Subject = 'TEST';   //Sets the Subject of the message
 $mail->Body = 'This is a test.';    //An HTML or plain text message body
 if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  echo "SUCCESS";
 }
?>