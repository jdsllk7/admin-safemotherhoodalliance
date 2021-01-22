<?php
//load all classes
include 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$email = $_POST["email"];
$password = $_POST["password"];

//get class object
$adminLogin = new AdminLogin\AdminLogin();

//save email
$response = $adminLogin->isAdmin($email, $password);

//send back to jQuery
echo json_encode($response);
