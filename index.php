<?php
require_once './classes/Enquiry.php';

$enquiry = new Enquiry();
$enquiry = $enquiry->findById(1);
$enquiry->delete();
//$enquiry->setLastName("kunwar");
//$enquiry->save();
//print_r($enquiry);
//die;
//$enquiry->setEmail('testing@gmail.com');
//$enquiry->setFirstName("Nikunj");
//$enquiry->setLastName("ghimire");
//$enquiry->setMessage("this is a message");
//$enquiry->save();