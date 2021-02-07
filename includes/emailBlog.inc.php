<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$blogTitle = $_POST["blogTitle"];
$blogText = $_POST["blogText"];
$blogId = $_POST["blogId"];
$filePath = $_POST["filePath"];

//get class object
$subscribedEmails = new SubscribedEmails\SubscribedEmails();

//save email
$response = $subscribedEmails->emailBlog($blogTitle, $blogText, $blogId, $filePath);

//send back to jQuery
echo json_encode($response);
