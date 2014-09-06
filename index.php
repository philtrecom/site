<html>

<head>

	<meta charset="UTF-8">
	
	<title>PHILTRE COM LLC</title>
	
	<meta name="title" content="PHILTRE COM LLC">
	<meta name="description" content="Phuckno Phor Youphs">
	<meta name="Copyright" content="Copyright Philtre Com LLC 2014. All Rights Reserved.">

	<link rel="stylesheet" href="style.css">
	
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:800,600,400' rel='stylesheet' type='text/css'>

</head>

<body>
	
<div id="logo">
	<img src="media/logo.gif" width="240" height="120"/>
</div>

<div id="social" class="alignright">
	<a href="http://facebook.com/philtrecom">
		<img src="media/icons/facebook.gif" width="32" height="32" border="0" />
	</a>
	<a href="http://soundcloud.com/philtre">
		<img src="media/icons/soundcloud.gif" width="32" height="32" border="0" />
	</a>
</div>


<?php $csv = array_map('str_getcsv', file('releases.csv')); arsort($csv); ?>

<div id="releases">

	<?php foreach($csv as $row): ?>

		<?php if( strlen($row[0]) < 1 ) continue; ?>

		<div class="release">
			<div class="cover_image"><img src="media/<?= $row[0] ?>/cover.jpg" width="240" height="240"></div>

			<div class="release_info">
				<div>
					<span class="alignleft"><?= $row[3] ?></span>
					<span class="alignright"><?= strtoupper($row[0]).' '.$row[1] ?></span>
				</div>

				<div id="artist"><?= $row[2] ?></div>

				<div><a href="media/<?= $row[0] ?>/hifi.zip">→DOWNLOAD</a></div>
			</div>
		</div>

	<?php endforeach; ?>

</div>

</body>
</html>
