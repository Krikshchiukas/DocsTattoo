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
<h1>About Docs Irons</h1><br>

<table class = "content">
<tr>
<td class = "concell" class = "midtext">
Doc has been a tattoo artist for over 40 years, running many shops <br>
within the UK and Ireland. Over the decade Doc has ventured into making his own machines<br>
utilising many skills he has learnt being a labourer.<br>
Combining his two passions of creating and tattooing, Doc has come up with many simple<br>
but effective designs based on traditional coil tattoo machines.<br>
Now venturing into the 2020’s it has come time for Doc share his skills and knowledge with the world,<br>
by selling his new range of hand crafted tattoo machines.
</td>
<td class = "concell">
<img class = "conpic" src="doc2.png">
</td>
</tr>
<tr>
<td class = "concell">
<img class = "conpic" src="workshop.png">
</td>
<td class = "concell" class = "midtext">
Currently Doc produces all of his machines in his personal workshop.<br>
Using basic tools and fine quality Martials sourced from long term suppliers.<br>
All machines are hand crafted by Doc and are made in small batches,<br>
therefore most models will be limited runs or one off pieces.
</td>
</tr>
<tr>
<td class = "concell" class = "midtext">
All machines are made from stainless steel and brass. Combined with the<br>
high grade magnets and clean copper cables for the hand wound coils.<br>
These machines are some of the finest on the market and are built<br>
to last many years and design to be easily cleaned.
</td>
<td class = "concell">
<img class = "conpic" src="machines.png">
</td>
</tr>
</table>

</div>
</body>
</html>