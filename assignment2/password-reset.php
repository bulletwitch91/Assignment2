<?php
	include_once 'header.php';
?>
<div class="title">
	Password Reset
</div>
<div class="main-content">
	<h3>
		Reset Your Password
	</h3>
	<div id="password-reset">
		<form action="includes/password-reset.inc.php" method="post">
			<input type="text" name="password-reset-email" placeholder="Email Address">
			<button type="submit" name="password-reset">Reset</button>
		</form><br>
		<?php
			if(isset($_SESSION["message-reset"])) {
				echo $_SESSION["message-reset"];
		}
		?>
	</div>
</div>
<?php
	include_once 'footer.php';
?>