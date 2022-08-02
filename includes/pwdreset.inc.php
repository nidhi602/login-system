<?php

	session_start();

	if(isset($_POST['reset']))
	{
		include_once 'db.php';

		$oldpwd = $_POST['old'];
		$newpwd1 = $_POST['new1'];
		$newpwd2 = $_POST['new2'];

		if(empty($oldpwd) || empty($newpwd1) || empty($newpwd2))
		{
			header("Location: ../pwdreset.php?error=emptyfields");
			exit();
		}
		else if(!preg_match("/^([a-zA-Z0-9@*#]{8,15})$/", $newpwd1))
		{
			header("Location: ../pwdreset.php?error=invalidnewpassword");
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
				echo $_SESSION['username']."<br>";
				mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) 
				{
					if($oldpwd === $row['password'])
					{
						if($newpwd1 === $newpwd2)
						{
							$sql = "UPDATE users SET password = ? WHERE username = ?;";
							$stmt = mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt, $sql))
							{
								header("Location: ../homeLS.php?error=sqlerror");
								exit();	
							}
							else
							{
								mysqli_stmt_bind_param($stmt, "ss", $newpwd1, $_SESSION['username']);
								mysqli_stmt_execute($stmt);
								header("Location: ../homeLS.php?reset=success");
								exit();
							}
						}
						else
						{
							header("Location: ../pwdreset.php?error=newpasswordsdonotmatch");
							exit();	
						}
					}
					else
					{
						header("Location: ../pwdreset.php?error=invalidoldpassword");
						exit();
					}
				}
				else
				{
					echo "User not found!";
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