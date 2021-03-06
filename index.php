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

<!-- ---------------------------------------------------------------------------------------------------- new release -->

<div id="new-release">
	<div class="cover_image"><img src="media/feature_cover.jpg" width="480" height="480"></div>
</div>

<?php
	$row = array("ph025","2015","BITWVLF","MMXV","");
?>

<div id="new-release-info">
	<div class="release_info">
		<div>
			<span class="alignleft"><?= $row[3] ?></span>
			<span class="alignright"><?= strtoupper($row[0]).' '.$row[1] ?></span>
		</div>

		<div id="artist"><?= $row[2] ?></div>

		<div><a href="https://bitwvlf.bandcamp.com" target="_blank">→DOWNLOAD</a></div>
		<div id="main-sample" onClick="loadSoundUrl('https://soundcloud.com/scowitchboy/bitwvlf-bound-blade-remix',this);" style="cursor: pointer;">→SAMPLE</div>				
	</div>
</div>

<div id="player">
	<iframe class="iframe" width="240" height="20" scrolling="no" frameborder="no"></iframe>
</div>

<?php $csv = array_map('str_getcsv', file('releases.csv')); arsort($csv); ?>

<!-- ---------------------------------------------------------------------------------------------------- releases -->

<div id="releases">

	<?php foreach($csv as $row): ?>

		<?php if( strlen($row[0]) < 1 ) continue; ?>

		<div class="release">
			<div class="cover_image"><img src="media/releases/<?= $row[0] ?>/cover.jpg" width="240" height="240"></div>

			<div class="release_info">
				<div>
					<span class="alignleft"><?= $row[3] ?></span>
					<span class="alignright"><?= strtoupper($row[0]).' '.$row[1] ?></span>
				</div>

				<div id="artist"><?= $row[2] ?></div>

				<?php
					if( isset($row[5]) )
					{
						$download = $row[5];
						$target = "_blank";
					}
					else

					{
						$download = "media/releases/{$row[0]}/hifi.zip";
						$target = "_self";
					}

				?>

				<div><a href="<?= $download ?>" target="<?= $target ?>">→DOWNLOAD</a></div>

				<?php
					$url = $row[4];
					if( strpos($url, "http") !== 0 ) $url = 'http://soundcloud.com/philtre/' . $url;
				?>

				<div onClick="loadSoundUrl('<?= $url ?>',this);" style="cursor: pointer;">→SAMPLE</div>				
			</div>
		</div>

	<?php endforeach; ?>

</div>

<!-- ---------------------------------------------------------------------------------------------------- end releases -->

<script type="text/javascript" src="https://w.soundcloud.com/player/api.js"></script>
<script type="text/javascript">

var player = document.querySelector('#player');

var iframe = document.querySelector('.iframe');
iframe.src = location.protocol + "//w.soundcloud.com/player/?url=" + "https://soundcloud.com/scowitchboy/bitwvlf-bound-blade-remix";
var widget = SC.Widget(iframe);

var lastHidden = player;
var main_sample = document.querySelector('#main-sample');
positionPlayerOver(main_sample);

function loadSoundUrl(url,element)
{
	positionPlayerOver(element);

	var widgetOptions = {
		"liking":"true",
		"sharing":"true",
		"download":"true",
		"auto_play":"true"
	};

	widget.load(url, widgetOptions);
}

function positionPlayerOver(element)
{
	var rect = element.getBoundingClientRect()
	var scrollTop = document.documentElement.scrollTop? document.documentElement.scrollTop:document.body.scrollTop;
	var scrollLeft = document.documentElement.scrollLeft? document.documentElement.scrollLeft:document.body.scrollLeft;
	var elementTop = rect.top+scrollTop;
	var elementLeft = rect.left+scrollLeft;

	player.style.left = elementLeft;
	player.style.top = elementTop+8;

	element.style.visibility = "hidden";
	lastHidden.style.visibility = "visible";
	lastHidden = element;
}

</script>

<?php include_once("ga.php") ?>

</body>
</html>
