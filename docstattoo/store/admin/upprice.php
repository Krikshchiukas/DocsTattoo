<?php
session_start();
require_once 'connection.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$product_ID = fetch($_POST['product_ID']);
$price = fetch($_POST['price']);
$stock = fetch($_POST['stock']);
$machine_ID = fetch($_POST['machine_ID']);
$apparel_ID = fetch($_POST['apparel_ID']);



echo $product_ID;
echo $price;
$price = pricecheck($price);
echo $price;
echo $stock;
echo $machine_ID;
echo $apparel_ID;

if($stock == "empty"){
	$stock = 0;
}else{}

	$sql = "UPDATE product
	SET price = ".$price.", legacy = 1, stock = 0
	Where product_ID = ".$product_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();


if($apparel_ID == "null"){
	$sql = "INSERT INTO product (price, stock, machine_ID, legacy)
	Values (".$price.",".$stock.",".$machine_ID.", 0)";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	header("Location: allmach.php");
}
else if ($machine_ID == "null"){
	$sql = "INSERT INTO product (price, stock, apparel_ID, legacy)
	Values (".$price.",".$stock.",".$apparel_ID.", 0)";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	header("Location: allapp.php");	
}
else{
	//header("Location: adland.php");
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
function pricecheck($price){

if ($price == "empty")
{
	$price = 0;
}
else{
	if ($price < 0)
{
	$price = 0;
}
else{
	if (is_numeric($price))
{}
else
{
header("Location: allmach.php");
}
}
}
return $price;
}
?>
