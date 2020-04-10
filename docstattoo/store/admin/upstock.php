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
$stock = fetch($_POST['stock']);
$stock = stockcheck($stock);


if ($stock >0){
	$sql = "UPDATE product
	Set stock = ".$stock.", legacy = 0 
	Where product_ID =".$product_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
}
else{
	$sql = "UPDATE product
	Set stock = ".$stock.", legacy = 1 
	Where product_ID =".$product_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
}

redirect();

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
function stockcheck($stock){

if ($stock == "empty")
{
	$stock = 0;
}
else{
	if ($stock < 0)
{
	$stock = 0;
}
else{
	if (is_numeric($stock))
{}
else
{
header("Location: allmach.php");
}
}
}
return $stock;
}


function redirect(){
	header("Location: adland.php");
}
?>