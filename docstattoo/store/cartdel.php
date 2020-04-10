<?php 
session_start();

$products = array("");
$count = null;
$tp = null;
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

$index = fetch($_POST['index']);
if ($index == "empty"||$index == null){
	$index = 0;
}

$countduct = fetch($_POST['quantity']);
$priceduct = fetch($_POST['price']);

echo "remove number: ".$index."<br>";
echo "take off count: ".$countduct."<br>";
echo "price deduction: ".$priceduct."<br>";

$newcount = $count-$countduct;
$newtp = $tp-$priceduct;

echo "new session count: ".$newcount."<br>";
echo "new session price: ".$newtp."<br>";

echo "old product array";
print_r($products);
echo "<br>";
echo "old quantity array";
print_r($quantity);
echo "<br>";

unset($products[$index]);
unset($quantity[$index]);
//array splice no good

echo "old product array";
print_r($products);
echo "<br>";
echo "old quantity array";
print_r($quantity);
echo "<br>";

$newproducts = array_values($products);
$newquantity = array_values($quantity);
echo "new product array";
print_r($newproducts);
echo "<br>";
echo "new quantity array";
print_r($newquantity);
echo "<br>";


$_SESSION['products'] = $newproducts;
$_SESSION['quantity'] = $newquantity;
$_SESSION['count']=$newcount;
$_SESSION['tp']=$newtp;
header("Location: cart.php");

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