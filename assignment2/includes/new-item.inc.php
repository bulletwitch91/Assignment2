<?php
	session_start();
	
	require 'dbh.inc.php';

	$uploaded_photo = file_get_contents($_FILES["FileToUpload"]["tmp_name"]);

	if(isset($_POST['new-item'])) {
	//Connection to database
	require 'dbh.inc.php';

	//Error handlers
	//Check for empty fields
	if(empty($_POST["item-name"]) || empty($_POST["item-price"]) || empty($_POST["item-description"])) {
		header("Location: ../staff.php?item=empty");
		exit();
	} else {
		$sql = "INSERT INTO food (name, price, description, item_type, product_image) VALUES (?, ?, ?, ?)";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute(array($_POST["item-name"],$_POST["item-price"],$_POST["item-description"],$_POST["item-type"], $_POST[$uploaded_photo]));
		header("Location: ../add-item-successful.php");
		exit();
		} 
	} else {
		header("Location: ../staff.php?item=error");
		exit();
	}
?>