<?php
class Style{

private $style_ID;
private $style_name;
private $shape;
private $type;
private $coil_ID;

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