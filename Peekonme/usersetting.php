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
        
        <title>ICT 1004 - Web Systems & Technologies</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
        <link href="css/main.css" rel="stylesheet"/>
    </head>
    
    <?php include 'header.inc.php'; ?>
    
    <body>
        <div class="container-fluid">
            <?php
				include '/include/userdetail.inc.php';
				
				$emailErr = $webpageErr = "";
	
				$emailvalid = $webpagevalid = $namevalid = $aboutvalid = $dobvalid = true;
	
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$name = test_input($_POST["name"]);
					$email = test_input($_POST["email"]);
					$dob = test_input($_POST["dob"]);
					$about = test_input($_POST["about"]);
					$webpage = test_input($_POST["webpage"]);
	
					if (!empty($email)) 
					{
						if (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/", $email)) 
						{
							$emailErr = "Please enter a valid Email address.";
							$emailvalid = false;
						}
					}
	
					if (!empty($webpage)) 
					{
						if (!preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $webpage)) 
						{
							$webpageErr = "Please enter a valid Webpage URL.";
							$webpagevalid = false;
						}
					}
	
					//If all valid it will goes to welcome.php
					if ($emailvalid && $webpagevalid && $namevalid && $aboutvalid) 
					{
						$sql = "UPDATE users SET name = ?, email = ?, dob = ?, about = ?, webpage = ? WHERE userName=\"" . $username . "\"";
						
						if ($statement = mysqli_prepare($connection, $sql)) 
						{
							mysqli_stmt_bind_param($statement, 'sssss', $name, $email, $dob, $about, $webpage);
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
                        <label class="col-sm-2 control-label" for="name">Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="name" name="name" 
                                   value="<?php
                                   if ($namevalid) 
								   {
                                       echo htmlspecialchars($name);
                                   }
                                   ?>">
                        </div>
                    </div>

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
                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" name="dob" id="dob" min="1900-01-02"
                                   value="<?php
                                   if ($dobvalid) {
                                       echo htmlspecialchars($dob);
                                   }
                                   ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="about" class="col-sm-2 control-label">About Me</label>
                        <div class="col-sm-8">
                            <textarea rows="4" cols="50" id="about" name="about" form="Updatedetail" maxlength="1000" style="color: #606060"><?php
                                if ($aboutvalid) {
                                    echo htmlspecialchars($about);
                                }
                                ?>
                            </textarea>       
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="webpage" class="col-sm-2 control-label">Webpage Link</label>
                        <div class="col-sm-8">
                            <input name="webpage" type="text" class="form-control" id="webpage" 
                                   value="<?php
                                   if ($webpagevalid && $webpageErr == "") {
                                       echo htmlspecialchars($webpage);
                                   }
                                   ?>"
                                   placeholder="<?php
                                   if ($webpageErr != "") {
                                       echo $webpageErr;
                                   }
                                   ?>"
                                   pattern="^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$">
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