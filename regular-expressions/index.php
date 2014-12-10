<?php
	session_start();
	$replaceString	=	'#';

	if(isset($_POST['verzenden']))
	{
		$regEx 			= 	'/' . $_POST[ 'expression' ] . '/';
		$string 		= 	$_POST[ 'string' ];

		$success = preg_replace($regEx, $replaceString, $string);

		
	}

	$string1 	= "Memory can change the shape of a room; 
	it can change the color of a car. And memories can be distorted. 
	They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.";
	$regEx1 	= '/[a-d]|[u-z]|[A-D]|[U-Z]/';
	$returnString1 = preg_replace($regEx1, $replaceString, $string1);

	$string2	= "Zowel colour als color zijn correct Engels.";
	$regEx2		= "/colou?r/";
	$returnString2 = preg_replace($regEx2, $replaceString, $string2);

	$string3	= "1020 1050 9784 1560 0231 1546 8745";
	$regEx3		= "/1\d{3}/";
	$returnString3 = preg_replace($regEx3, $replaceString, $string3);

	$string4	= "24/07/1978 en 24-07-1978 en 24.07.1978";
	$regEx4		= "/[0-9]{2}[\/\-\.][0-9]{2}[\/\-\.][0-9]{4}/";
	$returnString4 = preg_replace($regEx4, $replaceString, $string4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>regular expressions</title>
</head>
<body>
	<h1> RegEx Tester </h1>
	<form action=<?= $_SERVER['PHP_SELF'] ?>  method="POST">
		<label for="expression">Regular Expression</label><br>
		<input type="text" id="expression" name="expression" value="<?= isset($_POST['expression']) ? $_POST['expression'] : '' ?>"><br>

		<label for="string"> String </label><br>
		<textarea id="string" name="string"><?= isset($_POST['string']) ? $_POST['string'] : '' ?></textarea><br>

		<input type="submit" name="verzenden">
		<?php if(isset($string)): ?>
		<p>resultaat: <?= $success ?></p>
		<?php endif ?><br>

		
	</form>




	<h1> part 2 </h1>
	
		<?= $string1 ?><br>
		<?= $regEx1 ?><br>
		<?= $returnString1; ?><br>

		<?= $string2 ?><br>
		<?= $regEx2 ?><br>
		<?= ($returnString2); ?><br>

		<?= $string3 ?><br>
		<?= $regEx3 ?><br>
		<?= ($returnString3); ?><br>

		<?= $string4 ?><br>
		<?= $regEx4 ?><br>
		<?= ($returnString4); ?><br>
</body>
</html>