<?php
	session_start();

	// This example shows settings to use when sending via Google's Gmail servers.
	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini, but this is how to do it if you don't have access to that
	date_default_timezone_set('Etc/UTC');
	
	require './PHPMailer-master/PHPMailerAutoload.php';
	
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "noreply.makanexpress@gmail.com";
	
	//Password to use for SMTP authentication
	$mail->Password = "OOOO0000";
	
	//Set who the message is to be sent from
	$mail->setFrom('noreply@makanexpress.com', 'Makan Express');
	
	//Set who the message is to be sent to
	$mail->addAddress($_SESSION['email']);
		
	//Set the subject line
	$mail->Subject = 'Password Recovery';
	
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Ahoy from Makan Express!';
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Body    = 'Your password have been reset to <u><strong>'.$_SESSION['newpw'].'</strong></u>.';
	
	
	//send the message, check for errors
	if (!$mail->send()) 
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else 
	{
		echo "Message sent!";
		unset($_SESSION['newpw']);
		unset($_SESSION['email']);
		
		header("location:index.php");
	}