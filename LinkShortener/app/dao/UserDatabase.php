<?php

//require_once '../models/User.php';
require_once 'C:/xampp/htdocs/LinkShortener/app/models/User.php'; //include full link so that UserDatabaseTest.php file can find model class


//using an array as a substitute fora database. 
//ideally, we should use a database instead because it allows us to store information permanently

class UserDatabase{ 
    
    private static $storeUsers = [];
    private static $obj;
    
    
    private function __construct(){  //singleton class, allows us to create object of class only once
        
        $admin = new User();
        $admin->setUsername("admin");
        $admin->setPassword("admin123");
        $admin->setGender("male");
        $admin->setEmail("admin@gmail.com");
        
        $defaultUser = new User();
        $defaultUser->setUsername("weeliat");
        $defaultUser->setPassword("abc123");
        $defaultUser->setGender("male");
        $defaultUser->setEmail("weeliat@gmail.com");
        
        array_push(UserDatabase::$storeUsers, $admin, $defaultUser);
        
        //echo "Constructor invoked. ";
    }
    
   
    public static function getInstance() {
        
        if (!isset(UserDatabase::$obj)) {
            UserDatabase::$obj = new UserDatabase();
        }
        
        return UserDatabase::$obj;
    }
    
    
    public static function addUser(&$user){
        
        array_push(UserDatabase::$storeUsers, $user);
    
        echo "addUser() method successful.";
        
        print_r(UserDatabase::$storeUsers);
        //print_r(array_values(UserDatabase::$storeUsers));
        
    }
    
    
    public static function checkValidUser($username, $password){
        
        for($x=0; $x<count(UserDatabase::$storeUsers); $x++) { //loop through entire storeUsers array
            
            if(UserDatabase::$storeUsers[$x]->getUsername() === $username && UserDatabase::$storeUsers[$x]->getPassword() === $password)
                return true;
        }      
        
        return false; 
    }
    
    
    public static function deleteUser($username){
        
        for($x=0; $x<count(UserDatabase::$storeUsers); $x++){
            
            if(UserDatabase::$storeUsers[$x]->getUsername() === $username)
                unset(UserDatabase::$storeUsers[UserDatabase::$storeUsers[$x]]);
        }
        
        echo "deleteUser() method successful.";
    }
    
    
    public static function validateInput($data) {
        
        $data = trim($data); //remove extra spaces from input
        $data = stripslashes($data); //Remove backslashes (\) from input
        $data = htmlspecialchars($data); //convert special characters to html entities to prevent hackers from hacking
        
        return $data;
    }
    
    
}