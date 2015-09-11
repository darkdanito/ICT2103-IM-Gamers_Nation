<?php
 session_start();
 $oldpw = $_POST['oldpassword'];
 $newpw = $_POST['newpassword'];
 $user = $_SESSION['username'];
 
 require_once('../../../protected/team11/config_grp.php');
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$error = mysqli_connect_error();
if ($error != null) {
$output = "<p>Unable to connect to database<p>" . $error;
exit($output);
}
 
$sql = "SELECT pw FROM `user` WHERE mID='".$user."'";
echo $sql;
if ($result = mysqli_query($connection, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pw = $row['pw'];    
        break;
    }
}

if(password_verify($oldpw, $pw)){
echo '<p> valid';
$hash = password_hash($newpw, PASSWORD_BCRYPT);
$sql = "UPDATE user SET pw='".$hash."' WHERE mID='".$user."'";
    mysqli_query($connection, $sql);
 $_SESSION['changepwsuccess'] = 1;
header("location:index.php");
}
//pw updated
else{
    $_SESSION['changepwfail'] = 1;
    header("location:index.php");
}


 
 