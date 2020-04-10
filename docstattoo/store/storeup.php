<?php
session_start();
require_once 'connection.php';
include 'order.php';
include 'prod.php';

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
	
echo $customer_ID;
echo "<br>";
print_r($products);
echo "<br>";
print_r($quantity);
echo "<br>";

$neworder_ID = null;

$sql = "SELECT MAX(order_ID + 1)AS order_ID
FROM orders";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Order");

	if ($results != null){
		foreach ($results as $inst)
	{
		$neworder_ID = $inst->order_ID;
	}
	}
	else {$neworder_ID = "not got";}	
echo $neworder_ID."<br>";

$sql="INSERT INTO orders (`order_ID`, `placed`, `total`, `customer_ID`, `posted`) VALUES (".$neworder_ID.", CURRENT_TIMESTAMP, ".$tp.", ".$customer_ID.", '0');";
echo $sql."<br>";


global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();

$len=count($products);
for ($i=0;$i<$len;$i++){
$product_ID = $products[$i];
$quan = $quantity[$i];
echo $product_ID.":".$quan."<br>";
$sql = "Select product_ID,stock From product Where product_ID = ".$product_ID."";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Prod");
if ($results != null){
		foreach ($results as $inst)
	{
		$product_ID = $inst->product_ID;
		$stock = $inst->stock;
	}
	}
	else {$product_ID = "not recognised";}	
echo $product_ID." old stock: ".$stock." subtract: ".$quan."<br>";
$newstock = $stock-$quan;
echo $newstock."new stock <br>";

$sql = "UPDATE product SET stock = ".$newstock." WHERE product_ID = ".$product_ID."";
echo $sql."<br>";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	
$sql = "INSERT INTO cart (`order_ID`, `product_ID`, `quantity`) VALUES (".$neworder_ID.", ".$product_ID.", ".$quan.");";	
echo $sql."car insert<br>";	
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
}
$_SESSION['products'] = null;
$_SESSION['count'] = null;
$_SESSION['tp'] = null;
$_SESSION['quantity'] = null;
$_SESSION['customer_ID'] = null;

header("Location: home.php");

function emptycheck($var){
	
	if ($var == "empty" || $var == null){
		echo $var."back loop<br>";
		header("Location: checkout.php");
	}
	else{}
}
	
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