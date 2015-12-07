<?php
	try {
	    //remove session variables
	    session_unset();
	    //destroy session
	    session_destroy();
	} catch (PDOException $e) {
	  die($e->getMessage());
	}
	
	header("Location: index.php");
	exit();
?>