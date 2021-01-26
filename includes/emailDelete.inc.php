<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$emailId = $_POST["emailId"];

//get class object
$subscribedEmails = new SubscribedEmails\SubscribedEmails();

//save email
$response = $subscribedEmails->deleteEmail($emailId);

//send back to jQuery
echo json_encode($response);
