<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	
	
	
	<title>Sending SMS After Registration</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" media="screen" href="css/superfish.css"/>
	<link rel="stylesheet" href="css/style.css" media="all"/>
	<link rel="stylesheet" media="all" href="css/lessframework.css"/>
	<link rel="stylesheet" href="css/bootstrap.css" media="all"/>
	<script src="js/modernizr-2.5.3.min.js"></script>
	
<?php
    include_once ("sqlsmshandling_functions.php");
?>
    
</head>

<body>
<div role="main" id="main">
		<div class="wrapper">
		
			<div class="page-content">
			
<form id="contactForm" action="" method="post">

                <h2 class="heading">Compose Message</h2>
			  
														
						<p>
							<label for="textAreaRecipient" >Recipient:</label>
							<input name="textAreaRecipient"  type="text"/>
						
							<?php  echo ((isset($_POST["textAreaRecipient"])) ? ($_POST["textAreaRecipient"]) : ("")); ?></p>
 
			<p>
							<label for="textAreaMessage">Message Text:</label>
							<textarea name="textAreaMessage" cols="40" rows="10">
						
		<?php  echo ((isset($_POST["textAreaMessage"])) ? ($_POST["textAreaMessage"]) : ("")); ?></textarea></p>
     
	 <p><input type="submit" value="Send" name="submit" class="btn btn-primary"/></p>
					
					
		
        <?php
        if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] == "")
        {
            echo "<font style=\"color: red; font-weight: bold;\">Recipient field mustn't be empty!</font>";
        }
        else if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] != "")
        {
            try
            {
                connectToDatabase();
                if (insertMessage ($_POST["textAreaRecipient"], "SMS:TEXT", $_POST["textAreaMessage"]))
                {
                    echo "<font style=\"color: red; font-weight: bold;\">Insert was successful!</font>";
                }
                closeConnection ();
            }
            catch (Exception $exc)
            {
                echo "Error: " . $exc->getMessage();
            }
        }
        ?>
</form>

<iframe src="sqlsmshandling_inoutmessages.php" align="center" width="90%" height="500" frameborder="0"></iframe>
	
	<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
	<script  src="js/superfish-1.4.8/js/superfish.js"></script>
	<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
	<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>

</body>
</html>