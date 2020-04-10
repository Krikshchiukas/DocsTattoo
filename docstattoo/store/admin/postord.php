<?php
session_start();
require_once 'connection.php';
include 'order.php';
include 'cart.php';
include 'product.php';
include 'apparel.php';
include 'machine.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
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
Here are all the orders
</h1>

<table>
<tr>
<th>
Order ID
</th>
<th>
When the order was placed
</th>
<th>
Customer name
</th>
<th>
Email address
</th>
<th>
Postal address
</th>
<th>
Total
</th>
<th>
Order status
</th>
<th>
Products
</th>
</tr>

<?php
$tableopen = "<table>";
$tableclose = "</table>";
$rowopen = "<tr>";
$rowclose = "</tr>";
$dataopen = "<td>";
$dataclose = "</td>";
$break = "<br>";
$headopen = "<th>";
$headclose = "<th>";
$form_open = "<form action = \"upord.php\" method = \"POST\">";
$submit = "<input type=\"submit\" value=\"mark as posted\">";
$form_close = "</form>";

$sql = "SELECT *
From orders, customer
Where orders.customer_ID = customer.customer_ID
AND posted = 0
ORDER BY posted, placed";

global $PDO;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_CLASS,"Order");


if ($results != null){
	
	foreach ($results as $inst){

	echo $rowopen;
	echo $dataopen;
	echo $inst->order_ID;
	echo $inst->customer_ID;
	echo $form_open;
	echo "<input type=\"hidden\" name=\"order_ID\" value=".$inst->order_ID.">";;
	echo $submit;
	echo $form_close;
	echo $dataclose;
	echo $dataclose;
	echo $dataopen;
	echo $inst->placed;
	echo $dataopen;
	echo "first name: ";
	echo $inst->first_name;
	echo "<br>last name: ";
	echo $inst->last_name;
	echo $dataclose;
	echo $dataopen;
	echo $inst->email;
	echo $dataclose;
	echo $dataopen;
	echo $inst->address_1;
	echo $break;
	echo $inst->address_2;
	echo $break;
	echo $inst->region;
	echo $break;
	echo $inst->postcode;
	echo $dataclose;
	echo $dataopen;
	echo "total: £";
	echo $inst->total;
	echo $dataclose;
	echo $dataopen;

	$post = $inst->posted;
	if($post == 0)
	{
		echo"needs to be completed";
	}
	else
	{
		echo "order is completed";
	}	
	echo $dataclose;
	echo $dataopen;
	
	$sql2 = "SELECT *
	FROM cart
	where cart.order_ID = ".$inst->order_ID."";
	global $PDO;
	$statement = $pdo->prepare($sql2);
	$statement->execute();
	$carts = $statement->fetchAll(PDO::FETCH_CLASS,"Cart");
	
	echo $tableopen;
	
	if ($carts != null){
	foreach ($carts as $kart)
	{
	echo $dataopen;
	echo "quantity: ";
	echo $kart->quantity;
	echo $dataclose;

	
	$sql3 = "SELECT product_ID, machine_ID, apparel_ID
	FROM product
	Where product_ID = ".$kart->product_ID."
	ORDER BY machine_ID, apparel_ID";
	global $PDO;
	$statement = $pdo->prepare($sql3);
	$statement->execute();
	$prods = $statement->fetchAll(PDO::FETCH_CLASS,"Product");
	if ($prods != null){
	foreach ($prods as $product)
	{
	if($product->machine_ID == null){
	
		
		$sqlapp = "SELECT *
FROM product, apparel, colours
Where product.product_ID = ".$product->product_ID."
AND apparel.apparel_ID = product.apparel_ID
AND apparel.colour_ID = colours.colour_ID";

global $PDO;
	$statement = $pdo->prepare($sqlapp);
	$statement->execute();
	$apps = $statement->fetchAll(PDO::FETCH_CLASS,"Apparel");
		
	foreach ($apps as $app)
	{
	echo $rowopen;	
	echo $dataopen;
	echo $app->product_ID;
	echo $app->apparel_ID;
	echo $app->colour_ID;
	echo $dataclose;
	echo $dataopen;
	echo $app->name;
	echo $dataclose;
	echo $dataopen;
	echo "first colour: ";
	echo $app->colour1;
	echo $break;
	echo "second colour:";
	echo $app->colour2;
	echo $dataclose;
	echo $dataopen;
	echo "shape: ";
	echo $app->shape;
	echo $dataclose;
	echo $dataopen;
	echo "size";
	echo $app->size;
	echo $dataclose;
	echo $dataopen;
	echo "£";
	echo $app->price;
	echo $dataclose;
	echo $rowclose;
	
	
	}
	
	}
	else if($product->apparel_ID == null){
		
		$sqlmach = "select *
From product, machine, colours, styles, coils
where product.product_ID = ".$product->product_ID."
and product.machine_ID = machine.machine_ID
and machine.colour_ID = colours.colour_ID
and machine.style_ID = styles.style_ID
and styles.coil_ID = coils.coil_ID";

global $PDO;
	$statement = $pdo->prepare($sqlmach);
	$statement->execute();
	$machs = $statement->fetchAll(PDO::FETCH_CLASS,"Machine");
		
	if ($machs != null){
	
	foreach ($machs as $mach)
	{
	echo $rowopen;	
	echo $dataopen;
	
	echo $mach->product_ID;
	echo $mach->machine_ID;
	echo $mach->colour_ID;
	echo $mach->style_ID;
	echo $mach->coil_ID;
	echo $dataclose;
	echo $dataopen;
	echo $mach->style_name;
	echo $break;
	echo $mach->shape;
	echo $break;
	echo $mach->type;
	echo $dataclose;
	echo $dataopen;
	echo "first colour: ";
	echo $mach->colour1;
	echo $break;
	echo "second colour: ";
	echo $mach->colour2;
	echo $dataclose;
	echo $dataopen;
	echo "wraps: ";
	echo $mach->fir_wrap;
	echo ". size: ";
	echo $mach->fir_size;
	echo $break;
	echo "wraps: ";
	echo $mach->sec_wrap;
	echo ". size: ";
	echo $mach->sec_size;
	echo $dataclose;
	echo $dataopen;
	echo "saddle: ";
	echo $mach->saddle;
	echo $break;
	echo "thumb screw: ";
	echo $mach->thumb_screw;
	echo $break;
	echo "body material: ";
	echo $mach->material;
	echo $break;
	echo "contact point: ";
	echo $mach->contact;
	echo $dataclose;
	echo $dataopen;
	echo $mach->price;
	echo $dataclose;
	echo $rowclose;
	}
	}
	else{
		echo"no products can be found";
	}	
		
				
	}
	else{echo "theyre empty<br>";}
	echo "<br>";
	
	
	
	}
	}
	else {echo "cant find products<br>";}

	}
	}
	else {echo "cart lost<br>";}
	echo $tableclose;

	echo $dataclose;
	echo $rowclose;

	
	}
	}
else{echo "<tr><td>no orders</tr></td>";}
?>

</table>

</body>
</html>