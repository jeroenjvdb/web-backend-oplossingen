<?php
	$text = file_get_contents("text-file.txt");
	$textChars = str_split($text);

	rsort($textChars);
	$textChars = array_reverse($textChars);

	$tellerArray = array();

	/*foreach($textChars as $val){
		if(isset($tellerArray[$val])){
			$tellerArray[$val]++;
		} else {
			$tellerArray[$val] = 1;
		}
	}*/

	foreach($textChars as $value){
		if(isset($tellerArray[$value])){
			$tellerArray[$value]++;
		} else {
			$tellerArray[$value] = 1;
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>foreach deel 1</title>
</head>
<body>
	<?php var_dump($tellerArray); ?>
</body>
</html>