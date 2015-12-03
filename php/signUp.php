/*
Sign up
*/


<?php
include_once("connect.php");
try{
    $username = $_POST["inputUserName"];
    $password =$_POST["inputPassword"];
    $confirm_password = $_POST["inputConfirmPassword"];
    //check if the passwords are the same
    if($password !==$confirm_password ){
        $_SESSION['responseContent']='Password are not the same';
        header("Location : index.php?page=signUp.php");
        exit;
    }
     echo "here2";
    //check if the username exists
    $stmt = $db->prepare(
        'SELECT * FROM User 
        WHERE username = ?');
    $stmt->execute(array($username));
    if($stmt->fetch()){
          $_SESSION['responseContent']='Username already exists';
        header("Location : index.php?page=signUp.php");
        exit;
    }

    //insert user into the database
    $stmt = $db->prepare('INSERT INTO User(username, password, registerDate) VALUES (?,?,?)');
    $stmt->execute(array($username,hash('sha256',$password),date('Y-m-d H:i:s')));
        
    // log in the user that was just inserted
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ? ');
    $stmt->execute (array($username, hash('sha256',$password)));
    
    //check if user is in database
    
    if(!($user = $stmt->fetch())) {
        $_SESSION['responseContent'] = 'Invalid username or password';
        header("Location : index.php?page=signIn");
        exit;
    }
    echo "here 4 ";
    //set _Session
    $_SESSION['idUser'] = $user['idUser'];
	$_SESSION['username'] = $username;

}
catch(PDOException $e){
    echo "here 222";
    echo $e->getMessage();
    $_SESSION['responseContent']='Could not update database';
    header("Location : index.php?page=signUp");
    exit;
}
header("Location index.php?page=events");
exit;
?>