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


$colour_ID = fetch($_POST['colours']);
echo "colour: ";
echo emptycheck($colour_ID);
echo "<br>";
$apparel_ID = fetch($_POST['apparel_ID']);
echo "apparel_ID: ";
echo emptycheck($apparel_ID);
echo "<br>";
$name = fetch($_POST['name']);
echo "name: ";
echo emptycheck($name);
echo "<br>";
$shape = fetch($_POST['shape']);
echo "shape: ";
echo emptycheck($shape);
echo "<br>";
$size = fetch($_POST['size']);
echo "size: ";
echo emptycheck($size);
echo "<br>";
$product_ID = fetch($_POST['product_ID']);
echo "product_ID: ";
echo emptycheck($product_ID);
echo "<br>";
$price = fetch($_POST['price']);
echo "price: ";
echo emptycheck($price);
echo "<br>";
$stock = fetch($_POST['stock']);
echo "stock: ";
echo emptycheck($stock);
echo "<br>";

$sql = "INSERT INTO apparel (`apparel_ID`, `name`, `shape`, `size`, `colour_ID`) VALUES ('".$apparel_ID."', '".$name."', '".$shape."', '".$size."', '".$colour_ID."')";
echo "first SQL: " .$sql."<br>";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
$sql2 = "INSERT INTO `product` (`product_ID`, `price`, `stock`, `machine_ID`, `apparel_ID`, `legacy`) VALUES ('".$product_ID."', '".$price."', '".$stock."', NULL, '".$apparel_ID."', '0');";
echo "second SQL: " .$sql2."<br>";
global $PDO;
	$statement = $pdo->prepare($sql2);
	$statement->execute();
	header("Location: adland.php");
	
	
	
function emptycheck($var){
	if ($var == "empty" || $var == null)
	{
		header("Location: addapp.php");
	}
	else{
		echo $var;
	}
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