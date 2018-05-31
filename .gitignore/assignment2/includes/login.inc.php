<?php
include_once '../config.php';

if (isset($_POST['login'])) {

	//Connection to database
	require 'dbh.inc.php';

	//Error handlers
	//Check for empty fields
	if(empty($_POST["username"]) || empty($_POST["password"])) {
		header("Location: ../homepage.php?login=empty");
		exit();
	} else {
		//Check if username/email and password match
		$sql = "SELECT * FROM user WHERE user_username = ? OR user_email = ? AND user_password = ?";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute(array($_POST["username"],$_POST["username"],$_POST["password"]));
		$count = $dbrs->rowCount();
		//Currently does not dehash password
		if ($count > 0) {
			//Checks if user is admin
			$staff = "staff";
			$sql = "SELECT user_type FROM user WHERE user_type = ?";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute(array($staff));
			$count = $dbrs->rowCount();
			if($count > 0) {
				//If user is admin - do this
				$_SESSION["staff"] = "true";
				$_SESSION["username"] = $_POST["username"];
				header("Location: ../homepage.php?login=success-admin");
				exit();
			} else {
				//If user is not admin - do this
				$_SESSION["username"] = $_POST["username"];
				header("Location: ../homepage.php?login=success");
				exit();
			}

			$_SESSION["username"] = $_POST["username"];
			header("Location: ../homepage.php?login=success");
			exit();
		} else {
			header("Location: ../login-error.php");
			exit();
		}
	}
} else {
	header("Location: ../homepage.php?login=error");
	exit();
}