<?php
require_once '../../Autoloader.php';

class UserBusinessService
{
    function findByFirstName($n){ 
        $users = Array(); 
        
        $dbservice = new UserDataService(); 
        $users = $dbservice->findByFirstName($n); 

        return $users; 
    }
    function findByLastName($n){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByLastName($n);
        
        return $users;
    }
    function findByID($id){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByID($id);
        
        return $users;
    }
    function findByAge($age){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByAge($age);
        
        return $users;
    }
    function deleteItemByID($id){        
        $dbservice = new UserDataService();
        $users = $dbservice->deleteItemByID($id);
    }
    function updateOne($id, $user){
        $dbservice = new UserDataService();
        $users = $dbservice->updateOne($id, $user);
    }
    function findByFirstNameWithAddress($n){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByFirstNameWithAddress($n);
        
        return $users;
    }
}

