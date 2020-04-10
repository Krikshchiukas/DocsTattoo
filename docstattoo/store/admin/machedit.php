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
$machine_ID = fetch($_POST['machine_ID']);
$colour_ID = fetch($_POST['colour_ID']);
$style_ID = fetch($_POST['style_ID']);
$coil_ID = fetch($_POST['coil_ID']);
$style_name = fetch($_POST['style_name']);
$shape = fetch($_POST['shape']);
$type = fetch($_POST['type']);
$colour1 = fetch($_POST['colour1']);
$colour2 = fetch($_POST['colour2']);
$fir_wrap = fetch($_POST['fir_wrap']);
$fir_size = fetch($_POST['fir_size']);
$sec_wrap = fetch($_POST['sec_wrap']);
$sec_size = fetch($_POST['sec_size']);
$saddle = fetch($_POST['saddle']);
$thumb_screw = fetch($_POST['thumb_screw']);
$material = fetch($_POST['material']);
$contact = fetch($_POST['contact']);
$springs = fetch($_POST['springs']);
$magnet = fetch($_POST['magnet']);
$capacitor = fetch($_POST['capacitor']);
$price = fetch($_POST['price']);
$legacy = fetch($_POST['legacy']);
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
Select what you want to edit on the machine
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
<input type = "hidden" name = "machine_ID" value = "<?php echo $machine_ID?>">
<input type = "hidden" name = "appareal_ID" value = "null">
<input type = "text" name = "price" value = "<?php echo $price?>">
<input type = submit value = update product>
</form><br>



</div>
</body>
</html>