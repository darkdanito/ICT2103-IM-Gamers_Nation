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
        <div class="container" style="margin-top: 4em ">
            <div class="row">                
                <!--<h1>Gamers Nation</h1>-->
                <img src="Images/logo.png" alt="GamerNation" class="img-responsive center-block"/>
            </div>
            <?php
            // define variables and set to empty values
            $username = $password = "";

            $usernameErr = $passwordErr = "";

            $usernamevalid = $passwordvalid = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);

                if (empty($username)) {
                    $usernameErr = "Username is empty.";
                    $usernamevalid = false;
                } 
                if (empty($password)) {
                    $passwordErr = "Password is empty.";
                    $passwordvalid = false;
                } else {
                    $sql = "SELECT UserID, Hashed_Password, Salt FROM user";
                    if ($result = mysqli_query($connection, $sql)) {
                        $usernameErr = "Username does not exist";
                        $usernamevalid = false; //Needed when there is no entry in the table yet
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['UserID'] == $username) {
                                $usernameErr = "";
                                $usernamevalid = true;
                                $salt = $row['Salt'];
                                $hashpwd = hash('sha256', $password . $salt);
                                if ($hashpwd == $row['Hashed_Password']) 
								{
                                    $passwordErr = "";
                                    $passwordvalid = true;
                                    break;
                                } else 
								{
                                    $passwordErr = "Invalid password";
                                    $passwordvalid = false;
                                    break;
                                }
                            } else 
							{
                                $usernameErr = "Username does not exist";
                                $usernamevalid = false;
                            }
                        }
                    }
                }

                //If all valid it will goes to welcome.php
                if ($usernamevalid && $passwordvalid) {

                    $_SESSION['username'] = $username;

                    header('Location: usergallery.php');
                }
            }

            function test_input($data) {
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
            <div class="row">
                <div class="col-md-12 form">
                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <legend>Login</legend>
                    <div class="form-group <?php if($usernamevalid) {echo $validbox;} if($usernameErr != ""){echo $invalidbox;}?>">
                        <label class="col-sm-3 control-label" for="username">Username</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="username" name="username"
                                   value="<?php if($usernamevalid) {echo htmlspecialchars($username);}?>"
                                   placeholder="<?php if($usernameErr != ""){echo $usernameErr;}?>" required>
                        </div>
                    </div>
                    <div class="form-group <?php if($passwordvalid) {echo $validbox;} if($passwordErr != ""){echo $invalidbox;}?>">
                        <label class="col-sm-3 control-label" for="password">Password</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="password" id="password" name="password"
                                   placeholder="<?php if($passwordErr != ""){echo $passwordErr;}?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <a href="forgetpassword.php">Forget Password?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <input type="submit" value="Login" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <?php include 'footer.inc.php'; ?>
    </body>
</html>

