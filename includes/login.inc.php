<?php

	if(isset($_POST['login']))
	{
		include_once 'db.php';

		$username = $_POST['user'];
		$password = $_POST['pwd'];

		if(empty($username) || empty($password))
		{
			header("Location: ../homeLS.php?error=emptyfields");
			exit();
		}
		else
		{
			$sql = "SELECT * FROM users WHERE username = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../homeLS.php?error=sqlerror");
				exit();	
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) 
				{
					if($password === $row['password'])
					{
						session_start();
						$_SESSION['userId'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						header("Location: ../homeLS.php?login=success");
						exit();

					}
					else
					{
						header("Location: ../homeLS.php?error=nouser");
						exit();
					}
				}
				else
				{
					header("Location: ../homeLS.php?error=nouser");
					exit();
				}
			}
		}

	}
	else
	{
		header("Location: ../homeLS.php");
		exit();
	}
?>