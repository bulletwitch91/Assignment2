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
				<a href="homepage.php"><img src="includes/resources/logo/whitireia-logo.png" width="125" height="150"></a>
			</div>
			<ul>
					<li class="menu-active <?php if($page=='homepage'){echo 'active';}?>" >
						<a href="homepage.php">Home</a></li>
					<!-- <li><a href="test-shopping-page.php">Test Cart</a></li> -->
					<li><a href="menu.php">Menu</a></li>
					<li><a href="#">About Us</a></li>
				</ul>
				<?php if(isset($_SESSION["username"])) {
					?><div id="logout"><?php
					echo '<h3>Welcome ' . $_SESSION["username"] . '
					<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout">Logout</button>
					</form>';
					?></div><?php
				?>
					<?php } else {
						?> <div id="login"><?php
						echo '<form action="includes/login.inc.php" method="post">
								<h3>Username/email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</h3>
								<input type="text" name="username" placeholder="Username">
								<input type="password" name="password" placeholder="Password">
								<button type="submit" name="login">Log in</button>
							</form>
						<a href="signup.php">Create new account</a>';
						?></div><?php
					}
				?>
				<br>
			</div>
		</nav>
	</div>
</header>