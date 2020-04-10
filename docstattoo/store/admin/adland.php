<?php

session_start();

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
Welcome back Doc.
</h1>



Select what you want to do.
<br> <br>
<button onclick="window.location.href='postord.php'">view all new orders</button>
<br>
<button onclick="window.location.href='allmach.php'">view all machines</button>
<br>
<button onclick="window.location.href='allapp.php'">view all apparel</button>
<br>
<button onclick="window.location.href='allord.php'">view all orders</button>
<br>
<button onclick="window.location.href='addapp.php'">add a new piece of apparel</button>
<br>
<button onclick="window.location.href='addmach.php'">add a new machine</button>
<br>
<br>
<a href="https://kunet.kingston.ac.uk/webconfig/phpMyAdmin/">DBMS</a>
<br>
<a href="/k1626571/docstattoo/store/home.php">back to the store</a>
<br>
<a href="/k1626571/docstattoo/home.html">back to the the studio</a>
</body>
</html>