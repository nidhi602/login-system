<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #444;
			position: -webkit-sticky; /* Safari */
			position: sticky;
			top: 0;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}

		.active {
			background-color: #4CAF50;
		}

		button {
			padding: 15px 20px; 
			margin: 5px 0 22px 0;
		}

		input {
			width: 25%; 
			padding: 15px; 
			margin: 5px 0 22px 0; 
			display: inline-block; 
			border: none; 
			background: #f1f1f1;
		}

		hr {
			border: 1px 
			solid #f1f1f1; 
			margin-bottom: 25px;
		}

	</style>
</head>
<body>

	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>



</body>
</html>