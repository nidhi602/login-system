<?php

	include_once "includes/db.php";
	require "header.php";
?>

	<main>
		<div style="padding: 16px;">
		<?php
			
			if(isset($_SESSION['username']))
			{

				echo '<p><form action="pwdreset.php" method="post" style="padding:14px 16px;">
					<button type="submit" name="resetpwd">Reset Password</button>
					</form></p>';

				echo '<p><form action="includes/logout.inc.php" method="post" style="padding:0 16px;">
					<button type="submit" name="logout">Logout</button>
					</form><p>';			
			}
			else
			{
				echo '<form action="includes/login.inc.php" method="post" style="padding:14px 16px;">
					<input type="text" name="user" placeholder="Username" style="width: 20%;">
					<input type="password" name="pwd" placeholder="Password" style="width: 20%;">
					<button type="submit" name="login">Login</button>
					</form>';

				echo '<form action="signup.php" method="post" style="padding:0 16px;">
					<button type="submit" name="signup">Sign Up!</button>
					</form>';
			}

			if(isset($_SESSION['username']))
			{
				echo '<p style="padding: 16px 20px; margin: 8px 0;">Welcome! You are currently logged in!</p>';
				echo '<p style="padding: 16px 20px; margin: 8px 0;">Username = '.$_SESSION['username']."</p><br>";
				if($_GET['reset'] == "success")
				{
					echo '<p style="color:green; padding: 16px 20px; margin: 8px 0;">Password successfully changed!</p>';
				}
			}
			else
			{
				echo '<p style="padding: 16px 20px; margin: 8px 0;">You are currently logged out!</p>';
				if(isset($_GET['error']))
				{
					if($_GET['error'] == "emptyfields")
					{
						echo '<p style="color:red; padding: 16px 20px; margin: 8px 0;">Fill in both the fields!</p>';
					}
					else if($_GET['error'] == "nouser")
					{
						echo '<p style="color:red; padding: 16px 20px; margin: 8px 0;">Invalid username and/or password!</p>';
					}
				}
			}
		?>
		</div>
	</main>