<?php
session_start();
require_once 'connection.php';
include 'customer.php';

$products = array("");
$count = null;
$tp = null;
$quantity = array("");

if (!isset($_SESSION['quantity'])){
	$_SESSION['quantity'] = array();
	//echo "quantity not grabbed";
	header("Location: home.php");
}
else{
	$products = $_SESSION['quantity'];
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

if(empty($products)) {
    echo "cart is empty";
	header("Location: home.php");
}else{}
	
$first_name = fetch($_POST['first_name']);
$last_name = fetch($_POST['last_name']);
$email = fetch($_POST['email']);
$address_1 = fetch($_POST['address_1']);
$address_2 = fetch($_POST['address_2']);
$region = fetch($_POST['region']);
$postcode = fetch($_POST['postcode']);
$password = fetch($_POST['password']);

emptycheck($first_name);
emptycheck($last_name);
emptycheck($email);
emptycheck($address_1);
emptycheck($address_2);
emptycheck($region);
emptycheck($postcode);
emptycheck($password);

echo $first_name."<br>";
echo $last_name."<br>";
echo $email."<br>";
echo $address_1."<br>";
echo $address_2."<br>";
echo $region."<br>";
echo $postcode."<br>";
echo $password."<br>";

$newcustomer_ID = "not set";
$sql = "SELECT MAX(customer_ID + 1)AS customer_ID
FROM customer";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Customer");
	
if ($results != null){
		foreach ($results as $inst)
	{
		$newcustomer_ID = $inst->customer_ID;
	}
	}
	else {$newcustomer_ID = "not got";}	
echo $newcustomer_ID;
	
$sql = "INSERT INTO customer (`customer_ID`, `first_name`, `last_name`, `email`, `address_1`, `address_2`, `region`, `postcode`, `password`) 
VALUES (".$newcustomer_ID.", '".$first_name."', '".$last_name."', '".$email."', '".$address_1."', '".$address_2."', '".$region."', '".$postcode."', '".$password."');";	
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute();

$_SESSION['customer_ID'] = $newcustomer_ID;
header("Location: checkoutrun.php");
	
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