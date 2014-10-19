<?php
	$gegevens = file_get_contents('deel1.txt');
	$userSplit = explode(';', $gegevens);
	for($i = 0; $i<count($userSplit); $i++){
		$userSplit[$i] = explode(',', $userSplit[$i]);
	}
	
	
	$message ="";

	if(!isset($_COOKIE['authenticated']))
	{
		if(isset($_POST['submit']))
		{
			for($i = 0; $i<count($userSplit); $i++)
			{
				if($_POST['username'] == $userSplit[$i][0] && $_POST['password'] == $userSplit[$i][1])
				{
			
					if(isset($_POST['remember']))
					{
						setcookie('authenticated', $_POST['username'], time()+(3600*24*30));
					} else 
					{
					setcookie('authenticated', $_POST['username']);
					}
					header('location:cookies-deel1.php');
				} else 
				{
					$message= "username and/or password incorrect, try again.";
				}	
			}
		}
	} else 
	{
		$message = "hallo " .$_COOKIE['authenticated']. ", welkom terug.";
	}

	if(isset($_GET['logout'])){
		setcookie('authenticated', true, time()-5);
		header('location:cookies-deel1.php');
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookies | deel 1</title>
</head>
<body>
	<p><?= $message ?></p>
	<?php if(!isset($_COOKIE['authenticated'])): ?>
		<form action="cookies-deel1.php" method="POST">
			<ul>
				<li>
					<label for="username">username</label>
					<input type="text" id="username" name="username">
				</li>
				<li>
					<label for="password">password</label>
					<input type="password" id="password" name="password">
				</li>
				<li>
					<input type="checkbox" id="remember" name="remember">
					<label for="remember">remember me</label>
			</ul>
			<input type="submit" name="submit" value="inloggen">
		</form>
	<?php else: ?>
		<a href="cookies-deel1.php?logout">uitloggen</a>
	<?php endif; ?>
</body>
</html>