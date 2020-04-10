<?php
session_start();
require_once 'connection.php';

$products = array("");
$count = null;
$tp = null;
$quantity = array("");

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

if(empty($products)) {
    echo "cart is empty";
	header("Location: home.php");
}else{}

	
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

<table class = "content">
<tr>
<td class = "concell">
Are you a exsisting Customer?<br>

<table class = "content">
<form action="getcust.php" method = "POST">
<tr><td>Email address</td><td><input type = "text" name ='email' id ='email'></td></tr>
<tr><td>Password</td><td><input type = "password" name ="password"></td></tr>
</tr><td><input type = "submit" class = "menulink" value = "Sign in"></td></tr>
</form>
</table>

</td>
<td class = "concell">
Sign up to purchase to complete your purchase.<br>
<table class = "content">
<form action="addcust.php" method = "POST">
<tr><td>First name</td><td><input type = "text" name = "first_name"></td></tr>
<tr><td>Last name</td><td><input type = "text" name = "last_name"></td></tr>
<tr><td>Email address</td><td><input type = "text" name = "email"></td></tr>
<tr><td>Address line 1</td><td><input type = "text" name = "address_1"></td></tr>
<tr><td>Address line 2</td><td><input type = "text" name = "address_2"></td></tr>
<tr><td>Town/City</td><td><input type = "text" name = "region"></td></tr>
<tr><td>Post code/ ZIP code</td><td><input type = "text" name = "postcode"></td></tr>
<tr><td>Password</td><td><input type = "password" name = "password"></td></tr>
</tr><td><input type = "submit" class = "menulink" value = "Sign up"></td></tr>
</form>
</table>
</td>
</tr>
</table>

</div>

</body>
</html>