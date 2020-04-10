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
	
	
$email = fetch($_POST['email']);
$password = fetch($_POST['password']);
echo $email."<br>";
echo $password."<br>";
emptycheck($email);
emptycheck($password);


$customer_ID = "not set";
$sql = "Select customer_ID From customer
Where email = '".$email."'
And password = '".$password."'";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Customer");
	
if ($results != null){
		foreach ($results as $inst)
	{
		$customer_ID = $inst->customer_ID;
	}
	}
	else {$customer_ID = "not got";}	
echo $customer_ID;

$_SESSION['customer_ID'] = $customer_ID;
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