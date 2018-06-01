<?php

session_start();

require 'dbh.inc.php';

if(isset($_POST['submit'])) {

	//Error handlers
	//Check for empty fields
	if(empty($_POST["first"]) || empty($_POST["last"]) || empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])) {
		$_SESSION["message"] = "Please fill in all boxes.";
		echo $_SESSION["message"];
		header("Location: ../signup.php?signup=empty");
	} else {
		//Check if input characters are invalid
		if(!preg_match("/^['a-zA-Z']*$/", $_POST["first"]) || !preg_match("/^['a-zA-Z']*$/", $_POST["last"])) {
			$_SESSION["message"] = "Name invalid. Please do not include symbols.";
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check to see if email is valid
			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$_SESSION["message"] = "Please enter valid email.";
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				//Check is username is taken
				$sql = "SELECT * FROM user WHERE user_username = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($_POST["username"]));
				$numrow = $dbrs->rowCount();
				if($numrow > 0) {
					$_SESSION["message"] = "Username is taken. Please use different username.";
					header("Location: ../signup.php?login=usertaken");
					exit();
				} else {
					//Makes password hashed - not working
					//$hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
					//Insert data into database
					$sql = "INSERT INTO user (user_first, user_last, user_email, user_username, user_password) VALUES (?, ?, ?, ?, ?)";
					$dbrs = $dbConn->prepare($sql);
					$dbrs->execute(array($_POST["first"],$_POST["last"],$_POST["email"],$_POST["username"],$_POST["password"]));
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
