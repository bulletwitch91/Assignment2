<?php
	include_once 'config.php';
?>
<div class="title">
	Edit Menu
</div>
<div class="main-content">
	<div id="staff-page">
		<?php
		if(isset($_SESSION["staff"])) {
			?><h1>Would you like to edit hot food, cold food, hot drinks or cold drinks?</h1>
			<form method="post">
				<button type="submit" name="hot-food">Hot food</button>
				<button type="submit" name="cold-food">Cold food</button>
				<button type="submit" name="hot-drink">Hot drinks</button>
				<button type="submit" name="cold-drink">Cold drinks</button>
			</form>
			<?php
				if(isset($_POST['hot-food'])){
				$food_type = "hot-food";
				$sql = "SELECT * FROM food WHERE item_type = ?";
				$dbrs = $dbConn->prepare($sql);
				$dbrs->execute(array($food_type));
				foreach ($dbrs as $dbrow) {
					echo $dbrow['name'] . "<br>" . $dbrow['price'] . "<br>" . $dbrow['description'] . "<br>" . $dbrow['item_type'] . "<br>";
				}
				elseif (isset($_POST['cold-food'])) {
						echo "test";
					}	
			}
		}		
		?>
	</div>
</div>
<?php
	//Adds footer to page
	include_once 'footer.php';
?>