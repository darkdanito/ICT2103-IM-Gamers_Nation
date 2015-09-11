<?php

session_start();

$menuID = $_POST['menuID'];
//echo $menuID

$i = 0;

addtocart($menuID,1);

header('Location: index.php#SitCafe');

function addtocart($pid,$q)
{
	if($pid<1 or $q<1) return;
 
	if(is_array($_SESSION['cart']))
	{
		if(product_exists($pid)) return;
		$max=count($_SESSION['cart']);
		$_SESSION['cart'][$max]['productid']=$pid;
		$_SESSION['cart'][$max]['qty']=$q;
	}
	else
	{
		$_SESSION['cart']=array();
		$_SESSION['cart'][0]['productid']=$pid;
		$_SESSION['cart'][0]['qty']=$q;
	}
}

function product_exists($pid,$q)
{
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	$flag=0;

	for($i=0;$i<$max;$i++)
	{
		if($pid==$_SESSION['cart'][$i]['productid'])
		{
			$_SESSION['cart'][$i]['qty']+=1;
            $flag=1;
			break;
		}
	}
	return $flag;
}

function remove_product($pid)
{
	$pid=intval($pid);
	$max=count($_SESSION['cart']);

	for($i=0;$i<$max;$i++)
	{
		if($pid==$_SESSION['cart'][$i]['productid'])
		{
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
}
