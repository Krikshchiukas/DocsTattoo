<?php
class Coils{

private $coil_ID;
private $fir_wrap;
private $fir_size;
private $sec_wrap;
private $sec_size;

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