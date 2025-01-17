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
    
        $stmt = $db->prepare('SELECT type FROM type WHERE idType = ?');
    
        $stmt->execute(array($event['idType']));
    
    
        $event['type'] = $stmt ->fetch()['type'];
    
        $user1 =$db->prepare('SELECT username FROM user WHERE idUser = ?');
        $user1->execute (array($event['idUser']));
        $user = $user1->fetch();
        $event['author'] = $user['username'];
        array_push($events,$event);
    }
} catch(PDOException $e){
    echo $e->getMessage();
}
