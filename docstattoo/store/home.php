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
}
else{
	$products = $_SESSION['quantity'];
	//echo "quantity grabbed";
	//echo $quantity;
}
if (!isset($_SESSION['products'])){
	$_SESSION['products'] = array();
	//echo "products not grabbed";
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
<td class = "menu"><a href="products.php" class = "menulink">All products</a></td>
<td class = "menu"><a href="allmach.php" class = "menulink">Machines</a></td>
<td class = "menu"><a href="allapp.php" class = "menulink">Apparel</a></td>
<td class = "menu"><a href="about.php" class = "menulink">About Docs Irons</a></td>
<td class = "menu"><a href="contact.php" class = "menulink">Contact and FAQ</a></td>
<td class = "menu"><a href="/k1626571/docstattoo/home.html" class = "menulink">Docs Tattoo Studio</a></td>
<td class = "cart"><a href="cart.php" class = "cartlink">Cart
<?php
echo "(".$count.")";
echo "(£".$tp.")";
?></a></td>
</tr>
</table>
<br>

<h1>Welcome to Docs Irons</h1><br>
shop by machines or apparel<br>
<table class = "content">
<tr>
<td class = "concell">
<a href="allmach.php"><img class = "conpic" src="machines.png"></a>
<br>machines
</td>
<td class = "concell">
<a href="allapp.php" class = "menulink"><img class = "conpic" src="apparel.png"></a>
<br>apparel
</td>
</tr>
</table>

</div>

<a href="admin/adlog.html" class="cc">Docs Irons copyright 2019</a>
</body>
</html>