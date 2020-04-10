<?php

session_start();

$verify = false;
$dcode = "doc";
$dpword = "tattoo";
$check1 = false;
$check2 = false;
$cross;


$cross = fetch($_POST['dcode']);
$check1 = crosscheck($cross, $dcode);
$cross = fetch($_POST['dpword']);
$check2 = crosscheck($cross, $dpword);
$verify = verify($check1, $check2);

if ($verify == true)
{
	echo "continue";
	$_SESSION['verify'] =$verify;
	echo $_SESSION['verify'];
	header("Location: adland.php");
}
else{
	echo "try again";
	$_SESSION['verify'] =$verify;
	echo $_SESSION['verify'];
	header("Location: adlog.html");
}



function verify ($check1, $check2){
	if ($check1 == true && $check2 == true)
{
	echo "sucess";
	return true;
}
else if ($check1 == false && $check2 == true)
{
	echo "code wrong";
	return false;
}
else if ($check1 == true && $check2 == false)
{
	echo "password wrong";
	return false;
}
else
{
echo "both wrong";	
return false;
}
}

function crosscheck ($temp, $comp)
{
	if ($temp == $comp)
	{
		$check = true;
		return $check;
	}
	else
	{
		$check = false;
		return $check;
	}
}

function fetch($post){
if (!empty($_POST))
{
$temp = htmlentities($post);

if (!isset($temp)){
	echo"second code is never entered<br>";
	return "empty";
}
else{
	
if (empty($temp)){
		echo"code is still empty<br>";
		return "empty";
		if (!$temp){
			echo"failed to fill";
			return "empty";
		}
		else{echo "unsuccessfull login";}
	}
	else{return $temp;}
	
}
}
}

?>