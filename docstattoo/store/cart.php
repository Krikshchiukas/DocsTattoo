<?php
session_start();
require_once 'connection.php';
include 'machine.php';
include 'apparel.php';
include 'prod.php';

$products = array("");
$quantity = array("");
$prodlength = count($products);
$quanlength = count($quantity);

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
<td class = "menu"><a href="home.php" class = "menulink">Homepage</a></td>
<td class = "menu"><a href="products.php" class = "menulink">All products</a></td>
<td class = "menu"><a href="allmach.php" class = "menulink">Machines</a></td>
<td class = "menu"><a href="allapp.php" class = "menulink">Apparel</a></td>
<td class = "menu"><a href="about.php" class = "menulink">About Docs Irons</a></td>
<td class = "menu"><a href="contact.php" class = "menulink">Contact and FAQ</a></td>
<td class = "menu"><a href="/k1626571/docstattoo/home.html" class = "menulink">Docs Tattoo Studio</a></td>

</tr>
</table>
<br>
<h1>Your cart</h1><br>
<br>
Proceed to <a href="checkout.php" class = "menulink">Check out</a>

<?php
$len=count($products);
for ($i=0;$i<$len;$i++){
$product_ID = $products[$i];

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
	
	if ($machine != null){

	foreach ($machine as $inst)
	{
	$imagecode = $inst->product_ID.$inst->machine_ID.$inst->colour_ID.$inst->style_ID.$inst->coil_ID."ma.png";
	$tp = $inst->price * $quantity[$i];
	
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=\k1626571/docstattoo/images/".$imagecode." alt=".$imagecode."class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\"><table>";
	echo "<tr><td>Product name:".$inst->style_name."</td><td>".$inst->type."</td></tr>";
	echo "<tr><td>£".$inst->price."</td><td>Current quantity: ".$quantity[$i]."</td><td>Total price: £".$tp."</td></tr>";
	
	echo "<tr><td>Colours:</td><td>".$inst->colour1." & ".$inst->colour2."</td></tr>";
	echo "<tr><td>Body shape:</td><td>".$inst->shape."</td></tr>";
	echo"<tr><form action = \"cartquan.php\" method = \"POST\">
	<td><input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"><input type=\"hidden\" name=\"index\" value=".$i."><input type=\"hidden\" name=\"price\" value=".$inst->price."></td>
	<td class = \"concell\"><input type=\"submit\" class = \"menulink\"value=\"change quantity\"></td>
	</form></tr>";
	echo"<tr><form action = \"cartdel.php\" method = \"POST\">
	<td class = \"concell\"><input type=\"hidden\" name=\"index\" value=".$i.">
	<input type=\"hidden\" name=\"quantity\" value=".$quantity[$i].">
	<input type=\"hidden\" name=\"price\" value=".$tp."></td><td>
	<input type=\"submit\" class = \"menulink\"value=\"remove from cart\"></td>
	</form></tr>";
	echo "</table></td>";
	echo "</tr></table>";	
	}
}else{echo "nethir got";}

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
	
	if($apparel != null){
	foreach ($apparel as $inst)
	{
	$imagecode = $inst->product_ID.$inst->apparel_ID.$inst->colour_ID."ap.png";
	$tp = $inst->price * $quantity[$i];
	
	echo "<table class = \"content\"><tr><td class = \"concell\">";
	echo"<img src=images/".$imagecode." alt=".$imagecode."class = \"conpic\">";
	echo "</td>";
	echo "<td class = \"concell\"><table>";
	echo "<tr><td>Product name:".$inst->name."</td></tr>";
	echo "<tr><td>£".$inst->price."</td><td>Current quantity: ".$quantity[$i]."</td><td>Total price: £".$tp."</td></tr>";
	echo "<tr><td>Colours:</td><td>".$inst->colour1." & ".$inst->colour2."</td></tr>";
	echo "<tr><td>Shape:</td><td>".$inst->shape."</td></tr>";
	echo "<tr><td>Size:</td><td>".$inst->size."</td></tr>";
	echo"<tr><form action = \"cartquan.php\" method = \"POST\">
	<td><input type=\"number\" name=\"quantity\" min=\"1\" max=\"9\"><input type=\"hidden\" name=\"index\" value=".$i."><input type=\"hidden\" name=\"price\" value=".$inst->price."></td>
	<td class = \"concell\"><input type=\"submit\" class = \"menulink\"value=\"change quantity\"></td>
	</form></tr>";
	echo"<tr><form action = \"cartdel.php\" method = \"POST\">
	<td class = \"concell\"><input type=\"hidden\" name=\"index\" value=".$i.">
	<input type=\"hidden\" name=\"quantity\" value=".$quantity[$i].">
	<input type=\"hidden\" name=\"price\" value=".$tp."></td><td>
	<input type=\"submit\" class = \"menulink\"value=\"remove from cart\"></td>
	</form></tr>";
	echo "</table></td>";
	echo "</tr></table>";	
	}
	}else{echo "napparel not got";}
	
}
else{
	//header("Location: home.php");
	echo "cant retrive";
	}
	}
}else{echo "product cant be found";}


}
?>
<br>
Proceed to <a href="checkout.php" class = "menulink">Check out</a>
<br>
</div>
</body>
</html>