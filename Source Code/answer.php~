<?php
 // Create connection
$con=mysqli_connect("localhost","","","");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    echo $cr=$_REQUEST['registration_id'];
    echo $cr=$_REQUEST['q1'];
    echo $cr=$_REQUEST['q2'];
    echo $cr=$_REQUEST['q3'];
    echo $cr=$_REQUEST['q4'];
    echo $cr=$_REQUEST['q5'];

  $sql="INSERT INTO tbl_answer(registration_id, q1, q2, q3, q4, q5)
  VALUES('$_REQUEST[registration_id]', '$_REQUEST[q1]','$_REQUEST[q2]', '$_REQUEST[q3]', '$_REQUEST[q4]', '$_REQUEST[q5]')";

  
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
    <body>
<div style="margin-top:125px">
             <img alt="" border="0" src="img/final_thanks.png" style="margin-left:250px"/>
          </div>
</body>
</HTML>