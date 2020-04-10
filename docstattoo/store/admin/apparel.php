<?php

class Apparel {

private $product_ID;
private $price;
private $apparel_ID;
private $legacy;
private $name;
private $shape;
private $size;
private $colour_ID;
private $colour1;
private $colour2;
private $stock;

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