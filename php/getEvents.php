<?php
include_once("connectdb.php");

$events = array();
try{
    
    //get events
    $stmt = $db->prepare('SELECT * FROM Event WHERE isPublic = 1 ORDER BY idEvent DESC');
    $stmt->execute();
    
    $allEvents = $stmt->fetchAll();
    foreach($allEvents as &$event){
        
        $idEvent = $event ['idEvent'];
        $stmt = $db->prepare('SELECT * FROM Event WHERE idEvent = ?');
     
        $stmt->execute(array($idEvent));
    
        $stmt = $db->prepare('SELECT category FROM category WHERE idCategory = ?');
    
        $stmt->execute(array($event['idCategory']));
    
    
        $event['category'] = $stmt ->fetch()['category'];
    
        $user =$db->prepare('SELECT username FROM user WHERE idUser = ?');
        $user->execute (array($event['idUser']));
        
        array_push($events,$event);
    }
} catch(PDOException $e){
    echo $e->getMessage();
}
