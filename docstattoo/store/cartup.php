<?php 
session_start();
$addproduct_ID = fetch($_POST['product_ID']);
$addprice = fetch($_POST['price']);
$addquantity = fetch($_POST['quantity']);

if ($addquantity<1){
	$addquantity = 1;
}else{}


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

echo $addproduct_ID;
echo $addprice;
echo $addquantity;
echo $prodlength;
echo $quanlength;

$products[] = $addproduct_ID;
$quantity[] = $addquantity;
$count = $count + $addquantity;
$tp = $tp + ($addprice*$addquantity);

print_r($products);
print_r($quantity);

$_SESSION['products'] = $products;
$_SESSION['quantity'] = $quantity;
$_SESSION['count'] = $count;
$_SESSION['tp'] = $tp;

header("Location: home.php");

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