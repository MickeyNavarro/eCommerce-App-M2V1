<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//September 20, 2018 
//This is my own work.

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save login form data 
$username = $_POST['username']; 
$password = $_POST['password']; 

//check if login form data is valid 
if ($username == NULL || trim($username)== "") {
    exit ("Username is a required field"); 
}
if ($password == NULL || trim($password)== "") {
    exit("Password is a required field");
}

//use the SecurityService class to authenticate the credentials (LOGIN)
$service1 = new SecurityService($username, $password); 
$loginSuccess = $service1->login(); 
if($loginSuccess) {
    $_SESSION['principal'] = true;
    return true;
}   
else{
    $_SESSION['principal'] = false;
    return false;
}
?>
