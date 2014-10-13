<?php
	$pigHealth = 5;
	$maximumThrows = 8;

	function calculateHit(){
		global $pigHealth;

		$dataArray = array();
		$raakKans = rand(0, 9);
		$raak = ($raakKans >= 40) ? false : true;

		if ( $raak)
        {
            --$pigHealth;
            $dataArray['isHit']     =   true;
            if ($pigHealth != 1)
            	$dataArray['string']    =   'Hit ' . $pigHealth . ' pigs left.';
            else
            	$dataArray['string']   =   'Hit ' .$pigHealth.'pig left' ;
        }
        else
        {
            $dataArray['isHit']     =   false;
            if ($pigHealth != 1)
            	$dataArray['string']    =   'mis! ' . $pigHealth . ' pigs left.';
        	else
        		$dataArray['string']    =   'mis! ' . $pigHealth . ' pig left.';
        }
	}
	function launchAngryBird(  )
    {
        global $pigHealth;
        global $maximumThrows;

        global $spelverloop;

        if ( $maximumThrows != 0 && $pigHealth > 0 )
        {
            $hitResult = calculateHit( );
            
            --$maximumThrows;

            $spelverloop[]  =   $hitResult['string'];

            launchAngryBird();
        }
        else
        {
            if ( $pigHealth > 0 )
            {
               $spelverloop[]   =   'Helaas, je hebt verloren.'; 
            }
            else
            {
                $spelverloop[]   =   'Hoera! Hoera! Hoera! Je hebt gewonnen!';
            }
        }
    } 


    launchAngryBird( );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>functies gevorderd: deel 2</title>
</head>
<body>
	<?php foreach( $spelverloop as $resultaat ): ?>
                <li><?= $resultaat ?></li>
            <?php endforeach ?>
</body>
</html>