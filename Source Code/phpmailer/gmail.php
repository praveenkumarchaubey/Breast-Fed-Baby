<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
//$mail->Host     = "smtp.gmail.com"; // SMTP server
//$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
//$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
//$mail->Username   = "vclass@iic.ac.in";  // GMAIL username
//$mail->Password   = "qazwsx123";      //gmailpassword
//$mail->From     = "vclass@iic.ac.in";  //gmail sender email address
//$mail->From     = "anil.singh@gmail.com";
$mail->AddAddress("bafilauk@gmail.com");

$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>