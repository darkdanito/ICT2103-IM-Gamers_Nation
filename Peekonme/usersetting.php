<?php
	session_start();
	
	if ((!isset($_SESSION['username']))) 
	{
		header('Location: login.php');
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
        <link href="css/main.css" rel="stylesheet"/>
    </head>
    
    <?php include 'header.inc.php'; ?>
    
    <body>
        <div class="container-fluid">
            <?php
				include '/include/userdetail.inc.php';
				
				$emailErr = "";
	
				$emailvalid = true;
	
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$email = test_input($_POST["email"]);

					if (!empty($email)) 
					{
						if (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/", $email)) 
						{
							$emailErr = "Please enter a valid Email address.";
							$emailvalid = false;
						}
					}

					//If all valid it will goes to welcome.php
					if ($emailvalid) 
					{
						$sql = "UPDATE user SET Email = ? WHERE UserID =\"" . $username . "\"";
						
						if ($statement = mysqli_prepare($connection, $sql)) 
						{
							mysqli_stmt_bind_param($statement, 's', $email);
							mysqli_stmt_execute($statement);
						}
	
						header('Location: usersetting.php');
					}
				}
	
				function test_input($data) 
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
            	
				include '/include/mainNav.inc.php';
			?>
        </div>

        <div class="container">
            <div class="content">
                <h1>Update your Profile
                    <span>Let others know more about you.</span></h1>
                <form class="form-horizontal" id="Updatedetail" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-8">
                            <input name="email" type="text" class="form-control" id="email" 
                                   value="<?php
                                   if ($emailvalid) 
								   {
                                       echo htmlspecialchars($email);
                                   }
                                   ?>"
                                   placeholder="<?php
                                   if ($emailErr != "") 
								   {
                                       echo $emailErr;
                                   }
                                   ?>"
                                   pattern="^(.+)@([^\.].*)\.([a-z]{2,})$">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" value="Update" class="btn btn-primary"/>
                            <a href="deleteacc.php" class="btn btn-danger" id="dela">Deactivate Account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php include 'footer.inc.php'; ?>

    </body>
</html>