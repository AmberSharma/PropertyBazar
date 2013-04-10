<?php 
require_once "../model/constant.php"; 
require_once SITEPATH.'model/class.phpmailer.php';// path to the PHPMailer class
function sendMail($address,$password,$user)
{
$mail = new PHPMailer();  
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "amberu48@gmail.com"; // SMTP username
$mail->Password = "dl2cac7054"; // SMTP password 
 
$mail->From     = "AmberSharma";
$mail->AddAddress($address);  
 
$mail->Subject  = "Welcome on Property Bazar.";
$mail->Body     = "Hi  " . $user ."  .Thank You for Registering.your password is  ".$password.".";
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}
}
?>




















