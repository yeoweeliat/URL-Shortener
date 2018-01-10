<?php

include '../views/login.php';

echo "Successfully logged out. ";


if($_GET['logout'] != null){
    
    session_start();
    
    session_destroy();
    
    echo "Session destroyed.";
    
}