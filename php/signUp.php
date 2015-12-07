<?php
include_once("connectdb.php");
try{
    $username = $_POST["inputUserName"];
    $password =$_POST["inputPassword"];
    $confirm_password = $_POST["inputConfirmPassword"];
    //check if the passwords are the same
    if($password !==$confirm_password ){
        $_SESSION['responseContent']='Password are not the same';
        header("Location: index.php?page=signUp");
        exit;
    }
     
    //check if the username exists
    $stmt = $db->prepare(
        'SELECT * FROM User 
        WHERE username = ?');
    $stmt->execute(array($username));
    if($stmt->fetch()){
          $_SESSION['responseContent']='Username already exists';
        header("Location: index.php?page=signUp");
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
        header("Location: index.php?page=signIn");
        exit;
    }
 
    //set _Session
    $_SESSION['idUser'] = $user['idUser'];
	$_SESSION['username'] = $username;
    $data=date('Y-m-d H:i:s');
    $_SESSION['registerDate'] = $user['registerDate'];
    $_SESSION['lastLogin'] = $data;

}
catch(PDOException $e){
    echo "here 222";
    echo $e->getMessage();
    $_SESSION['responseContent']='Could not update database';
<<<<<<< HEAD
    header("Location: index.php?page=signUp");
    exit();
}
echo "here";
header ("Location: index.php?page=events");
=======
    header("Location : index.php?page=signUp");
    exit();
}
echo "here";
header ("Location:index.php?page=events");
>>>>>>> origin/master
exit();
?>