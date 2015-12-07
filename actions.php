<?php
require_once 'config.php';

$action = $_GET['action'] != '' ? $_GET['action'] : '';

switch($action){
    case 'signUp':
        include 'php/signUp.php';
        break;
    
    case'signIn':
        include'php/signIn.php';
        break;
    case'signOut':
        include'php/signOut.php';
        break;
    case'addevent':
        include 'php/addevent.php';
        break;
    case'editpassword':
<<<<<<< HEAD
        include 'php/editPassword.php';
        break;
    case 'search':
        include'php/search.php';
        break;
    
    default:
        break;
    
=======
        include 'php/editPassword';
        break;
    
    default:
        break;
    
>>>>>>> origin/master
    
}
?>