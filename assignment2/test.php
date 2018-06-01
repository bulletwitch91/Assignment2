<?php
require 'includes/dbh.inc.php';

$product_name = "burger";

$sql = "SELECT * FROM food WHERE name = ?";
$dbrs = $dbConn->prepare($sql);
$dbrs->execute(array($product_name));

$numrow = $dbrs->rowCount();
echo "There are $numrow row(s) retrieved" , "\n<br>";
?>