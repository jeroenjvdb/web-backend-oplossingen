<?php
	$artikels = array(
		array('titel' => 'Man (34) die baby vergat in auto vrijgesproken: "Vergeten is essentieel onvrijwillig"',
			'datum' => '13 oktober 2014',
			'afbeelding' => 'vrijspraak.jpg',
			'afbeeldingBeschrijving' => 'rechtershamer slaat neer',
			'inhoud' => 'Opvallend vonnis van de Brusselse strafrechter. Een 34-jarige man uit Eigenbrakel, die in 2012 zijn zes maanden oude dochtertje vergat in een hete wagen, is vrijgesproken. Het meisje stierf door uitdroging. De militair werd beschuldigd van onvrijwillige doodslag, maar de rechter oordeelde dat het om een vergetelheid ging en dat gebeurt essentieel onvrijwillig.'),
		array('titel' => '"Geen extra ebola-screenings op Zaventem"',
			'datum' => '13 oktober 2014',
			'afbeelding' => 'ebola.jpg',
			'afbeeldingBeschrijving' => 'een aantal dokters bij elkaar',
			'inhoud' => 'Gisterenavond is er in het Sint-Pietersziekenhuis in Brussel een Belg in quarantaine geplaatst. De persoon vertoonde symptomen van het ebolavirus en werd door zeer goed beschermde hulpverleners naar het ziekenhuis vervoerd. Intussen gaan er steeds meer stemmen op die strengere controles op het ebolavirus eisen, om mogelijke besmettingen in ons land te vermijden. Er komen echter geen extra screenings. Dat vernam VTM Nieuws bij het kabinet van minister van Volksgezondheid Maggie De Block (Open Vld).'),
		array('titel' => 'Duivelsgekte op volle toeren: 1 op 2 kijkers stemde af op match tegen voetbaldwerg',
			'datum' => '12 oktober 2013',
			'afbeelding' => 'duivels.jpg',
			'afbeeldingBeschrijving' => 'een foto van de rode duivels',
			'inhoud' => 'Duivelsgekte op volle toeren: 1 op 2 kijkers stemde af op match tegen voetbaldwerg'));

	$individueelArtikel = false;
	$nietBestaandArtikel = false;

	if ( isset ( $_GET['id'] ) )
	{
		$id = $_GET['id'];

		
		if ( array_key_exists( $id , $artikels ) )
		{
			$artikels 			= 	array( $artikels[$id] );
			$individueelArtikel	=	true;
		}
		else
		{
			$nietBestaandArtikel	=	true;
		}		
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php if ( !$individueelArtikel ): ?>
		<title>Oplossing get: deel1</title>
	<?php elseif ( $nietBestaandArtikel ): ?>
		<title>Oplossing get: deel1 - Het artikel met id <?php echo $id ?> bestaat niet</title>
	<?php else: ?>
		<title>Oplossing get: deel1. Artikel: <?php echo $artikels[0]['titel'] ?></title>
	<?php endif ?>
	<style>
		body
		{
			font-family:"Segoe UI";
			color:#423f37;
		}

		.container
		{
			width:	1024px;
			margin:	0 auto;
		}

		img
		{
			max-width: 100%;
		}

		.multiple
		{
			float:left;
			width:300px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1)
		{
			margin-left:0px;
		}

		.multiple:nth-child(3n)
		{
			margin-right:0px;
		}

		.single img
		{
			float:right;
			margin-left: 16px;
		}


	</style>
</head>
<body>
	<?php if ( !$nietBestaandArtikel ): ?>
		<div class="container">
			<?php foreach ( $artikels as $id => $artikel ): ?>
				<article class="<?php echo ( !$individueelArtikel ) ? 'multiple': 'single' ; ?>">
					<h1><?php echo $artikel['titel'] ?></h1>
					<p><?php echo $artikel['datum'] ?></p>
					<img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">
					<p><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['inhoud'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['inhoud'] ) ; ?></p>
					<?php if ( !$individueelArtikel ): ?>
						<a href="get-deel1.php?id=<?php echo $id ?>">Lees meer</a>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</div>
	<?php else: ?>
		<p>Het artikel met id <?php echo $id ?> bestaat niet. Probeer een ander artikel.</p>
	<?php endif ?>
</body>
</html>