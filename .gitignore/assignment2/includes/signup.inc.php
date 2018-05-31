<?php

include_once "config.php";

if(isset($_POST['submit'])) {

	require 'dbh.inc.php';

	//Error handlers
	//Check for empty fields
	if(empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are invalid
		if(!preg_match("/^['a-zA-Z']*$/", $_POST["first"]) || !preg_match("/^['a-zA-Z']*$/", $_POST["last"])) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check to see if email is valid
			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				//Check is username is taken
				$username = $_POST["username"];
				$sql = "SELECT * FROM user WHERE username = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($username));
				$numrow = $dbrs->rowCount();
				if($numrow > 0) {
					header("Location: ../signup.php?login=usertaken");
					exit();
				} else {
					//Makes password hashed
					$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
					//Insert data into database
					$sql = "INSERT INTO user (user_first, user_last, user_email, user_username, user_password) VALUES (?, ?, ?, ?, ?)";
					$dbrs = $dbConn->prepare($sql);
					$dbrs->execute(array($_POST["first"],$_POST["last"],$_POST["email"],$_POST["username"],$hashedPassword));
					header("Location: ../signup-success.php");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../signup.php");
	exit();
}
