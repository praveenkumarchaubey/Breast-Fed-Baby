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


mysqli_close($con);
?> 

<?php
//vars
$subject = $_POST['subject'];
$to = $_POST['to'];

$from = $_POST['email'];

//data
$msg = "NAME: "  .$_POST['name']    ."<br>\n";
$msg .= "EMAIL: "  .$_POST['email']    ."<br>\n";
$msg .= "COMMENTS: "  .$_POST['comments']    ."<br>\n";

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

 require("phpmailer/class.phpmailer.php");
//send for each mail
foreach($to as $mail){
  


$mail = new PHPMailer();
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "smtp.gmail.com"; // SMTP server
$mail->SMTPAuth   = true;  // enable SMTP authentication
$mail->SMTPSecure = "tls";  // sets the prefix to the servier
$mail->Port       = 587;   // set the SMTP port for the GMAIL server
$mail->Username   = "babybrestfed@gmail.com";  // GMAIL username
$mail->Password   = "boffins123";    //gmailpassword
$mail->AddAddress($to);
$mail->Subject  = $subject;
$mail->Body     =$msg;
$mail->WordWrap = 100;
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo 'Message was not sent.'.$to." <br />";
  echo 'Mailer error: ' . $mail->ErrorInfo." <br />";
} else {
  echo 'Message has been sent to   '.$to." <br />";
}

}

?>
