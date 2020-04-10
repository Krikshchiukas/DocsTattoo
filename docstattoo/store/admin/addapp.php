<?php

session_start();
require_once 'connection.php';
include 'apparel.php';
include 'colour.php';
include 'product.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$newapparel_ID = "not set";
$sql = "SELECT MAX(apparel_ID + 1)AS apparel_ID
FROM apparel";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Apparel");

	if ($results != null){
		foreach ($results as $inst)
	{
		$newapparel_ID = $inst->apparel_ID;
	}
	}
	else {$newapparel_ID = "not got";}

$newproduct_ID = "not set";
$sql2 = "SELECT MAX(product_ID + 1)AS product_ID
FROM product";

global $PDO;
	$statement = $pdo->prepare($sql2);
	$statement->execute();
	$prods = $statement->fetchAll(PDO::FETCH_CLASS,"Product");

	if ($prods != null){
		foreach ($prods as $prod)
	{
		$newproduct_ID = $prod->product_ID;
	}
	}
	else {$newproduct_ID = "not got";}	
	
$newcolour_ID = "not set";
$sql3 = "SELECT MAX(colour_ID + 1)AS colour_ID
FROM colours";

global $PDO;
	$statement = $pdo->prepare($sql3);
	$statement->execute();
	$colours = $statement->fetchAll(PDO::FETCH_CLASS,"colour");

	if ($colours != null){
		foreach ($colours as $col)
	{
		$newcolour_ID = $col->colour_ID;
	}
	}
	else {$newcolour_ID = "not got";}
$sql = "SELECT *
FROM colours";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Colour");	
?>

<!DOCTYPE html>
<html>
<head>
	<title> docs irons admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

<h1>add a new piece of apparel</h1>
<br>

add a piece with exsisting colours<br>
<table>
<form action="addapprun.php" method = POST>
<tr><td>name:</td><td><input type="text" name="name" value=""></td></tr>
<tr><td>shape:</td><td><input type="text" name="shape" value=""></td></tr>
<tr><td>size:</td><td><input type="text" name="size" value=""></td></tr>
<tr><td>colours:</td><td><select name="colours">
  <?php
	if ($results != null){
		foreach ($results as $inst)
	{
	$output = $inst->colour1." & ".$inst->colour2;
	echo "<option value=\"".$inst->colour_ID."\">".$output."</option>";
	}
	}
	else {echo "colours lost";}
  ?>
  </select></td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
<input type = "hidden" name = "apparel_ID" value = "<?php echo $newapparel_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<tr><td><input type="submit" value="add apparel"></td></tr>
</form>
</table>



<br>

add a piece with new colours<br>
<table>
<form action="addapprun2.php" method = POST>
<tr><td>name:</td><td><input type="text" name="name" value=""></td></tr>
<tr><td>shape:</td><td><input type="text" name="shape" value=""></td></tr>
<tr><td>size:</td><td><input type="text" name="size" value=""></td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
<tr><td>first colour:</td><td><input type="text" name="colour1" value=""></td></tr>
<tr><td>second colour:</td><td><input type="text" name="colour2" value=""></td></tr>
<input type = "hidden" name = "apparel_ID" value = "<?php echo $newapparel_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<input type = "hidden" name = "colour_ID" value = "<?php echo $newcolour_ID?>">
<tr><td><input type="submit" value="add apparel"></td></tr>
</form>
</table>


</body>
</html>