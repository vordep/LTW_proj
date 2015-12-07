<?php
include_once("connectdb.php");

$events = array();

try{
    $stmt=$db->prepare('SELECT * FROM Event WHERE idUser=? ORDER BY idEvent DESC');
    $stmt->execute(array($_SESSION['idUser']));
    
    $allevents=$stmt->fetchAll();
    foreach($allevents as &$event){
        $idEvent = $event['idEvent'];
        include ("getEvent.php");
        
        array_push($events,$event);
        
    }
}catch(PDOException $e) {
	echo $e->getMessage();
}
?>