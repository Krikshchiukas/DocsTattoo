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
<td class = "menu"><a href="home.php" class = "menulink">Home Page</a></td>
<td class = "menu"><a href="products.php" class = "menulink">All products</a></td>
<td class = "menu"><a href="allmach.php" class = "menulink">Machines</a></td>
<td class = "menu"><a href="allapp.php" class = "menulink">Apparel</a></td>
<td class = "menu"><a href="about.php" class = "menulink">About Docs Irons</a></td>
<td class = "menu"><a href="/k1626571/docstattoo/home.html" class = "menulink">Docs Tattoo Studio</a></td>
<td class = "cart"><a href="cart.php" class = "cartlink">Cart
<?php
echo "(".$count.")";
echo "(£".$tp.")";
?></a></td>
</tr>
</table>
<br>
<h1>Contact and FAQ</h1><br>

<table class = "content">
<tr>
<td class = "concell" class = "midtext">
<h1>Contact details</h1><br>
If you are having any issues with your product and your inquirers was not answered in the frequently asked question section.
<br>please use the following methods to contact us and we will be happy to help resolve the issues related to your product.<br>
<br>Telephone: 0207/403/1600 (10 am-5pm GMT/ rates apply)
<br>Email: doc@docstattoostudio.co.uk
</td>
</tr>
<tr>
<td class = "concell" class = "midtext">
<h1>Frequently asked questions</h1><br>
How long does it take for my machine to be delivered?<br>
Normally two weeks, as we use standard posting. Places outside of the UK can take longer.<br>
Where do you ship too?<br>
We currently only post to the UK, most of Europe, some parts of the USA and Canada. However additional rates will apply.<br>
Do you make custom machines or modifications?<br>
We sometimes do modifications and special machines. however these would have to be arranged through email.<br>
What types of payments do you take?<br>
We only accept payment through PayPal and work with British pounds GBP.<br>

</td>
</tr>
</table>

</div>
</body>
</html>