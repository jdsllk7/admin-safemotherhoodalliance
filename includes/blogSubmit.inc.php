<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get form input
$blogTitle = $_POST["blogTitle"];
$blogText = $_POST["blogText"];
$blogId = $_POST["blogId"];
$action = $_POST["action"];

//get class object
$blog = new Blog\Blog();

//save email
$response = $blog->saveBlog($_FILES, $blogTitle, $blogText, $blogId, $action);

//send back to jQuery
echo json_encode($response);
