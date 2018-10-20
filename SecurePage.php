<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//September 20, 2018
//This is my own work.

include_once 'Header.php';

if(isset($_SESSION['principal']) == FALSE || $_SESSION['principal'] == null || $_SESSION['principal']== FALSE) { 
    header("Location: showLoginAndRegistration.html"); 
}