<?php
include_once("connectdb.php");

try{
    $username= $_POST["inputUserName"];
    $password=$_POST["inputPassword"];
    //preparation
    echo "here 2 ";
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ? ');
    $stmt->execute (array($username, hash('sha256',$password)));
    
    //check if user is in database
    echo "here 2 ";
    if (!($user = $stmt->fetch())) {
		$_SESSION['responseContent'] = 'Invalid username or password.';
		header("Location: index.php?page=signIn");
		exit;
	}
    
    //set _Session
    $_SESSION['idUser'] = $user['idUser'];
	$_SESSION['username'] = $username;
	$_SESSION['image'] = $user['image'];
    
    $data=date('Y-m-d H:i:s');
    $_SESSION['registerDate'] = $user['registerDate'];
    $_SESSION['lastLogin'] = $data;
}
catch (PDOException $e) {
	die($e->getMessage());
    
}
header ("Location:index.php?page=events");
exit;
?>