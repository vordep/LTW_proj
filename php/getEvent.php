<?php
include_once("connectdb.php");

try{
    $stmt = $db->prepare('SELECT * FROM Event WHERE idEvent = ?');
    
    $stmt->execute(array($idEvent));
    
    $stmt = $db->prepare('SELECT type FROM type WHERE idType = ?');
    
    $stmt->execute(array($event['idType']));
    
    
    $event['type'] = $stmt ->fetch()['type'];
    
    $user =$db->prepare('SELECT username FROM user WHERE idUser = ?');
    $user->execute (array($event['idUser']));
    
} catch(PDOException $e){
    echo $e->getMessage();
}