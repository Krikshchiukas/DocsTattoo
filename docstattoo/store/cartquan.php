<?php 
session_start();

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

$countchange = fetch($_POST['quantity']);
$pricechange = fetch($_POST['price']);

$item = fetch($_POST['index']);
if ($item == "empty"||$item == null){
	$item = 0;
}
$countchange = fetch($_POST['quantity']);
if ($countchange == "empty"||$countchange == null){
	$countchange = 1;
}

echo $item."<br>";
echo $countchange."<br>";
echo $pricechange."<br>";
print_r($quantity);
echo "<br>";
echo $count."<br>";
	$count = $count - $quantity[$item];	
	$count = $count + $countchange;
	echo $count."<br>";
	echo $tp."<br>";
	$tp = $tp - ($quantity[$item]*$pricechange);
	$tp = $tp + ($countchange*$pricechange);
	echo $tp."<br>";
	$quantity[$item] = $countchange;
	print_r($quantity);
	echo "<br>";


$_SESSION['quantity'] = $quantity;
$_SESSION['count'] = $count;
$_SESSION['tp'] = $tp;
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