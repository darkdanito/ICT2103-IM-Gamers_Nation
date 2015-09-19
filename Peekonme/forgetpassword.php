<?php
	session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>ICT 1004 - Web Systems & Technologies</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />
    </head>
    
    <body>
        <?php include 'header.inc.php'; ?>
        
        <div class="container" style="margin-top: 4em ">
            <div class="row">
                <img src="Images/PeekonME.png" alt="PeekOnMe" class="img-responsive center-block"/>
            </div>
            <?php
            // define variables and set to empty values
            $username = $pword1 = $pword2 = "";

            $usernameErr = $pword1Err = $pword2Err = "";

            $usernamevalid = $pword1valid = $pword2valid = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["username"]);
                $pword1 = test_input($_POST["pword1"]);
                $pword2 = test_input($_POST["pword2"]);

                if (empty($username)) {
                    $usernameErr = "Please do not leave your User Name empty.";
                    $usernamevalid = false;
                } else {
                    $sql = "SELECT userName FROM users";
                    if ($result = mysqli_query($connection, $sql)) {
                        $usernamevalid = true; //Needed when there is no entry in the table yet
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['userName'] == $username) {
                                $usernameErr = "";
                                $usernamevalid = true;
                            } else {
                                $usernameErr = "Username does not exist";
                                $usernamevalid = false;
                            }
                        }
                    }
                }

                if (empty($pword1)) {
                    $pword1Err = "Please do not leave you Password empty.";
                    $pword1valid = false;
                } else {
                    if (!preg_match("/^\w{8,}$/", $pword1)) {
                        $pword1Err = "Please enter a Password with at least 8 alphanumeric characters.";
                        $pword1valid = false;
                    } else {
                        $pword1valid = true;
                    }
                }

                if (empty($pword2)) {
                    $pword2Err = "Please do not leave you Password Confirm empty.";
                    $pword2valid = false;
                } else {
                    if ($pword2 != $pword1) {
                        $pword2Err = "Please enter a matching Password as above.";
                        $pword2valid = false;
                    } else {
                        $pword2valid = true;
                    }
                }

                //If all valid it will goes to welcome.php
                if ($usernamevalid && $pword1valid && $pword2valid) {

                    $salt = bin2hex(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
                    $hashpwd = hash('sha256', $pword1 . $salt);
                    $sql = "UPDATE users SET password = ?, salt = ? WHERE userName=\"" . $username . "\"";
                    if ($statement = mysqli_prepare($connection, $sql)) {
                        mysqli_stmt_bind_param($statement, 'ss', $hashpwd, $salt);
                        mysqli_stmt_execute($statement);
                    }

                    header('Location: login.php');
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
                    <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <legend>Forget Password</legend>

                        <div class="form-group <?php
                        if ($usernamevalid) {
                            echo $validbox;
                        } if ($usernameErr != "") {
                            echo $invalidbox;
                        }
                        ?>">
                            <label class="col-sm-3 control-label" for="username">Username</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="username" name="username"
                                       value="<?php
                        if ($usernamevalid) {
                            echo htmlspecialchars($username);
                        }
                        ?>"
                                       placeholder="<?php
                                       if ($usernameErr != "") {
                                           echo $usernameErr;
                                       }
                        ?>" required>
                            </div>
                        </div>
                        <div class=" form-group <?php
                        if ($pword1valid) {
                            echo $validbox;
                        } if ($pword1Err != "") {
                            echo $invalidbox;
                        }
                        ?>">
                            <label class="col-sm-3 control-label" for="pword1">Password</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="pword1" id="pword1"
                                       placeholder="<?php
                                       if ($pword1Err != "") {
                                           echo $pword1Err;
                                       }
                        ?>" required
                                       pattern="^\w{8,}$" title="Password must at least 8 alphanumeric characters">
                            </div>
                        </div>
                        <div class=" form-group <?php
                        if ($pword2valid) {
                            echo $validbox;
                        } if ($pword2Err != "") {
                            echo $invalidbox;
                        }
                        ?>">
                            <label class="col-sm-3 control-label" for="pword2">Password Confirm</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" name="pword2" id="pword2"
                                       placeholder="<?php
                                       if ($pword2Err != "") {
                                           echo $pword2Err;
                                       }
                        ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="submit" value="Submit" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.inc.php'; ?>
        <script type="text/javascript" src="js/newjs.js"></script> 
    </body>
</html>

