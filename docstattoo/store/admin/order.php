<?php
class Order {

private $order_ID;
private $placed;
private $customer_ID;
private $posted;
private $total;
private $first_name;
private $last_name;
private $email;
private $address_1;
private $address_2;
private $region;
private $postcode;

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