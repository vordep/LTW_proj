<?php
require_once 'config.php';
//if(isset($_POST))
$action = $_GET['action'] != '' ? $_GET['action'] : '';

switch($action){
    case 'signUp':{
    include 'php/signUp.php';
    break;
}
    case'signIn':{
        include'php/signIn.php';
        break;
    }
        
        
    default:{
        break;
    }
    
}