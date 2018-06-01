<?php
	session_start();
	
	require 'dbh.inc.php';

	$uploaded_photo = file_get_contents($_FILES["FileToUpload"]["tmp_name"]);

	$sql = "UPDATE product SET ProductPhoto = ? Where Pr"
?>