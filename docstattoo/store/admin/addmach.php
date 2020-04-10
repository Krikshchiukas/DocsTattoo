<?php
session_start();

require_once 'connection.php';
include 'machine.php';
include 'colour.php';
include 'product.php';
include 'style.php';
include 'coils.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$newmachine_ID = "not set";
$sql = "SELECT MAX(machine_ID + 1)AS machine_ID
FROM machine";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Machine");

	if ($results != null){
		foreach ($results as $inst)
	{
		$newmachine_ID = $inst->machine_ID;
	}
	}
	else {$newmachine_ID = "not got";}

$newproduct_ID = "not set";
$sql = "SELECT MAX(product_ID + 1)AS product_ID
FROM product";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Product");

	if ($results != null){
		foreach ($results as $inst)
	{
		$newproduct_ID = $inst->product_ID;
	}
	}
	else {$newproduct_ID = "not got";}	
	
$newcolour_ID = "not set";
$sql = "SELECT MAX(colour_ID + 1)AS colour_ID
FROM colours";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Colour");

	if ($results != null){
		foreach ($results as $inst)
	{
		$newcolour_ID = $inst->colour_ID;
	}
	}
	else {$newcolour_ID = "not got";}		
	
$newstyle_ID = "not set";
$sql = "SELECT MAX(style_ID + 1)AS style_ID
FROM styles";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Style");

	if ($results != null){
		foreach ($results as $inst)
	{
		$newstyle_ID = $inst->style_ID;
	}
	}
	else {$newstyle_ID = "not got";}
	
$sql = "SELECT *
FROM colours";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$colours = $statement->fetchAll(PDO::FETCH_CLASS,"Colour");
$sql = "SELECT *
FROM styles";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$styles = $statement->fetchAll(PDO::FETCH_CLASS,"Style");
$sql = "SELECT *
FROM coils";
global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$coils = $statement->fetchAll(PDO::FETCH_CLASS,"Coils");	
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
Add new a machine
</h1>
<br>

add new machine with a currently used style and colour scheme
<br>
<form action="addmachrun.php" method = POST>
<table>
<tr><td>contact point</td><td><input type="text" name="contact" value=""></td></tr>
<tr><td>saddle materail</td><td><input type="text" name="saddle" value=""></td></tr>
<tr><td>magnet size</td><td><input type="text" name="magnet" value=""></td></tr>
<tr><td>capacitor value</td><td><input type="text" name="capacitor" value=""></td></tr>
<tr><td>body material</td><td><input type="text" name="material" value=""></td></tr>
<tr><td>thumb screw</td><td><input type="text" name="thumbscrew" value=""></td></tr>
<tr><td>spring size</td><td><input type="text" name="springs" value=""></td></tr>
<tr><td>select a exsisting style</td>
<td><select name="styles">
  <?php
	if ($styles != null){
		foreach ($styles as $inst)
	{
	$sql = "SELECT *
	FROM coils
	WHERE coil_ID = ".$inst->coil_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$stylecoil = $statement->fetchAll(PDO::FETCH_CLASS,"Coils");
	if ($styles != null){
		foreach ($stylecoil as $stycol)
	{
		$output2 = "coil 1: ".$stycol->fir_size." ".$stycol->fir_wrap."wraps coil 2: ".$stycol->sec_size." ".$stylcol->sec_wrap."wraps";
	}
	}else {$output2 = "cant fetch coils";}
	
	$output = $inst->style_name." the type is: ".$inst->type." ".$inst->shape." with ".$output2;
	echo "<option value=\"".$inst->style_ID."\">".$output."</option>";
	}
	}
	else {echo "styles lost";}
  ?>
  </select></td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
 
<tr><td>select a exsisting colour scheme</td>
<td><select name="colours">
  <?php
	if ($colours != null){
		foreach ($colours as $inst)
	{
	$output = $inst->colour1." & ".$inst->colour2;
	echo "<option value=\"".$inst->colour_ID."\">".$output."</option>";
	}
	}
	else {echo "colours lost";}
  ?>
  </select></td></tr>
<input type = "hidden" name = "machine_ID" value = "<?php echo $newmachine_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<tr><td><input type="submit" value="add machine"></td></tr>
</table>
</form>
<br>
<br>


add new machine with new style
<br>
<br>
<form action="addmachrun2.php" method = POST>
<table>
<tr><td>contact point</td><td><input type="text" name="contact" value=""></td></tr>
<tr><td>saddle materail</td><td><input type="text" name="saddle" value=""></td></tr>
<tr><td>magnet size</td><td><input type="text" name="magnet" value=""></td></tr>
<tr><td>capacitor value</td><td><input type="text" name="capacitor" value=""></td></tr>
<tr><td>body material</td><td><input type="text" name="material" value=""></td></tr>
<tr><td>thumb screw</td><td><input type="text" name="thumbscrew" value=""></td></tr>
<tr><td>spring size</td><td><input type="text" name="springs" value=""></td></tr>
<tr><td>style name</td><td><input type="text" name="name" value=""></td></tr>
<tr><td>shape</td><td><input type="text" name="shape" value=""></td></tr>
<tr><td>type</td><td><input type="text" name="type" value=""></td></tr>
<tr><td>select a coil set up</td>
<td><select name="coils">
  <?php
	if ($coils != null){
		foreach ($coils as $inst)
	{
	$output = $inst->fir_wrap."".$inst->fir_size." & ".$inst->fir_wrap."".$inst->fir_size;
	echo "<option value=\"".$inst->coil_ID."\">".$output."</option>";
	}
	}
	else {echo "coils lost";}
  ?>
  </select>
</td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
<tr><td>select a exsisting colour scheme</td>
<td><select name="colours">
  <?php
	if ($colours != null){
		foreach ($colours as $inst)
	{
	$output = $inst->colour1." & ".$inst->colour2;
	echo "<option value=\"".$inst->colour_ID."\">".$output."</option>";
	}
	}
	else {echo "colours lost";}
  ?>
  </select></td></tr>
<input type = "hidden" name = "machine_ID" value = "<?php echo $newmachine_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<input type = "hidden" name = "style_ID" value = "<?php echo $newstyle_ID?>">
<tr><td><input type="submit" value="add machine"></td></tr>
</table>
</form>
<br>
<br>

add new machine with a new colour scheme
<br>
<form action="addmachrun3.php" method = POST>
<table>
<tr><td>contact point</td><td><input type="text" name="contact" value=""></td></tr>
<tr><td>saddle materail</td><td><input type="text" name="saddle" value=""></td></tr>
<tr><td>magnet size</td><td><input type="text" name="magnet" value=""></td></tr>
<tr><td>capacitor value</td><td><input type="text" name="capacitor" value=""></td></tr>
<tr><td>body material</td><td><input type="text" name="material" value=""></td></tr>
<tr><td>thumb screw</td><td><input type="text" name="thumbscrew" value=""></td></tr>
<tr><td>spring size</td><td><input type="text" name="springs" value=""></td></tr>
<tr><td>select a exsisting style</td>
<td><select name="styles">
  <?php
	if ($styles != null){
		foreach ($styles as $inst)
	{
	$sql = "SELECT *
	FROM coils
	WHERE coil_ID = ".$inst->coil_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$stylecoil = $statement->fetchAll(PDO::FETCH_CLASS,"Coils");
	if ($styles != null){
		foreach ($stylecoil as $stycol)
	{
		$output2 = "coil 1: ".$stycol->fir_size." ".$stycol->fir_wrap."wraps coil 2: ".$stycol->sec_size." ".$stylcol->sec_wrap."wraps";
	}
	}else {$output2 = "cant fetch coils";}
	
	$output = $inst->style_name." the type is: ".$inst->type." ".$inst->shape." with ".$output2;
	echo "<option value=\"".$inst->style_ID."\">".$output."</option>";
	}
	}
	else {echo "styles lost";}
  ?>
  </select></td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
<tr><td>first colour</td> <td><input type="text" name="colour1" value=""></td></tr>
<tr><td>second colour</td> <td><input type="text" name="colour2" value=""></td></tr>

<input type = "hidden" name = "machine_ID" value = "<?php echo $newmachine_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<input type = "hidden" name = "colour_ID" value = "<?php echo $newcolour_ID?>">
<tr><td><input type="submit" value="add machine"></td></tr>
</table>
</form>
<br>
<br>

add new machine with a style and new colour scheme
<br>
<form action="addmachrun4.php" method = POST>
<table>
<tr><td>contact point</td><td><input type="text" name="contact" value=""></td></tr>
<tr><td>saddle materail</td><td><input type="text" name="saddle" value=""></td></tr>
<tr><td>magnet size</td><td><input type="text" name="magnet" value=""></td></tr>
<tr><td>capacitor value</td><td><input type="text" name="capacitor" value=""></td></tr>
<tr><td>body material</td><td><input type="text" name="material" value=""></td></tr>
<tr><td>thumb screw</td><td><input type="text" name="thumbscrew" value=""></td></tr>
<tr><td>spring size</td><td><input type="text" name="springs" value=""></td></tr>
<tr><td>style name</td><td><input type="text" name="name" value=""></td></tr>
<tr><td>shape</td><td><input type="text" name="shape" value=""></td></tr>
<tr><td>type</td><td><input type="text" name="type" value=""></td></tr>
<tr><td>select a coil set up</td>
<td><select name="coils">
  <?php
	if ($coils != null){
		foreach ($coils as $inst)
	{
	$output = $inst->fir_wrap."".$inst->fir_size." & ".$inst->fir_wrap."".$inst->fir_size;
	echo "<option value=\"".$inst->coil_ID."\">".$output."</option>";
	}
	}
	else {echo "coils lost";}
  ?>
  </select>
</td></tr>
<tr><td>price:</td><td><input type="text" name="price" value=""></td></tr>
<tr><td>amount of stock:</td><td><input type="text" name="stock" value=""></td></tr>
<tr><td>first colour</td> <td><input type="text" name="colour1" value=""></td></tr>
<tr><td>second colour</td> <td><input type="text" name="colour2" value=""></td></tr>

<input type = "hidden" name = "machine_ID" value = "<?php echo $newmachine_ID?>">
<input type = "hidden" name = "product_ID" value = "<?php echo $newproduct_ID?>">
<input type = "hidden" name = "colour_ID" value = "<?php echo $newcolour_ID?>">
<input type = "hidden" name = "style_ID" value = "<?php echo $newstyle_ID?>">
<tr><td><input type="submit" value="add machine"></td></tr>
</table>
</form>
</body>
</html>
