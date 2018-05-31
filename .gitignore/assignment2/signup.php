<?php
	include_once 'header.php';
?>
<div class="title">
	Sign-up
</div>

<div class="main-content">
	<div id="sign-up-content">
		<h3>Create a new account!</h3><br>
		<h4>It's easy and free</h4><br>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Enter first name">
			<input type="text" name="last" placeholder="Enter last name">
			<input type="text" name="email" placeholder="Enter email">
			<input type="text" name="username" placeholder="Enter username">
			<input type="password" name="password" placeholder="Enter password">
			<button type="submit" name="submit">Sign-up</button>
		</form>
	</div>
</div>
<?php
	include_once 'footer.php';
?>