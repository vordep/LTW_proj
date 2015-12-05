<?php
include_once("config.php");
include_once("connectdb.php");

try{
    
    $search =  isset($_POST['inputSearch']) ? $_POST['inputSearch'] : '';
    
    $stmt=$db->prepare('SELECT * FROM Event WHERE(lower(title) like ? OR idUser =(SELECT idUser FROM User WHERE lower(username) like ?)) AND isPublic = 1 ORDER BY idEvent DESC');
    $stmt->execute(array("%".strtolower($search)."%","%".strtolower($search)."%"));
    
    $events = $stmt->fetchALL();
    foreach($events as &$searchresult){
        $temp =$db->prepare('SELECT username FROM User WHERE idUser = ? ');
        $temp->execute(array($searchresult['idUser']));
        
        $user = $temp->fetch();
        $searchresult['author'] = $user['username'];
    }
}catch(PDOException $e) {
	echo $e->getMessage();
}
exit();
?>

