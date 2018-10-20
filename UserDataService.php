<?php
require_once '../../Autoloader.php';
require_once '../../Header.php';

class UserDataService { 
    
    // returns an array of persons found by first name 
    function findByFirstName($n){ 
        //creates a new instance of the database
        $db = new Database(); 
        
        //connects to the database
        $connection = $db->getConnection(); 
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, FIRSTNAME, LASTNAME, USERNAME FROM USERS WHERE FIRSTNAME LIKE ?"); 
        
        //make sure to modify the set parameter so that it will find the value in any position
        $like_n = "%".$n."%"; 
        
        //bind, execute, and get results
        $stmt->bind_param("s", $like_n); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 
                
        //checks if result didn't work 
        if (!$result) { 
            echo "assume the SQL statement has an error";
            return null; 
            exit; 
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) { 
            return null;
        }
        else { 
            $user_array = array(); 
            while ($user = $result->fetch_assoc()){ 
                
                array_push($user_array, $user);  
                
            }

            return $user_array; 
        }
    }

    // returns an array of persons found by last name 
    function findByLastName($n) { 
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, FIRSTNAME, LASTNAME, USERNAME FROM USERS WHERE LASTNAME LIKE ?");
        
        //make sure to modify the set parameter so that it will find the value in any position
        $like_n = "%".$n."%"; 
        
        //bind, execute, and get results
        $stmt->bind_param("s", $like_n); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        
        //checks if the result didn't work
        if (!$result) {
            //echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else { 
            $user_array = array();
            while ($user = $result->fetch_assoc()){ 
                array_push($user_array, $user);
        }
        //return the results
        return $user_array; 
        }
    }
    
    // returns an array of persons found by id 
    function findByID($id) { 
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();

        //create prepared statments 
        $stmt = $connection->prepare("SELECT ID, FIRSTNAME, LASTNAME, USERNAME FROM USERS WHERE ID = ?  LIMIT 1"); 
         
        //bind, execute, and get results 
        $stmt->bind_param("s", $id);
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        
        //checks if the result didn't work
        if (!$result) {
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $user_array = array();
            while ($user = $result->fetch_assoc()){
                array_push($user_array, $user);         
            }
        }
            //return the results
            return $user_array; 
    }
    
    //$id is the number to delete; returns a true(success) or false(failure)
    function deleteItemByID($id) { 
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statments
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = ? LIMIT 1");
        
        //bind and execute
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        //checks if the result didn't work
        if ($stmt->affected_rows > 0){
            return true;
        }
        else { 
            return false; 
        }
    }

    // updates info about a person; returns a true (suqccess) or false(failure)
    function updateOne($id, $user){ 
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("UPDATE USERS SET FIRSTNAME = ?, LASTNAME = ?, USERNAME = ?, PASSWORD = ?, ROLE = ? WHERE ID = ?");
        $fn = $user->getFirst_name(); 
        $ln = $user->getLast_name();
        $age = $user->getAge(); 
        
        $stmt->bind_param("ssii", $fn, $ln, $user, $pass, $role, $id);
        $stmt->execute(); 
        
        //checks if the result didn't work
        if ($stmt->affected_rows > 0) {
            return true;
        }
        else { 
            return false; 
        }

    }

    // returns an array of persons with their addressses found by first name 
    function findByFirstNameWithAddress($n) {
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT USERS.ID, FIRSTNAME, LASTNAME, USERNAME, ADDRESS, CITY, STATE, ZIP_CODE, IS_DEFAULT FROM USERS JOIN ADDRESSES ON USERS.ID = ADDRESSES.USERS_ID WHERE FIRSTNAME LIKE ?");
        
        //make sure to modify the set parameter so that it will find the value in any position
        $like_n = "%".$n."%";
        
        //bind, execute, and get results
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if results didn't work
        if (!$result) {
            echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) { 
            return null;
        }
        else {
            $user_array = array();
            while ($user = $result->fetch_assoc()){
                array_push($user_array, $user);
            }
            return $user_array;
        }
    }
}