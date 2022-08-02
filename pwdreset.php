<?php

	require 'header.php';

?>

	<main>
		<div style="padding: 16px;">
		<h1>Reset Password</h1>
		<hr>

		<?php
			if(isset($_GET['error']))
			{
				if($_GET['error'] == "emptyfields")
				{
					echo '<p style="color:red;">Fill in all 3 fields!</p>';
				}
				else if($_GET['error'] == "invalidoldpassword")
				{
					echo '<p style="color:red;">Invalid old password!</p>';
				}
				else if($_GET['error'] == "invalidnewpassword")
				{
					echo '<p style="color:red;">Invalid new password!<br>Password must be 8-15 characters long and must only contain a-z, A-Z, 0-9, @, *, # characters.</p>';
				}
				else if($_GET['error'] == "newpasswordsdonotmatch")
				{
					echo '<p style="color:red;">New passwords do not match!</p>';
				}
			}
		?>

		<form action= "includes/pwdreset.inc.php" method="post">

			<label for="old"><b>Old Password</b></label><br>
			<input type="password" name="old" required style="width: 20%;">
			<br>	
			<label for="new1"><b>New Password</b></label><br>
			<input type="password" name="new1" required style="width: 20%;">
			<br>
			<label for="new2"><b>Repeat New Password</b></label><br>
			<input type="password" name="new2" required style="width: 20%;">
			<hr>
			<p><button type="submit" name="reset">Reset</button></p>

		</form>
		</div>
	</main>
