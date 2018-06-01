<?php
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
			<h1>Cold Food</h1>
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
			<h1>Hot Drink</h1>
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
				$product_name = "cold-drink";

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
		<form action="">
			<button type="submit" name="checkout"> 
				checkout
			</button>
		</form>
	</div>
</div>
<?php
	//Adds footer to page
	include_once 'footer.php';
?>

