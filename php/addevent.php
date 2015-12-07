<?php
include_once'connectdb.php';
try{
    if(!isset($_POST)){
        die();
    }
     
    if(!isset($_POST['isPublic'])){
        $_POST['isPublic']=1;
    }
    if($_POST['isPublic']==1 || $_POST['isPublic']==''){
        $isPublic=1;
    }
    else{
        $isPublic=0;
    }
    $idType = $_POST["inputType"];
    $date=$_POST["date"];
    if(!isset($_FILES["eventimage"]["name"]))
    {
        $image = '';
    }
    if($_FILES['eventimage']["name"] != ''){
        $image = uniqid() . "-" . $_FILES["event-image"]["name"];
		move_uploaded_file($_FILES["event-image"]["tmp_name"], UPLOADS_PATH . "/$image");
	}
    
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