<?php

class User { 
    //attributes
    private $user_id; 
    private $firstname;
    private $lastname;
    private $username;
    private $password; 
    private $role; 
    
    function __construct($user_id, $firstname, $lastname, $username, $password, $role) { 
        $this->user_id = $user_id; 
        $this->firstname = $firstname; 
        $this->lastname = $lastname; 
        $this->username = $username; 
        $this->password = $password; 
        $this->role = $role; 
    }
    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    //method to allow the user to login
    function login() {
        //MILESTONE 1 NOTES
        
        //db connector
        require_once 'processDatabaseConnector.php';
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error . "<br>");
            
        }
        echo "Connected successfully<br>";
        
        //sql statment where name = attempted name & ps = attempted pw
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM `USERS` WHERE `USERNAME` = '$user' AND `PASSWORD` = '$pass' LIMIT 1";
        
        //check the database for the username and password
        $result = mysqli_query($conn, $sql);
        
        //checks if a username or password was left blank
        if ($user === "" || $pass === "") {
            echo "Username and/or password is a required field!<br>";
        }
        //checks if the username and password is both correct
        else if (mysqli_num_rows($result) == 1) {
            //if result comes back then return true (logged in)
            echo "<br>Welcome " . $user . "!<br>";
        }
        //if no result, then return false
        else {
            echo "<br> Invalid username and/or password <br>";
        }
        
        //destroy the connection between the PHP code and the database
        mysqli_close($conn);
    }
    
    //method to allow the user to create an account
    function register() {
        //db connector
        require_once 'processDatabaseConnector.php';
        
        //check the connection to database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error . "<br>");
        }
        echo "Connected successfully<br>";
        
        //get data from form
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO `USERS` (`ID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`) VALUES (NULL, '$username', '$password', '$firstname', '$lastname');";
        
        $result = mysqli_query($conn, $sql);
        
        //checks if data was inserted into form
        if ($result) {
            return true;
        }
        else {
            return false;
        }
        //destroy connection between php and database
        mysqli_close($conn);
        
    }
}
