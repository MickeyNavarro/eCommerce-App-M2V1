<?php
class Database{ 
    private $dbservername = "wvulqmhjj9tbtc1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbusername = "u8fndnr8j6kxeb6c";
    private $dbpassword = "vxb0s8tl2etx2rwe";
    private $dbname = "yqn7iwawbmw2sk4q";
    
    function getConnection() { 
        $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        
        if ($conn->connect_error) { 
            echo "Connection failed: " . $conn->connect_error . "<br>"; 
        }
        else { 
            return $conn; 
        }
    }
}
