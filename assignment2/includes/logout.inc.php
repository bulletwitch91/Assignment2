<?php

session_start();

require 'dbh.inc.php';

if (isset($_POST['logout'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../homepage.php");
	exit();
}

?>