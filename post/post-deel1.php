<?php
	$password = "azerty";
	$username = "jeroen";
	$message = "aanmelden.";

	if(isset($_POST['submit']))
	{
		if ($_POST['username'] == $username && $_POST['password'] == $password)
		{
			$message = "welkom";
		} else
			$message = "error!";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post deel 1</title>
</head>
<body>
	<?= $message ?>
	<form action="post-deel1.php" method="POST">
		<label for="username">username:</label>
		<input type="text" name="username" id="username"><br>
		<label for="password">password: </label>
		<input type="password" name="password" id="password"><br> 
		<input type="submit" name="submit" value="verzenden">
	</form>
</body>
</html>