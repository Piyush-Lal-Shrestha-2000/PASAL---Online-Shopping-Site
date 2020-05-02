<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once __DIR__ . '../vendor/autoload.php';
	$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                             // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'fortest2076@gmail.com';                     // SMTP username
    $mail->Password   = 'altacc2019';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    $mail->setFrom('fortest2076@gmail.com', 'Test');
    $mail->addAddress('thepasalofficial2019@gmail.com','PASAL');     // Add a recipient
    
	$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Testing mailing in PHP';
    $mail->Body    = 'This is a test';
    
    if($mail->send())
    	echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>