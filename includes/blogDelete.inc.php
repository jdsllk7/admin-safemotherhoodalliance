<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$blogId = $_POST["blogId"];

//get class object
$blog = new Blog\Blog();

//save email
$response = $blog->deleteBlog($blogId);

//send back to jQuery
echo json_encode($response);
