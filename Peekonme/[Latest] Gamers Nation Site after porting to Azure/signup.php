<?php
	session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />
    </head>
    
    <body>
        <?php include 'header.inc.php'; ?>
        <div class="container " style="margin: 4em auto;">
            <!--<div class="row">-->
            <div class="col-xs-6 col-md-4">
                <img src="Images/console.jpg" alt="gameon" class="img-responsive img-circle center-block"/>
                <h1 class="text-center" id="ready">Time to Game</h1>
            </div>
            
			<?php
				// define variables and set to empty values
				$uname = $pword1 = $pword2 = $email ="";
	
				$unameErr = $pword1Err = $pword2Err = $emailErr = "";
	
				$unamevalid = $pword1valid = $pword2valid = $emailvalid = "";
	
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$uname = test_input($_POST["uname"]);
					$pword1 = test_input($_POST["pword1"]);
					$pword2 = test_input($_POST["pword2"]);
					$email = test_input($_POST["email"]);
	
					if (empty($uname)) 
					{
						$unameErr = "Please do not leave your User Name empty.";
						$unamevalid = false;
					} else 
					{
						$sql2 = "if exists(select * from users where userid= '".$uname."') select 1 as returnValue else select 0 as returnValue";
						if ($result2 = sqlsrv_query($conn, $sql2))
						{
							while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC))  
							{	
								if ($row['returnValue'] == 0)
								{
									$unameErr = "";
									$unamevalid = true;
								}
								else
								{
									$unameErr = "Username had been taken";
									$unamevalid = false;
								}
							}
						}
					}
	
					if (empty($pword1)) 
					{
						$pword1Err = "Please do not leave you Password empty.";
						$pword1valid = false;
					} else 
					{
						if (!preg_match("/^\w{8,}$/", $pword1)) 
						{
							$pword1Err = "Please enter a Password with at least 8 alphanumeric characters.";
							$pword1valid = false;
						} else 
						{
							$pword1valid = true;
						}
					}
	
					if (empty($pword2)) 
					{
						$pword2Err = "Please do not leave you Password Confirm empty.";
						$pword2valid = false;
					} else 
					{
						if ($pword2 != $pword1) 
						{
							$pword2Err = "Please enter a matching Password as above.";
							$pword2valid = false;
						} else 
						{
							$pword2valid = true;
						}
					}
					
					if (empty($email)) 
					{
						$emailErr = "Please enter a email address.";
						$emailvalid = false;
					} else 
					{
						if (preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/", $email))
						{
							$emailvalid = true;
						}else
						{
							$emailErr = "Invalid email address.";
							$emailvalid = false;
						}
					}
	
					//If all valid it will goes to welcome.php
					if ($unamevalid && $pword1valid && $pword2valid && $emailvalid) 
					{
						/* randomly generate 12-byte salt */
						$salt = bin2hex(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
						$hashpwd = hash('sha256', $pword1 . $salt);
						$sql = "INSERT INTO users (UserID,Hashed_Password,Salt,Email) VALUES ('".$uname."','".$hashpwd."','".$salt."','".$email."')";
						$stmt = sqlsrv_query($conn, $sql);
						if ($stmt == FALSE)
							die(FormatErrors(sqlsrv_errors()));
						
						$amount = 0;
						
						$_SESSION['username'] = $uname;
	
						header('Location: usergallery.php');
					}
				}
	
				function test_input($data) 
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
            ?>
            <?php
            $validbox = 'has-success has-feedback';
            $invalidbox = 'has-error has-feedback';
            ?>
            
            <div class="col-md-8 form" style="margin: 0 auto;">
                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <legend>Sign Up</legend>
                    <div class="form-group <?php
                    if ($unamevalid) 
					{
                        echo $validbox;
                    } if ($unameErr != "") 
					{
                        echo $invalidbox;
                    }
                    ?>">
                        <label class="col-sm-3 control-label" for="uname">Username</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="uname" name="uname" 
                                   value="<?php
                                   if ($unamevalid) 
								   {
                                       echo htmlspecialchars($uname);
                                   }
                                   ?>" 
                                   placeholder="<?php
                                   if ($unameErr != "") 
								   {
                                       echo $unameErr;
                                   }
                                   ?>" required>
                        </div>
                    </div>

                    <div class=" form-group <?php
                    if ($emailvalid) 
					{
                        echo $validbox;
                    } if ($emailErr != "") 
					{
                        echo $invalidbox;
                    }
                    ?>">
                        <label class="col-sm-3 control-label" for="email">Email</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="email" name="email" id="email"
                                   placeholder="<?php
                                   if ($emailErr != "") 
								   {
                                       echo $emailErr;
                                   }
                                   ?>" required
                                   >
                        </div>
                    </div>

                    <div class=" form-group <?php
                    if ($pword1valid) 
					{
                        echo $validbox;
                    } if ($pword1Err != "") 
					{
                        echo $invalidbox;
                    }
                    ?>">
                        <label class="col-sm-3 control-label" for="pword1">Password</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="password" name="pword1" id="pword1"
                                   placeholder="<?php
                                   if ($pword1Err != "") 
								   {
                                       echo $pword1Err;
                                   }
                                   ?>" required
                                   pattern="^\w{8,}$" title="Password must at least 8 alphanumeric characters">
                        </div>
                    </div>
                    
                    <div class=" form-group <?php
                    if ($pword2valid) 
					{
                        echo $validbox;
                    } if ($pword2Err != "") 
					{
                        echo $invalidbox;
                    }
                    ?>">
                        <label class="col-sm-3 control-label" for="pword2">Password Confirm</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="password" name="pword2" id="pword2"
                                   placeholder="<?php
                                   if ($pword2Err != "") 
								   {
                                       echo $pword2Err;
                                   }
                                   ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <input type="submit" value="Register" class="btn btn-primary"/>
                        </div>
                    </div>
            </div>
        </form>
        <!--</div>-->
    </div>
</div>
<?php include 'footer.inc.php'; ?>
<script type="text/javascript" src="js/newjs.js"></script> 

</body>
</html>