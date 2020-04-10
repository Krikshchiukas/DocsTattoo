<?php

session_start();
require_once 'connection.php';
include 'apparel.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$sql = "SELECT *
FROM product, apparel, colours
Where apparel.apparel_ID = product.apparel_ID
AND apparel.colour_ID = colours.colour_ID
ORDER BY product.legacy,product.product_ID";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Apparel");

?>

<html> 
<head>
	<title> docs irons admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
<h1>
Here is all the apparel on your store
</h1>

<table>
<tr>
<th>Product ID</th>
<th>Name</th>
<th>Colours</th>
<th>shape</th>
<th>Size</th>
<th>Price</th>
<th>Amount in Stock</th>
<th>Concurrency</th>

</tr>

<?php

if ($results != null){
	$row_open = "<tr>";
	$row_close = "</tr>";
	$data_open = "<td>";
	$data_close = "</td>";
	$form_open = "<form action = \"appedit.php\" method = \"POST\">";
	$submit = "<input type=\"submit\" value=\"edit machine\">";
	$form_close = "</form>";
	$break = "<br>";
	
	foreach ($results as $inst)
	{
	echo $row_open = "<tr>";
	echo $form_open = "<form action = \"appedit.php\" method = \"POST\">";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">$inst->product_ID";
	echo "<input type=\"hidden\" name=\"apparel_ID\" value=".$inst->apparel_ID.">$inst->apparel_ID";
	echo "<input type=\"hidden\" name=\"colour_ID\" value=".$inst->colour_ID.">$inst->colour_ID";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"name\" value=".$inst->name.">$inst->name";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"colour1\" value=".$inst->colour1.">$inst->colour1";
	$break = "<br>";
	echo "<input type=\"hidden\" name=\"colour2\" value=".$inst->colour2.">$inst->colour2";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"shape\" value=".$inst->shape.">$inst->shape";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"size\" value=".$inst->size.">$inst->size";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"price\" value=".$inst->price.">$inst->price";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"stock\" value=".$inst->stock.">$inst->stock";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"legacy\" value=".$inst->legacy.">";
	$temp = $inst->legacy;
	if($temp == 0)
	{
		echo"current data";
	}
	else
	{
		echo "archived data";
	}
	echo $data_close = "</td>";
	
	echo $data_open = "<td>";
	echo $submit = "<input type=\"submit\" value=\"edit apparel\">";
	echo $form_close = "</form>";
	echo $data_close = "</td>";
	
	}
	}
	else{
		echo"no products can be found";
	}
	?>

</table>
</body>
</html>