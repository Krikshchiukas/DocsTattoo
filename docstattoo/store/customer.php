<?php

class Customer {

private $customer_ID;


function __get($varible) {
return $this->$varible;
}
function __set($varible,$value) {
$this->$varible = $value;
}
function __construct() { 

	}
	
function __destruct() {
      
    }
}

?>