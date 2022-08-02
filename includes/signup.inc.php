<?php

if(isset($_POST['signup']))
{
	include_once 'db.php';

	$firstname = $_POST['first'];
	$lastname = $_POST['last'];
	$email = $_POST['mail'];
	$phonenumber = $_POST['phone'];
	$address = $_POST['addr'];
	$username = $_POST['user'];
	$password = $_POST['pwd'];

	if(empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($address) || empty($username) || empty($password))
	{
		header("Location: ../signup.php?error=emptyfields&first=".$firstname."&last=".$lastname."&mail=".$email."&phone=".$phonenumber."&addr=".$address."&user=".$username);
		exit();
	}
	if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lasttname))
	{
		header("Location: ../signup.php?error=invalidname&mail=".$email."&phone=".$phonenumber."&addr=".$address."&user=".$username);
		exit();

	}
	else if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))
	{
		header("Location: ../signup.php?error=invalidmail&first=".$firstname."&last=".$lastname."&phone=".$phonenumber."&addr=".$address."&user=".$username);
		exit();
	}
	else if(!preg_match("/^[1-9]{1}[0-9]{6,10}$/", $phonenumber))
	{
		header("Location: ../signup.php?error=invalidphone&first=".$firstname."&last=".$lastname."&mail=".$email."&addr=".$address."&user=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9- ,]*$/", $address))
	{
		header("Location: ../signup.php?error=invalidaddress&first=".$firstname."&last=".$lastname."&mail=".$email."&phone=".$phonenumber."&user=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invalidusername&first=".$firstname."&last=".$lastname."&mail=".$email."&phone=".$phonenumber."&addr=".$address);
		exit();
	}
	else if(!preg_match("/^([a-zA-Z0-9@*#]{8,15})$/", $password))
	{
		header("Location: ../signup.php?error=invalidpassword&first=".$firstname."&last=".$lastname."&mail=".$email."&phone=".$phonenumber."&addr=".$address."&user=".$username);
		exit();
	}
	else
	{
		$sql = "SELECT username FROM users WHERE username = ?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../signup.php?error=sqlerror");
			exit();	
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usernametaken&first=".$firstname."&last=".$lastname."&mail=".$email."&phone=".$phonenumber."&addr=".$address);
				exit();
			}
			else
			{
				$sql = "INSERT INTO users (firstname, lastname, email, phonenumber, address, username, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql))
				{
					header("Location: ../signup.php?error=sqlerror");
					exit();	
				}
				else
				{
					//$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $phonenumber, $address, $username, $password);
					$result = mysqli_stmt_execute($stmt);
					/*if($result)
					{
						echo "Record entered!";
					}
					else
					{
						echo "<br>Error: ".$sql."<br>".mysqli_error($conn);
					}*/
					session_start();
					$_SESSION['username'] = $username;
					header("Location: ../homeLS.php?signup=success");
					exit();
				}

				
				/*Without using prepared statements :-*/

				/*$sql = "INSERT INTO users (firstname, lastname, email, phonenumber, address, username, password) VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$address', '$username', '$password');";
				if(mysqli_query($conn, $sql))
				{
					echo "Record entered!";
				}
				else
				{
					echo "<br>Error: ".$sql."<br>".mysqli_error($conn);
				}*/
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else
{
	header("Location: ../signup.php");
	exit();
}

?>