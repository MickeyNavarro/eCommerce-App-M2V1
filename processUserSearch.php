<?php

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save search form data
$us = $_POST['userSearch'];

//check if search form data is valid
if ($us == NULL || trim($us)== "") {
    exit ("Username is a required field");
}

//use the UserBusinessService class to authenticate the credentials (LOGIN)
$service1 = new UserBusinessService();
$users = $service1->findByFirstNameWithAddress($us);
 
if($users) {
    include('_displayUserSearchResults.php');
}
else{
    echo "No results were found!"; 
}
?>