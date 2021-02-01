<?php
//load all classes
include_once 'class-autoLoader.inc.php';

//init array
$response = array();

//get class object
$blog = new Blog\Blog();

//save email
$response = $blog->getHTMLBlogs();

//send back to jQuery
echo json_encode($response);
