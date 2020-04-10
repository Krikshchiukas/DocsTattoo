<?php
class Cart {

private $order_ID;
private $product_ID;
private $quantity;

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
}
?>