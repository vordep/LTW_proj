<?php
include_once("connectdb.php");

try{
    $stmt = $db->prepare('SELECT * FROM Event WHERE idEvent = ?');
    
    $stmt->execute(array($idEvent));
    $event=$stmt->fetch();
    $stmt = $db->prepare('SELECT type FROM type WHERE idType = ?');
    
    $stmt->execute(array($event['idType']));
    
    
    $event['type'] = $stmt ->fetch()['type'];
    
    $user1 =$db->prepare('SELECT username FROM user WHERE idUser = ?');
    $user1->execute (array($event['idUser']));
    $user = $user1->fetch();
    $event['author']=$user['username'];
    
} catch(PDOException $e){
    echo $e->getMessage();
}