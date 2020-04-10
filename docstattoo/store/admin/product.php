<?php
class Product{

private $product_ID;
private $machine_ID;
private $apparel_ID;

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