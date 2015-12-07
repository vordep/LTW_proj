<?php
include_once("connectdb.php");

try {	
	$currentUsername = $_SESSION['username'];
	$newPassword = $_POST["newPassword"];
	$newPasswordConfirmation = $_POST["newPasswordConfirmation"];
<<<<<<< HEAD
    $actualPassword = $_POST["actualPassword"];

	if ($newPassword !== $newPasswordConfirmation) {
		$_SESSION['responseContent'] = "Passwords don''t match.";
=======

	if ($newPassword !== $newPasswordConfirmation) {
		$_SESSION['responseContent'] = 'Passwords don''t match.';
>>>>>>> origin/master
		header("Location: index.php?page=profile");
		exit();
	}

<<<<<<< HEAD
	$stmt = $db->prepare(
=======
	$stmt = $dbh->prepare(
>>>>>>> origin/master
		'UPDATE User
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array(
		hash('sha256', $newPassword),
		$currentUsername));
	
<<<<<<< HEAD
	$_SESSION['responseContent'] = "Password successfully changed.";

} catch(PDOException $e) {
	echo $e->getMessage();
	$_SESSION['responseContent'] = "Could not update database, please try again later.";
=======
	$_SESSION['responseContent'] = 'Password successfully changed.';

} catch(PDOException $e) {
	echo $e->getMessage();
	$_SESSION['responseContent'] = 'Could not update database, please try again later.';
>>>>>>> origin/master
}
header("Location: index.php?page=profile");
exit;
?>