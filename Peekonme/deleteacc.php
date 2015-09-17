<?php

require_once('../../../protected/config1.php');

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

//mysqli_connect_errno returns the last error code
if(mysqli_connect_errno()) {
    die(mysqli_connect_error()); //die() is equivalent to exit()	
}

session_start();

$username = $_SESSION['username'];

//Delete from userimages table
$sql = "DELETE FROM userimages WHERE user_name = \"" . $username . "\"";
mysqli_query($connection, $sql);

//Delete from users table
$sql1 = "DELETE FROM users WHERE userName = \"".$username."\"";
mysqli_query($connection, $sql1);

header('Location: logout.php');

?>
