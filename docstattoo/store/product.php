<?php
session_start();
require_once 'connection.php';
include 'machine.php';
include 'apparel.php';
include 'prod.php';


$product_ID = fetch($_POST['product_ID']);
$machine = null;
$apparel = null;

$products = array("");
$count = null;
$tp = null;
$quantity = array("");

if (!isset($_SESSION['quantity'])){
	$_SESSION['quantity'] = array();
	//echo "quantity not grabbed";
}
else{
	$quantity = $_SESSION['quantity'];
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



$sql = "
SELECT *
FROM product
WHERE product_ID = ".$product_ID."";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$product = $statement->fetchAll(PDO::FETCH_CLASS,"Prod");

if ($product != null){	
	foreach ($product as $inst)
	{
		
if($inst->apparel_ID == null || $inst->apparel_ID == "empty" ){
	
	$sql = "select *
From product, machine, colours, styles, coils
where product.machine_ID = machine.machine_ID
and machine.colour_ID = colours.colour_ID
and machine.style_ID = styles.style_ID
and styles.coil_ID = coils.coil_ID
and product.product_ID = ".$inst->product_ID."";


global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$machine = $statement->fetchAll(PDO::FETCH_CLASS,"Machine");
	

}
else if ($inst->machine_ID == null || $inst->machine_ID == "empty"){
	
	$sql = "SELECT *
FROM product, apparel, colours
Where apparel.apparel_ID = product.apparel_ID
AND apparel.colour_ID = colours.colour_ID
AND product.product_ID = ".$inst->product_ID."";


global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$apparel = $statement->fetchAll(PDO::FETCH_CLASS,"Apparel");
	
}
else{
	header("Location: home.php");
	echo "cant retrive";
	}
	}
}else{echo "product cant be found";}


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
<td class = "menu"><a href="home.php" class = "menulink">Home</a></td>
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
<br>

<?php

if($apparel != null){

	foreach ($apparel as $inst)
	{
	$imagecode = $inst->product_ID.$inst->apparel_ID.$inst->colour_ID."ap.png";
	
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=images/".$imagecode." alt=".$imagecode." class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\"><table>";
	echo "<tr><td>Product name:".$inst->name."</td></tr>";
	echo "<tr><form action = \"cartup.php\" method = \"POST\"><input type=\"hidden\" name=\"price\" value=".$inst->price."><input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">
	<td>£".$inst->price."</td><td><input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"></td><td><input type=\"submit\"class = \"cart\" value=\"add to cart\"></td></form></tr>";
	echo "<tr><td>Colours:</td><td>".$inst->colour1." & ".$inst->colour2."</td></tr>";
	echo "<tr><td>Shape:</td><td>".$inst->shape."</td></tr>";
	echo "<tr><td>Size:</td><td>".$inst->size."</td></tr>";
	echo "</table></td>";
	echo "</tr></table>";	
	}
	
}else if ($machine != null){

	foreach ($machine as $inst)
	{
	$imagecode = $inst->product_ID.$inst->machine_ID.$inst->colour_ID.$inst->style_ID.$inst->coil_ID."ma.png";
	
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=images/".$imagecode." alt=".$imagecode." class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\"><table>";
	echo "<tr><td>Product name:".$inst->style_name."</td></tr>";
	echo "<tr><form action = \"cartup.php\" method = \"POST\"><input type=\"hidden\" name=\"price\" value=".$inst->price."><input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">
	<td>£".$inst->price."</td><td><input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"></td><td><input type=\"submit\" class = \"cart\" value=\"add to cart\"></td></form></tr>";
	echo "<tr><td>Colours:</td><td>".$inst->colour1." & ".$inst->colour2."</td></tr>";
	echo "<tr><td>Body shape:</td><td>".$inst->shape."</td></tr>";
	echo "<tr><td>machine Type:</td><td>".$inst->type."</td></tr>";
	echo "<tr><td>coils:</td><td>First coil: ".$inst->fir_size."sized ".$inst->fir_wrap."Wraps</td></tr>";
	echo "<tr><td></td><td>Second coil: ".$inst->sec_size." sized ".$inst->sec_wrap."Wraps</td></tr>";
	echo "<tr><td>Body material: </td><td>".$inst->material."</td></tr>";
	echo "<tr><td>Magnet size: </td><td>".$inst->magnet."</td></tr>";
	echo "<tr><td>Springs: </td><td>".$inst->springs."</td></tr>";
	echo "<tr><td>Thumb screw: </td><td>".$inst->thumb_screw."</td></tr>";
	echo "<tr><td>Capacitor rating: </td><td>".$inst->capacitor."</td></tr>";
	echo "<tr><td>Contact point material: </td><td>".$inst->contact."</td></tr>";
	echo "<tr><td>Saddle material: </td><td>".$inst->saddle."</td></tr>";
	echo "</table></td>";
	echo "</tr></table>";	
	}
}else{echo "nethir got";}

?>

<a href="admin/adlog.html" class="cc">Docs Irons copyright 2019</a>
</body>
</html>