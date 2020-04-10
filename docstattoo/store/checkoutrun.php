<?php
session_start();
require_once 'connection.php';

$products = array("");
$count = null;
$tp = null;
$quantity = array("");
$customer_ID = null;

if (!isset($_SESSION['quantity'])){
	$_SESSION['quantity'] = array();
	//echo "quantity not grabbed";
	header("Location: home.php");
}
else{
	$quantity = $_SESSION['quantity'];
	//echo "quantity grabbed";
	//echo $quantity;
}
if (!isset($_SESSION['products'])){
	$_SESSION['products'] = array();
	//echo "products not grabbed";
	header("Location: home.php");
}
else{
	$products = $_SESSION['products'];
	//echo "products grabbed";
	//echo $products;
}	
if (!isset($_SESSION['count'])){
	$_SESSION['count'] = 0;
	//echo "count not grabbed";
}
else{
	$count = $_SESSION['count'];
	//echo "count grabbed";
	//echo $count;
}
if (!isset($_SESSION['tp'])){
	$_SESSION['tp'] = 0;
	//echo "tp not grabbed";
}
else{
	$tp = $_SESSION['tp'];
	//echo "tp grabbed";
	//echo $tp;
}
if (!isset($_SESSION['customer_ID'])){
	$_SESSION['customer_ID'] = 0;
	//echo "tp not grabbed";
}
else{
	$customer_ID = $_SESSION['customer_ID'];
	//echo "tp grabbed";
	//echo $tp;
}

if(empty($products)) {
    echo "cart is empty";
	header("Location: home.php");
}else{}

	
function fetch($post){
if (!empty($_POST))
{
$temp = htmlentities($post);

if (!isset($temp)){
	return "empty";
}
else{
	
if (empty($temp)){
		
		return "empty";
		if (!$temp){
			echo"failed to fill";
			return "empty";
		}
		else{}
	}
	else{return $temp;}	
}
}
}		
?>

<!DOCTYPE html>
<html>
<head>
<title>Docs Irons</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>

<div class = "head">
<div class = "banner">
<img class = "banner" src="banner.png">
</div>
<div class = "subbanner">
<img class = "subbanner" src="subbanner.png">
</div>
</div>

<div class = "body">
<table class = "menuhold">
<tr>
<td class = "menu"><a href="home.php" class = "menulink">Back to the home page</a></td>
</tr>
</table>
<br>
<h1>Check out</h1><br>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7DRB8LVS22HAW">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

<br>
paypal button dead
<br>
<a href="storeup.php">finish check out</a>

</div>

</body>
</html>