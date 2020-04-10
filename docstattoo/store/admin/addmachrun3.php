<?php
session_start();
require_once 'connection.php';
include 'style.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$product_ID = fetch($_POST['product_ID']);
echo "product_ID: ";
echo emptycheck($product_ID);
echo "<br>";
$machine_ID = fetch($_POST['machine_ID']);
echo "machine: ";
echo emptycheck($machine_ID);
echo "<br>";
$contact = fetch($_POST['contact']);
echo "contact point: ";
echo emptycheck($contact);
echo "<br>";
$saddle = fetch($_POST['saddle']);
echo "saddle matrial: ";
echo emptycheck($saddle);
echo "<br>";
$magnet = fetch($_POST['magnet']);
echo "magnet size: ";
echo emptycheck($magnet);
echo "<br>";
$capacitor = fetch($_POST['capacitor']);
echo "capacitor: ";
echo emptycheck($capacitor);
echo "<br>";
$material = fetch($_POST['material']);
echo "material: ";
echo emptycheck($material);
echo "<br>";
$thumb = fetch($_POST['thumbscrew']);
echo "cthumb screw: ";
echo emptycheck($thumb);
echo "<br>";
$springs = fetch($_POST['springs']);
echo "springs: ";
echo emptycheck($springs);
echo "<br>";
$colour_ID = fetch($_POST['colour_ID']);
echo "new colour: ";
echo emptycheck($colour_ID);
echo "<br>";
$style_ID = fetch($_POST['styles']);
echo "style ID: ";
echo emptycheck($style_ID);
echo "<br>";
$colour1 = fetch($_POST['colour1']);
echo "colour1: ";
echo emptycheck($colour1);
echo "<br>";
$colour2 = fetch($_POST['colour2']);
echo "colour2: ";
echo emptycheck($colour2);
echo "<br>";
$price = fetch($_POST['price']);
echo "price: ";
echo emptycheck($price);
echo "<br>";
$stock = fetch($_POST['stock']);
echo "amount of stock: ";
echo emptycheck($stock);
echo "<br>";

$name = null;
$shape = null;
$type = null;
$coil_ID = null;


$sql = "INSERT INTO colours (`colour_ID`, `colour1`, `colour2`) VALUES (".$colour_ID.", '".$colour1."', '".$colour2."');";
$sql2 = "INSERT INTO machine (`machine_ID`, `contact`, `saddle`, `magnet`, `capacitor`, `material`, `thumb_screw`, `springs`, `colour_ID`, `style_ID`) 
VALUES (".$machine_ID.", '".$contact."', '".$saddle."', '".$magnet."', '".$capacitor."', '".$material."', '".$thumb."', '".$springs."', ".$colour_ID.", ".$style_ID.")";
$sql3 = "INSERT INTO `product` (`product_ID`, `price`, `stock`, `machine_ID`, `apparel_ID`, `legacy`) VALUES (".$product_ID.", '".$price."', '".$stock."', ".$machine_ID.", NULL, '0')";
echo "SQL 1:".$sql;
echo "<br>";
echo "SQL1: ".$sql2;
echo "<br>";
echo "SQL2: ".$sql3;

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();

global $PDO;
	$statement = $pdo->prepare($sql2);
	$statement->execute();
	
global $PDO;
	$statement = $pdo->prepare($sql3);
	$statement->execute();
header("Location: adland.php");


function emptycheck($var){
	if ($var == "empty" || $var == null)
	{
		echo "not set";
		header("Location: addmach.php");
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