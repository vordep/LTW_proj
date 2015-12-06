<?php
include_once("connectdb.php");

try {	
	$currentUsername = $_SESSION['username'];
	$actualPassword = $_POST["actualPassword"];
	$newPassword = $_POST["newPassword"];
	$newPasswordConfirmation = $_POST["newPasswordConfirmation"];

	$stmt = $dbh->prepare(
		'SELECT password
		FROM User
		WHERE idUser = ?');

	$stmt->execute($_SESSION['idUser']);
	$trueActualPWD=$stmt->fetch();

	if($trueActualPWD !== $actualPassword){
		$_SESSION['responseContent'] = 'Wrong current password';
		header("Location: index.php?page=profile");
		exit();
	}

	if ($newPassword !== $newPasswordConfirmation) {
		$_SESSION['responseContent'] = 'Passwords don''t match.';
		header("Location: index.php?page=profile");
		exit();
	}

	$stmt = $dbh->prepare(
		'UPDATE User
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array(
		hash('sha256', $newPassword),
		$currentUsername));
	
	$_SESSION['responseContent'] = 'Password successfully changed.';

} catch(PDOException $e) {
	echo $e->getMessage();
	$_SESSION['responseContent'] = 'Could not update database, please try again later.';
}

header("Location: index.php?page=profile");
exit;
?>