<?php
	//session_start();
?>
<!DOCTYPE html>
<head>
<title>	Whitireia Cafe </title>
<?php
	include_once 'includes/dbh.inc.php';
?>
<link rel="stylesheet" href="style.css" type="text/css">
<!-- <link rel="stylesheet" href="shopping-cart/shopping-cart.css" type="text/css">
<script src="shopping-cart.js"></script> -->

</head>

<header>
	<div class="wrapper">
		<div class="top-bar">

		</div>
		<nav>
			<div class="logo">
				<img src="includes/resources/logo/whitireia-logo.png" width="125" height="150">
			</div>
			<ul>
				<li class="menu-active <?php if($page=='homepage'){echo 'active';}?>" >
					<a href="homepage.php">Home</a></li>
				<!-- <li><a href="test-shopping-page.php">Test Cart</a></li> -->
				<li><a href="menu.php">Menu</a></li>
			</ul>
			<div class="login">
				<h3>Welcome to the members area <?php echo $_SESSION["username"];?>
				<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout">Logout</button>
				</form>
			</div>
		</nav>
	</div>
</header>