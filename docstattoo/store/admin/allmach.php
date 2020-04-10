<?php

session_start();
require_once 'connection.php';
include 'machine.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$sql = "select *
From product, machine, colours, styles, coils
where product.machine_ID = machine.machine_ID
and machine.colour_ID = colours.colour_ID
and machine.style_ID = styles.style_ID
and styles.coil_ID = coils.coil_ID
ORDER BY product.legacy,product.product_ID";

global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_CLASS,"Machine");

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
Here are all the machines on your store
</h1>

<table>
<tr>
<th>Product ID</th>
<th>Machine</th>
<th>Colours</th>
<th>Coils</th>
<th>Materials</th>
<th>Springs and Magnet size</th>
<th>Capacitor</th>
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
	$form_open = "<form action = \"machedit.php\" method = \"POST\">";
	$submit = "<input type=\"submit\" value=\"edit machine\">";
	$form_close = "</form>";
	$break = "<br>";
	$wrapBR = " Wraps ";
	
	foreach ($results as $inst)
	{
	echo $row_open = "<tr>";
	echo $form_open = "<form action = \"machedit.php\" method = \"POST\">";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"product_ID\" value=".$inst->product_ID.">$inst->product_ID";
	echo "<input type=\"hidden\" name=\"machine_ID\" value=".$inst->machine_ID."> $inst->machine_ID";
	echo "<input type=\"hidden\" name=\"colour_ID\" value=".$inst->colour_ID.">$inst->colour_ID";
	echo "<input type=\"hidden\" name=\"style_ID\" value=".$inst->style_ID.">$inst->style_ID";
	echo "<input type=\"hidden\" name=\"coil_ID\" value=".$inst->coil_ID.">$inst->coil_ID";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"style_name\" value=".$inst->style_name.">$inst->style_name";
	echo $break = "<br>";
	echo "<input type=\"hidden\" name=\"shape\" value=".$inst->shape.">$inst->shape";
	echo $break = "<br>";
	echo "<input type=\"hidden\" name=\"type\" value=".$inst->type.">$inst->type";
	echo $break = "<br>";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"colour1\" value=".$inst->colour1.">$inst->colour1";
	echo $break = "<br>";
	echo "<input type=\"hidden\" name=\"colour2\" value=".$inst->colour2.">$inst->colour2";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"fir_wrap\" value=".$inst->fir_wrap.">$inst->fir_wrap";
	echo $wrapBR = " Wraps ";
	echo "<input type=\"hidden\" name=\"fir_size\" value=".$inst->fir_size.">$inst->fir_size";
	echo $break = "<br>";
	echo "<input type=\"hidden\" name=\"sec_wrap\" value=".$inst->sec_wrap.">$inst->sec_wrap";
	echo $wrapBR = " Wraps ";
	echo "<input type=\"hidden\" name=\"sec_size\" value=".$inst->sec_size.">$inst->sec_size";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "saddle matrial = ";
	echo "<input type=\"hidden\" name=\"saddle\" value=".$inst->saddle.">$inst->saddle";
	echo "<br>";
	echo "thumb screw = ";
	echo "<input type=\"hidden\" name=\"thumb_screw\" value=".$inst->thumb_screw.">$inst->thumb_screw";
	echo "<br>";
	echo "body matrials = ";
	echo "<input type=\"hidden\" name=\"material\" value=".$inst->material.">$inst->material";
	echo "<br>";
	echo "contact point matrial = ";
	echo "<input type=\"hidden\" name=\"contact\" value=".$inst->contact.">$inst->contact";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"springs\" value=".$inst->springs.">$inst->springs";
	echo "<br>";
	echo "<input type=\"hidden\" name=\"magnet\" value=".$inst->magnet.">$inst->magnet";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"capacitor\" value=".$inst->capacitor.">$inst->capacitor";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"price\" value=".$inst->price.">$inst->price";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo "<input type=\"hidden\" name=\"stock\" value=".$inst->stock.">$inst->stock";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	
	$temp = $inst->legacy;
	if($temp == 0)
	{
		echo"current data";
	}
	else
	{
		echo "archived data";
	}
	echo "<input type=\"hidden\" name=\"legacy\" value=".$inst->legacy.">";
	echo $data_close = "</td>";
	echo $data_open = "<td>";
	echo $submit = "<input type=\"submit\" value=\"edit machine\">";
	echo $form_close = "</form>";
	echo $data_close = "</td>";
	echo $row_close = "</tr>";
	}
	}
	else{
		echo"no products can be found";
	}
	
	?>

</table>

</body>
</html>