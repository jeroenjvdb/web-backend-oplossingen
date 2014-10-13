<?php

    $htmlString =   '<!DOCTYPE html>
    <html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<title>Document</title>
    </head>
    <body>
    	
    </body>
    </html>';
    $array    =   array(  'Brood' => 'wit', 
                            'koffie' => 'zwart' );

	function drukArrayAf( $array )
    {

        $dataArray  =   array();

        foreach ( $array as $key => $value)
        {
            $dataArray[]    =   $naamArray . '[' . $key . '] heeft waarde ' . $value;
        }

        return $dataArray;
    }

    $resultaat  =   drukArrayAf( $array );



    function validateHtmlTag( $html )
    {
        $openingTag =   '<html>';
        $closingTag =   '</html>';

        $isValid    =   FALSE;

        if ( strpos( $html, $openingTag ) === 0 )
        {
            $estimatedClosingHTMLTAGPosition = strlen( $html ) - strlen( $closingTag );

            if ( stripos( $html, $closingTag ) == $estimatedClosingHTMLTAGPosition )
            {
                $isValid    =   TRUE;
            }
        }

        return $isValid;
    }

    $validHTML  =   validateHtmlTag( $htmlString );

?>
	

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Oplossing functies: deel2</title>

    </head>
    <body>
		
		<h1>Oplossing functies: deel2</h1>

        <h2>Array afdrukken</h2>
        <ul>
            <?php foreach ( $resultaat as $value ): ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>

        <h2>HTML valideren</h2>
        <p>De string <code><?= htmlentities( $htmlString ) ?></code> is <?= ( $validHTML ) ? 'wel' : 'niet' ?> geldig.</p>
        

    </body>
</html>


