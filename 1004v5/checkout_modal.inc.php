<?php 

	include 'db.php';

	$total = 0.0000;
	$remark ="";

	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}

if(ISSET ($_SESSION['cart'])){
    if (ISSET($_POST["command"])){
        if ($_POST["command"]== "update"){
            $max=count($_SESSION['cart']);
                    for($i=0;$i<$max;$i++){
                            $pid=$_SESSION['cart'][$i]['productid'];
                            $qty=intval($_REQUEST['product'.$pid]);
                            if($qty>0 && $qty<=999){
                                    $_SESSION['cart'][$i]['qty']=$qty;
                            }
                    }
                     header("Location: index.php");

        }
        if ($_POST["command"]== "delete"){
            if (ISSET($_POST["pid"])){
                $pid = $_POST["pid"];
            //    echo $pid;
            remove_product($pid);
            header("Location: index.php");
            }
        }

        if ($_POST["command"]== "insert"){
            
            if(ISSET ($_SESSION['username'])){
            if (ISSET($_POST["total"]) && ISSET($_POST["remark"]) && ISSET($_POST["subtotal"])){
                $total =$_POST["total"];
                $remark = $_POST["remark"];
                $username = $_SESSION['username'];
                $due = getOwe($username);
                $subcost = 0.0;
                $paydue = $due + $total; 
               // echo $paydue;
                $time= date("Y-m-d H:i:s");
                $sql2 = ("UPDATE `user` SET `paymentDue` = '{$paydue}' WHERE `mID` = '{$username}'");
                mysqli_query($connection,$sql2);
                $sql = ("INSERT INTO `order` (`totalCost`, `matrixNo`, `orderStatus`, `time`, `remarks`)VALUES('$total','$username','In Process', '$time','$remark')");
                mysqli_query($connection,$sql);
                $orderid=mysqli_insert_id($connection);
                echo $orderid;

                $max=count($_SESSION['cart']);
                    for($i=0;$i<$max;$i++){
                        $pid=$_SESSION['cart'][$i]['productid'];
                        $q=$_SESSION['cart'][$i]['qty'];
                        $price=getPrice($pid);
                        $subcost = ($price * $q) ;     
                        $sql1=("INSERT INTO `ordereditem` (`subQty`, `subcost`, `menuID`, `orderID`)VALUES('$q','$subcost','$pid', '$orderid')");
                        $query = mysqli_query($connection,$sql1);
                         } //for loop
                            if ($query){
                                unset($_SESSION['cart']);
                                $_SESSION['invoice'] = 1;
                                header("Location: mailOrder.php");
                            }
                            
                               
            }   //var
                
                 
        } //login
        else{
        $_SESSION['noLogin'] = 1;
        header("Location: index.php");
        }
            
        } //insert
    } //command
}//session


function getPrice($pid){
     include 'db.php';
       $sql = "SELECT * FROM `menu` WHERE menuID = '{$pid}'";
       if($result = mysqli_query($connection, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                $price = $row['menuCost'];
                
            }
            return $price;
            }
       }
       
function getOwe($mid){
     include 'db.php';
       $sql = "SELECT * FROM `user` WHERE mID = '{$mid}'";
       if($result = mysqli_query($connection, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                $owe = $row['paymentDue'];
                
            }
            return $owe;
            }
       }
       
 function remove_product($pid){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
      
}
 