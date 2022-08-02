<?php

	require "header.php";
?>

	<main>
		<div style="padding: 16px;">
		<h1>Register</h1>
		<p>Please fill in this form to create an account.</p>
    	<hr>

		<?php
			if(isset($_GET['error']))
			{
				if($_GET['error'] == "emptyfields")
				{
					echo '<p style="color:red;">Fill in all the fields!</p>';
				}
				else if($_GET['error'] == "invalidname")
				{
					echo '<p style="color:red; ">Invalid first name and/or last name!<br>Name must only contain a-z and A-Z characters.</p>';
				}
				else if($_GET['error'] == "invalidmail")
				{
					echo '<p style="color:red;">Invalid e-mail address!</p>';
				}
				else if($_GET['error'] == "invalidphone")
				{
					echo '<p style="color:red;">Invalid phone number!</p>';
				}
				else if($_GET['error'] == "invalidaddress")
				{
					echo '<p style="color:red;">Invalid address!<br>Address must only contain 0-9, a-z, A-Z, \',\' and \'-\' characters.</p>';
				}
				else if($_GET['error'] == "invalidusername")
				{
					echo '<p style="color:red;">Invalid username!<br>Username must only contain a-z, A-Z, and 0-9 characters.</p>';
				}
				else if($_GET['error'] == "invalidpassword")
				{
					echo '<p style="color:red;">Invalid password!<br>Password must be 8-15 characters long and must only contain a-z, A-Z, 0-9, @, *, # characters.</p>';
				}
				else if($_GET['error'] == "usernametaken")
				{
					echo '<p style="color:red;">Username already exists!</p>';
				}
			}
		?>

		<form action= "includes/signup.inc.php" method="post">

			<label for="first"><b>First Name</b></label><br>
			<input type="text" name="first" required>
			<br>	
			<label for="last"><b>Last Name</b></label><br>
			<input type="text" name="last" required>
			<br>
			<label for="mail"><b>Email Address</b></label><br>
			<input type="text" name="mail" required>
			<br>
			<label for="phone"><b>Phone Number</b></label><br>
			<input type="text" name="phone" required>
			<br>
			<label for="addr"><b>Address</b></label><br>
			<input type="text" name="addr" required>
			<br>
			<label for="user"><b>User Name</b></label><br>
			<input type="text" name="user" required>
			<br>
			<label for="pwd"><b>Password (8-15 characters long)</b></label><br>
			<input type="password" name="pwd" required>
			<hr>
			<p><button type="submit" name="signup">Sign Up</button></p>

		</form>
	</div>
	</main>
