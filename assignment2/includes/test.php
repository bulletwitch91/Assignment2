<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check for empty fields
	if(empty($uid) || empty($pwd)) {
		header("Location: ../homepage.php?login=empty")
	} else {
		//Check is username exists
		$sql = "SELECT * FROM users WHERE user_uid='uid'";
		$result = mysqli_master_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 1) {
			header("Location: ../homepage.php?login=error");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false) {
					header("Location: ../homepage.php?login=error");
					exit();
				}	else if ($hashedPwdCheck == true) {
					//Logs the user in
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['first'] = $row['user_first'];
					$_SESSION['last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../homepage.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../homepage.php?login=error");
	exit();
}