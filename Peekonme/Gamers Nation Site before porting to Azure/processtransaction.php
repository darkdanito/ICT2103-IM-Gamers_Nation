<?php

require_once('protected/config1.php');
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (mysqli_connect_errno()) {     // mysqli_connect_errno returns the last error code
    die(mysqli_connect_error());   // die() is equivalent to exit()	
}
session_start();

$gameid = $shopid = $gametitle = $gameprice = $gamequantity = $orderid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = $_SESSION['username'];
    $gameid = test_input($_POST["gameid"]);
    $shopid = test_input($_POST["shopid"]);
    $gametitle = test_input($_POST["title"]);
    $gameprice = test_input($_POST["price"]);
    $gamequantity = test_input($_POST["quantity"]);

    //Insert to Order make
    $currentdt = date('Y-m-d H:i:s');
    $sql = "INSERT INTO order_make (Buyer_UserID,Purchare_Time) VALUES (?,?)";
    if ($statement = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($statement, 'ss', $uname, $currentdt);
        mysqli_stmt_execute($statement);
    }
    
    //Remove the stock from supplier
    $sql = "UPDATE supplier_own_game SET Stock = Stock - ".$gamequantity." WHERE Supplier_UserID = '".$shopid."' AND GameID = '".$gameid."'";
    $result = mysqli_query($connection, $sql);
    
    //increase Sale
    $totalcost = $gameprice * $gamequantity;
    $sql = "UPDATE supplier SET Total_Sales = Total_Sales + ".$totalcost." WHERE UserID = '".$shopid."'";
    $result = mysqli_query($connection, $sql);
    
    //increase Expenditure
    $sql = "UPDATE buyer SET Total_Expenditure = Total_Expenditure + ".$totalcost." WHERE UserID = '".$uname."'";
    $result = mysqli_query($connection, $sql);
    
    //Get latest orderID
    $sql = "SELECT OrderID FROM order_make ORDER BY OrderID DESC;";

    if ($result = mysqli_query($connection, $sql)) {
        $row = mysqli_fetch_assoc($result);
        // grab latest one (if need more just do for loop)
        $orderid = $row['OrderID'];
        echo $orderid;
    }

    //Insert to Order Product
    $sql = "INSERT INTO ordered_product (Supplier_UserID,GameID,OrderID,Quantity,Price) VALUES (?,?,?,?,?)";
    if ($statement = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($statement, 'sssss', $shopid, $gameid, $orderid, $gamequantity, $gameprice);
        mysqli_stmt_execute($statement);
        
        $_SESSION['purchasesuccess'] = "true";
        header('Location: explore.php');
    }
}
?>
