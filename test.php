<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$m = $_POST['email'];
echo $m;
$link="<a href='localhost/CedHosting/mailverify.php?email=".$m."'>click here</a>";
require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "hhaider740@gmail.com";                 
$mail->Password = "allahtala1";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "hhaider740@gmail.com";
$mail->FromName = "Hasan Haider";

$mail->addAddress($m, "Harshit Singh");

$mail->isHTML(true);

$mail->Subject = "CedHosting verification link";
$mail->Body = $link;
$mail->AltBody = "click here to get verified";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}