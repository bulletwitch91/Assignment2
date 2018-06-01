<?php
	
	session_start();
	
	require 'dbh.inc.php';

	if(isset($_POST['delete-item'])) {
	//Connection to database
	require 'dbh.inc.php';

	//Error handlers
	//Check for empty fields
	if(empty($_POST["item-name-delete"])) {
		header("Location ../staff.php?delete=empty");
		exit();
	} else {
		$sql = "DELETE FROM food WHERE name = ?";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute(array($_POST["item-name-delete"]));
		header("Location: ../delete-item-successful.php");
		exit();
		}
	} else {
		header("Location ../staff.php?delete=error");
		exit();
	}
?>