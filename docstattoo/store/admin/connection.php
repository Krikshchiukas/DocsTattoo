<?php
$servername = "kunet.kingston.ac.uk";
$username = "k1626571";
$password = "Lukegould1";
$dbname = "db_k1626571";

	
try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	//print "succ";
}

catch(PDOException $e)
{
	print "CONNECTION DROPPED". $e->getMessage() . "";
	die();
}
?>