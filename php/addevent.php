<?php
include_once'connectdb.php';
try{
    if(!isset($_POST)){
        die();
    }
    $isPublic=$_POST['isPublic'] != '' | 0;
    $idType = $_POST["inputType"];
    $date=$_POST["date"];
    if($_FILES["event-pic"]["name"] != ''){
        $image = uniqid() . "-" . $_FILES["poll-pic"]["name"];
		move_uploaded_file($_FILES["poll-pic"]["tmp_name"], UPLOADS_PATH . "/$image");
	} else $image = '';
    
    $title = $_POST["title"];
    $text = $_POST["description"];
    $stmt = $db->prepare('INSERT INTO Event (idUser,isPublic,title,image,eventDate,description,idType) VALUES(?,?,?,?,?,?,?)');
    $stmt->execute(array($_SESSION['idUser'],$isPublic,$title,$image,$date,$text,$idType));
}
catch(PDOException $e) {
	echo $e->getMessage();
}
header("location : index.php?page=myevents");
exit();
?>