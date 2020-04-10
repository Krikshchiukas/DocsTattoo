<?php

class Machine {

private $product_ID;
private $price;
private $machine_ID;
private $legacy;
private $contact;
private $saddle;
private $magnet;
private $capacitor;
private $material;
private $thumb_screw;
private $springs;
private $colour_ID;
private $colour1;
private $colour2;
private $style_ID;
private $style_name;
private $shape;
private $type;
private $fir_wrap;
private $fir_size;
private $sec_wrap;
private $sec_size;
private $coil_ID;
private $stock;


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