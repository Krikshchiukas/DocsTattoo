<?php

session_start();

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$product_ID = fetch($_POST['product_ID']);
$price = fetch($_POST['price']);
$apparel_ID = fetch($_POST['apparel_ID']);
$legacy = fetch($_POST['legacy']);
$name = fetch($_POST['name']);
$shape = fetch($_POST['shape']);
$size = fetch($_POST['size']);
$colour_ID = fetch($_POST['colour_ID']);
$colour1 = fetch($_POST['colour1']);
$colour2 = fetch($_POST['colour2']);
$stock = fetch($_POST['stock']);


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

<!doctype html>
<html> 
<head>
	<title> docs irons admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
<h1>
Select what you want to edit on the piece of apparel
</h1>
<div>
Update stock <br>
<form action = upstock.php method = POST>
<input type = "hidden" name = "product_ID" value = "<?php echo $product_ID?>">
<input type = "text" name = "stock" value = "<?php echo $stock?>">
<input type = submit value = update product>
</form><br>

Update price<br>
<form action = upprice.php method = POST>
<input type = "hidden" name = "product_ID" value = "<?php echo $product_ID?>">
<input type = "hidden" name = "stock" value = "<?php echo $stock?>">
<input type = "hidden" name = "machine_ID" value = "null">
<input type = "hidden" name = "apparel_ID" value = "<?php echo $apparel_ID?>">
<input type = "text" name = "price" value = "<?php echo $price?>">
<input type = submit value = update product>
</form><br>



</div>
</body>
</html>