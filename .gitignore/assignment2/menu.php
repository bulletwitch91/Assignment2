<?php
	//Connects to SQL database
	require 'includes/dbh.inc.php';
	//
	$page = 'menu';
	//Adds header to page
	include_once 'header.php';
?>
<div class="title">
	Menu
</div>
<div class="main-content">
	<div id="menu-items">
		<div class="food">
			<h1>Hot Food</h1>
			<?php
				$product_name = "hot-food";

				$sql = "SELECT * FROM food WHERE item_type = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($product_name));

				foreach ($dbrs as $dbrow) {
					echo '<div class="food-name">' . $dbrow['name'] . '</div><br>' . '<div class="food-description">' . $dbrow['description'] . '</div><br>$' . $dbrow['price'] . '<br><br><br><br>';
				}
			?>
		</div>
		<div class="food">
			<h1>Hot Food</h1>
			<?php
				$product_name = "cold-food";

				$sql = "SELECT * FROM food WHERE item_type = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($product_name));

				foreach ($dbrs as $dbrow) {
					echo '<div class="food-name">' . $dbrow['name'] . '</div><br>' . '<div class="food-description">' . $dbrow['description'] . '</div><br>$' . $dbrow['price'] . '<br><br><br><br>';
				}
			?>
		</div>
		<div class="food">
			<h1>Hot Food</h1>
			<?php
				$product_name = "hot-drink";

				$sql = "SELECT * FROM food WHERE item_type = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($product_name));

				foreach ($dbrs as $dbrow) {
					echo '<div class="food-name">' . $dbrow['name'] . '</div><br>' . '<div class="food-description">' . $dbrow['description'] . '</div><br>$' . $dbrow['price'] . '<br><br><br><br>';
				}
			?>
		</div>
		<div class="food">
			<h1>Hot Food</h1>
			<?php
				$product_name = "hot-drink";

				$sql = "SELECT * FROM food WHERE item_type = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($product_name));

				foreach ($dbrs as $dbrow) {
					echo '<div class="food-name">' . $dbrow['name'] . '</div><br>' . '<div class="food-description">' . $dbrow['description'] . '</div><br>$' . $dbrow['price'] . '<br><br><br><br>';
				}
			?>
		</div>
	</div>
	<div id="checkout-button">
		<h3>Checkout</h3>
	</div>
</div>
<?php
	//Adds footer to page
	include_once 'footer.php';
?>

