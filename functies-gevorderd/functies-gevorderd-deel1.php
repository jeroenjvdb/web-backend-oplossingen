<?php
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

	function karakters1($naald){
		//gebruik $globals
		$hooiberg = $GLOBALS['md5HashKey'];

		$haystackCount =  strlen( $hooiberg );

		$needleAantal = substr_count ( $hooiberg, $naald );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleAantal;

	}
	function karakters2($naald, $hooiberg){
		//gebruik parameter
		

		$haystackCount =  strlen( $hooiberg );

		$needleAantal = substr_count ( $hooiberg, $naald );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleAantal;

	}
	function karakters3($naald){
		//gebruik global variabele
		global $md5HashKey;
		$hooiberg = $md5HashKey;

		$haystackCount =  strlen( $hooiberg );

		$needleAantal = substr_count ( $hooiberg, $naald );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleAantal;

	}

	$a = karakters1('a');
	$twee = karakters2('2', $md5HashKey);
	$acht = karakters3('8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>functies gevorderd: deel 1/title>
</head>
<body>
	<?= $a ?>
	<?= $twee ?>
	<?= $acht ?>
</body>
</html>