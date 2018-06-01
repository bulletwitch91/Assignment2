<?php
	include_once 'header.php';
?>
<div class="title">
	Edit Menu
</div>
<div class="main-content">
	<div id="staff-page">
		<div id="menu-buttons">
		<?php
		if(isset($_SESSION["staff"])) {
			?><h2>Full menu</h2>
			<form method="post">
				<button type="submit" name="hot-food">Hot food</button>
				<button type="submit" name="cold-food">Cold food</button>
				<button type="submit" name="hot-drink">Hot drinks</button>
				<button type="submit" name="cold-drink">Cold drinks</button>
			</form>
		</div>
			<div id=edit-menu-items>
				<table>
					<tr>
						<th>Food Name</th>
						<th id="price">Price</th>
						<th id="description">Description</th>
					</tr>
				<?php
					if(isset($_POST['hot-food'])){
						$food_type = "hot-food";
						$sql = "SELECT * FROM food WHERE item_type = ?";
						$dbrs = $dbConn->prepare($sql);
						$dbrs->execute(array($food_type));
						foreach ($dbrs as $dbrow) {
							echo "<tr><td>" . $dbrow['name'] . "</td><td>$" . $dbrow['price'] . "</td><td>" . $dbrow['description'] . "</td><td>" . "</tr>";
						}
					}
					if(isset($_POST['cold-food'])) {
						$food_type = "cold-food";
						$sql = "SELECT * FROM food WHERE item_type = ?";
						$dbrs = $dbConn->prepare($sql);
						$dbrs->execute(array($food_type));
						foreach ($dbrs as $dbrow) {
							echo "<tr><td>" . $dbrow['name'] . "</td><td>$" . $dbrow['price'] . "</td><td>" . $dbrow['description'] . "</td></tr>";
						}
					}
					if(isset($_POST['hot-drink'])) {
						$food_type = "hot-drink";
						$sql = "SELECT * FROM food WHERE item_type = ?";
						$dbrs = $dbConn->prepare($sql);
						$dbrs->execute(array($food_type));
						foreach ($dbrs as $dbrow) {
							echo "<tr><td>" . $dbrow['name'] . "</td><td>$" . $dbrow['price'] . "</td><td>" . $dbrow['description'] . "</td></tr>";
						}
					}	
					if(isset($_POST['cold-drink'])) {
						$food_type = "cold-drink";
						$sql = "SELECT * FROM food WHERE item_type = ?";
						$dbrs = $dbConn->prepare($sql);
						$dbrs->execute(array($food_type));
						foreach ($dbrs as $dbrow) {
							echo "<tr><td>" . $dbrow['name'] . "</td><td>$" . $dbrow['price'] . "</td><td>" . $dbrow['description'] . "</td></tr>";
						}
					}
				?></table>
			</div>
		<h1>Delete an item</h1>
		<form action="includes/item-delete.inc.php" method="post">
			<input type="text" name="item-name-delete" placeholder="Item Name">
			<button type="submit" name="delete-item">Submit</button>
		</form>
		<h1>Add new item</h1>

		<form action="includes/new-item.inc.php" method="post">
			<input type="text" name="item-name" placeholder="Item Name">
			<input type="text" name="item-price" placeholder="Item Price">
			<select name="item-type">
				<option value="hot-food">Hot Food</option>
				<option value="cold-food">Cold Food</option>
				<option value="hot-drink">Hot Drink</option>
				<option value="cold-drink">Cold Drink</option>
			</select>
			<br></br>
			<form action="includes/new-item.inc.php" method="post" encrypt="multipart/form-data">
			Select image to upload
			<input type="file" name="FileToUpload">
			<input type="submit" value="Upload Image" name="submit">
			<br>
			<input type="text" name="item-description" placeholder="Item Description" maxlength="75"><br></br>
			<button type="submit" name="new-item">Submit</button> 
		</form>
	<?php }
	if(!isset($_SESSION["staff"])) {
		echo "<h2>This page is forbidden!</h2>";
	}
	?>
	</div>
</div>
<?php
	//Adds footer to page
	include_once 'footer.php';
?>