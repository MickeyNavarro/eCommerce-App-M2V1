<?php
require_once '../../Autoloader.php';

class ProductDataService { 
    
    // returns an array of products found by name
    function findByProductName($n){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE FROM PRODUCTS WHERE PRODUCT_NAME LIKE ?");
        
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
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
    
    // returns an array of products found by keyword in description
    function findByKeywordInDescripton($n){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE FROM PRODUCTS WHERE DESCRIPTION LIKE ?");
        
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
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
    
    // returns an array of products found by price range
    function findByPriceRange($min, $max){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE FROM PRODUCTS WHERE PRICE BETWEEN ? AND ?");
           
        //bind, execute, and get results
        $stmt->bind_param("ss", $min, $max);
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
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
}