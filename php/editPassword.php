<?php
include_once("connectdb.php");

try {	
	$currentUsername = $_SESSION['username'];
	$newPassword = $_POST["newPassword"];
	$newPasswordConfirmation = $_POST["newPasswordConfirmation"];
    $actualPassword = $_POST["actualPassword"];

	if ($newPassword !== $newPasswordConfirmation) {
		$_SESSION['responseContent'] = "Passwords don''t match.";
		header("Location: index.php?page=profile");
		exit();
	}

	$stmt = $db->prepare(
		'UPDATE User
		SET password = ?
		WHERE username = ?');
	
	$stmt->execute(array(
		hash('sha256', $newPassword),
		$currentUsername));
	
	$_SESSION['responseContent'] = "Password successfully changed.";

} catch(PDOException $e) {
	echo $e->getMessage();
	$_SESSION['responseContent'] = "Could not update database, please try again later.";
}
header("Location: index.php?page=profile");
exit;
?>