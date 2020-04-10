<?php
session_start();
require_once 'connection.php';

if ($_SESSION['verify'] == true)
{
}
else
{
header("Location: adlog.html");
}

$order_ID = fetch($_POST['order_ID']);
echo $order_ID;


	$sql = "Update orders
	SET posted = 1
	Where order_ID = ".$order_ID."";
	echo $sql;
	global $PDO;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	header("Location: postord.php");

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
