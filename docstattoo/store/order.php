<?php

class Order{

private $order_ID;


function __construct() { 

	}
	
function __destruct() {
      
    }	


function __get($varible) {
return $this->$varible;
}
function __set($varible,$value) {
$this->$varible = $value;
}
function getlegacy(){
	if ($this->$legacy == 1)
	{
		return "archived data";
	}
	else if ($this->$legacy == 0)
	{
		return "current data";
	}
	else{
		return "archived data";
	}
}

}

?>