<?php
// Create connection
$con=mysqli_connect("localhost","Boffins","Boffins","Boffins");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $sql="INSERT INTO tbl_contact(name, mail, message)
  VALUES('$_REQUEST[name]','$_REQUEST[email]', '$_REQUEST[comments]')";
  
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }



?> 

<?php
$to      = 'praveen.chaubey@iic.ac.in';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: babybrestfed@gmail.com' . "\r\n" .
    'Reply-To: babybrestfed@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

require("phpmailer/class.phpmailer.php");


$mail = new PHPMailer();
$mail->IsSMTP();                               // telling the class to use SMTP
$mail->Host     = "smtp.gmail.com";           // SMTP server
$mail->SMTPAuth   = true;                    // enable SMTP authentication
$mail->SMTPSecure = "tls";                  // sets the prefix to the server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "babybrestfed@gmail.com";  // GMAIL user name
$mail->Password   = "boffins123";      //gmail password
$mail->AddAddress($to);
$mail->Subject  = $subject;
$mail->Body     =$message;
$mail->WordWrap = 100;
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo 'Message was not sent.'.$to." <br />";
  echo 'Mailer error: ' . $mail->ErrorInfo." <br />";
} else {
  echo 'Message has been sent to   '.$to." <br />";
}

mysqli_close($con);

?>
