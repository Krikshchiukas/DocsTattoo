<?php
session_start();
require_once 'connection.php';
include 'machine.php';
include 'apparel.php';

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

$sql = "select *
From product, machine, colours, styles, coils
where product.machine_ID = machine.machine_ID
and machine.colour_ID = colours.colour_ID
and machine.style_ID = styles.style_ID
and styles.coil_ID = coils.coil_ID
and product.legacy = 0
ORDER BY product.legacy,product.product_ID";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$machines = $statement->fetchAll(PDO::FETCH_CLASS,"Machine");

$sql = "SELECT *
FROM product, apparel, colours
Where apparel.apparel_ID = product.apparel_ID
AND apparel.colour_ID = colours.colour_ID
AND product.legacy = 0
ORDER BY product.legacy,product.product_ID";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$apparel = $statement->fetchAll(PDO::FETCH_CLASS,"Apparel");		
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
<td class = "menu"><a href="home.php" class = "menulink">Home</a></td>
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

<h1>All our current machines</h1><br>

<?php
if ($machines != null){	
	foreach ($machines as $inst)
	{

	$imagecode = $inst->product_ID.$inst->machine_ID.$inst->colour_ID.$inst->style_ID.$inst->coil_ID."ma.png";
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=images/".$imagecode." alt=".$imagecode."class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\"><table><form action = \"cartup.php\" method = \"POST\"><tr><td class = \"concell\">".$inst->style_name."</td><td class = \"concell\"><input type=\"submit\" class = \"cart\" value=\"add to cart\"></td></tr>";
	echo "<tr><td class = \"concell\">".$inst->type." with a ".$inst->shape." shape</td><td class = \"concell\">£ ".$inst->price."</td></tr>";
	echo "<tr><td class = \"concell\">Made from: ".$inst->material."</td><td class = \"concell\"> <input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"></td></tr></table></td></tr>";
	echo "<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">";
	echo "<input type=\"hidden\" name=\"price\" value=".$inst->price."> </form>
	<tr><form action = \"product.php\" method = \"POST\"><td class = \"concell\"><input type=\"submit\" class = \"menulink\"value=\"view full product details\">
	<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID."></form></td></tr></table>";
	echo "<br>";
	}
	}
	else{
		echo"no products can be found";
	}
?>

<h1>All our current apparel</h1><br>

<?php
if ($apparel != null){	
	foreach ($apparel as $inst)
	{

	$imagecode = $inst->product_ID.$inst->apparel_ID.$inst->colour_ID."ap.png";
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=images/".$imagecode." alt=".$imagecode."class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\">";
	echo "<table><form action = \"cartup.php\" method = \"POST\">";
	echo "<tr><td class = \"concell\">".$inst->name."</td><td class = \"concell\"><input type=\"submit\" class = \"cart\" value=\"add to cart\"></td></tr>";
	echo "<tr><td class = \"concell\">Shape: ".$inst->shape."</td><td class = \"concell\">£ ".$inst->price."</td></tr>";
	echo "<tr><td class = \"concell\">Size: ".$inst->size."</td><td class = \"concell\"> <input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"></td></tr></table></td></tr>";
	echo "<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">";
	echo "<input type=\"hidden\" name=\"price\" value=".$inst->price."> </form>
	<tr><form action = \"product.php\" method = \"POST\"><td class = \"concell\"><input type=\"submit\" class = \"menulink\" value=\"view full product details\">
	<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID."></form></td></tr></table>";
	echo "<br>";
	}
	}
	else{
		echo"no products can be found";
	}
?>
</div>
</body>
</html>