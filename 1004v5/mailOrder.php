<?php
session_start();
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

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
$mail->SMTPDebug = 0;

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

//Connect to DB to get email
require_once('../../../protected/team11/config_grp.php');
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$error = mysqli_connect_error();
if ($error != null) {
$output = "<p>Unable to connect to database<p>" . $error;
exit($output);
}

//Username from session
$myusername = $_SESSION['username'];

$sql = "SELECT * FROM `user` WHERE mID='".$myusername."'";

if($result = mysqli_query($connection, $sql)){
while($row = mysqli_fetch_assoc($result)){
    $email = $row['email'];
    break;
}
}

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'Order Confirmation';

//SQL statement to get total cost and time
$sql = "SELECT totalCost, time FROM `order` WHERE `MatrixNo` = '".$myusername."' AND orderStatus = 'In Process'";

if($result = mysqli_query($connection, $sql)){
while($row = mysqli_fetch_assoc($result)){
    $totalCost = $row['totalCost'];
    $time = $row['time'];
}
}

$_SESSION['totalCost'] = $totalCost;
$_SESSION['time'] = $time;


//Format mail according to HTML
$mail->isHTML(true); 

$mail->msgHTML(file_get_contents('./contents.html'), dirname(__FILE__));
$mail->Body .='<div align="center" style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
    
    <div align="center">
     
    </div>
      <p>You have made $';
        
$mail->Body .=$totalCost;
$mail->Body .=' worth of order at ';
$mail->Body .=$time;
$mail->Body .='. </p>
    
    <p>Thank you for shopping with <strong>Makan Express</strong>!</p>
  </div>';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    header("location:index.php");
}