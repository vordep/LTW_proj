<?php
include_once("connectdb.php");

try{
    $stmt = $db->prepare('SELECT * FROM Event WHERE idEvent = ?');
    
    $stmt->execute(array($idEvent));
    
    $stmt = $db->prepare('SELECT category FROM category WHERE idCategory = ?');
    
    $stmt->execute(array($event['idCategory']));
    
    
    $event['category'] = $stmt ->fetch()['category'];
    
    $user =$db->prepare('SELECT username FROM user WHERE idUser = ?');
    $user->execute (array($event['idUser']));
    
} catch(PDOException $e){
    echo $e->getMessage();
}