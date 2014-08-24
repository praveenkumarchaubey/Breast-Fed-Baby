 <?php
 // Create connection
$con=mysqli_connect("localhost","","","");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql="INSERT INTO tbl_registration_form(mother_name, date_of_birth, del_date, state, current_city, area, pincode, mobile, mail)
  VALUES('$_REQUEST[mother_name]', '$_REQUEST[date_of_birth]','$_REQUEST[del_date]', '$_REQUEST[state]', '$_REQUEST[currentcity]', '$_REQUEST[area]', '$_REQUEST[pincode]', '$_REQUEST[mobile]', '$_REQUEST[mail]')";

  
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
  ?>

   <?php
$query = "SELECT registration_id FROM tbl_registration_form ORDER by  registration_id DESC LIMIT 1";
$result = mysqli_query($con, $query);
/* numeric array */
$ID = mysqli_fetch_array($result, MYSQLI_NUM);
printf ("%s \n", $ID[0]);
mysqli_free_result($result);

//mail recipients
$to  = $_POST["mail"];

//subject
$subject = 'Promoting Breastfeeding';

// message
$message  = '<html><head>';
$message .= '<title><h2>Promoting Breastfeeding</h2></title></head>';
$message .= '<body><p>Dear User,</p>';
$message .= '<p><strong>Congratulations..!!!</strong> You have been registered successfully.</p>';
$message .= '<p>Thank you for registering with us.</p>';
$message .= '<p>Here is your Detailed Information recorded in our database. Please make a note of your <strong>Registration ID</strong> for future reference.</p>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Registration ID:</strong> </td><td>" . strip_tags("$ID[0]") . "</td></tr>";
$message .= "<tr><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['mother_name']) . "</td></tr>";
$message .= "<tr><td><strong>Date of Birth:</strong> </td><td>" . strip_tags($_POST['date_of_birth']) . "</td></tr>";
$message .= "<tr><td><strong>Date of Delivery:</strong> </td><td>" . strip_tags($_POST['del_date']) . "</td></tr>";
$message .= "<tr><td><strong>State:</strong> </td><td>" . strip_tags($_POST['state']) . "</td></tr>";
$message .= "<tr><td><strong>City:</strong> </td><td>" . strip_tags($_POST['currentcity']) . "</td></tr>";
$message .= "<tr><td><strong>Area:</strong> </td><td>" . strip_tags($_POST['area']) . "</td></tr>";
$message .= "<tr><td><strong>Mobile:</strong> </td><td>" . strip_tags($_POST['mobile']) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['mail']) . "</td></tr>";
$message .= "</table>";
$message .= '<p><strong>Please <a href="http://projects.iic.ac.in/nic/Boffins/post_registration_form.html">click here</a>  on the link provided to complete your Registration.</strong></p>';
$message .= '<p>Thanking You...</p>';
$message .= '<p>With Regards,</p>';
$message .= '<p><strong>Data Portal India</strong></p>';
$message .= '<p>*** This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information.
 If you have received this message in error, please notify the sender immediately and delete this message from your system ***</p>';
$message .= '</body></html>';
//Sending the Content-type header
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

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
  
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
    <body>
<div style="margin-top:125px">
             <img alt="" border="0" src="img/Breast_Milk_thanks1.png" style="margin-left:250px"/>
          </div>
</body>
</HTML>
  
 
