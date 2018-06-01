<?php

session_start();

require 'dbh.inc.php';

//Error handlers
//Checks if email box is empty
if(isset($_POST["password-reset"])) {
	if(empty($_POST["password-reset-email"])) {
		$_SESSION["message-reset"] = "User with that email does not exist!";
		header("Location: ../password-reset.php?reset=invalid");
	} else {
		//Checks if email exists
		$sql = "SELECT * FROM user WHERE user_email = ?";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute(array($_POST["password-reset-email"]));
		$count = $dbrs->rowCount();
		if($count > 0) {
			//Send email to reset password
			//No mailserver so I cannot test
			$hash = "wupi";
			$key = hash('SHA256', '$email');
			$_SESSION["message-reset"] = "Please check your email&nbsp;" . $_POST["password-reset-email"] . "&nbsp;for a confirmation link to complete your password reset!";
			$to = $_POST["password-reset-email"];
			$subject = "Reset password link";
			$message = "Hello,

			You have requested a password reset!

			Please click this link to reset your password:

			http://localhost/assignment2/password-reset-success.php?email".$_POST["password-reset-email"]."&hash=".$hash;
			$headers = "From: support@whitireia-canteen.org.nz";
			mail($to, $subject, $message, $headers);

		} else {
			$_SESSION["message-reset"] = "Email does not exist";
			header("Location: ../password-reset.php?reset=invalid");
		}
	}
} else {
	header("Location: ../password-reset.php?reset=error");
}
?>