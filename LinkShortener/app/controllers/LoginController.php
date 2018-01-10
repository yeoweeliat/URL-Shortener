<?php

require_once '../dao/UserDatabase.php';


$option = $_POST['option'];

UserDatabase::getInstance(); //create object, invoke constructor to create default username and password


switch($option){

    
    case "login":
        
        $username = UserDatabase::validateInput($_POST['user']);
        $password = UserDatabase::validateInput($_POST['pass']);
        
        //new UserDatabase(); //create object to invoke constructor
      
        if (UserDatabase::checkValidUser($username, $password)){
            header('Location: ../views/shorten.php?user=' . $username);
        }
        else{
            include '../views/login.php';
            echo "Invalid username or password.";
        }
        
        break;
    
    
    case "register":

        require_once '../models/User.php';
            
        $u = new User();
        $u->setUsername(UserDatabase::validateInput($_POST['user']));
        $u->setPassword(UserDatabase::validateInput($_POST['pass']));
        $u->setGender(UserDatabase::validateInput($_POST['gender']));
        $u->setEmail(UserDatabase::validateInput($_POST['email']));
        
        //new UserDatabase(); //create object to invoke constructor
        
        UserDatabase::addUser($u);
        
        include '../views/login.php';
        
        echo "Register successful. (But you won't be able to log in with that user and pass because PHP by itself is stateless (has no memory). Every time a get/post request finishes, the php script dies and even static variables will lose their stored values. To be able to log in with our new user and pass, we should store our user details in a database rather than in an array.)";
        
        break;
    
    
    default:

}


?>