<?

$str = file_get_contents('sample.json');
$json = json_decode($str);

?>

<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap for scaffolding -->
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<!-- Google Fonts --> 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300italic' rel='stylesheet' type='text/css'>
	<!-- Custom Styles -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="iso-cover" style="background-image: url('<? echo $json->background; ?>');">
		<div id="iso-coverwrapper">
			<div id="iso-title" class="iso-sans"><? echo $json->title; ?></div>
			<div id="iso-subtitle" class="iso-serif"><? echo $json->subtitle; ?></div>
		</div>
	</div>
	<div id="iso-content">
		<div class="container">
			<? $prevType = null; ?>
			<? foreach ($json->content as $contentObject) { ?>
				<? if ($contentObject->type == "heading") { ?>
					<? if ($prevType == 'strip') { ?></div><? } ?>
					<div class="iso-divider"></div>
					<div class="iso-heading iso-sans"><? echo $contentObject->content; ?></div>
				<? } elseif ($contentObject->type == "text") { ?>
					<? if ($prevType == 'strip') { ?></div><? } ?>
					<div class="iso-text iso-serif"><? echo $contentObject->content; ?></div>
				<? } elseif ($contentObject->type == "strip") { ?>
					<? if ($prevType != 'strip') { ?>  
						<div class="iso-collection">
					<? } ?>
					<div class="iso-strip row">
					<? foreach ($contentObject->photos as $photo) { ?>
						<div class="iso-photo col-sm-<? echo 12/$contentObject->count; ?>">
							<img src="<? echo $photo; ?>" />
						</div>
					<? } ?>
					</div>
				<? } ?>
				<? $prevType = $contentObject->type; ?>
			<? } ?>
		</div>
	</div>
	<div id="iso-footer" class="iso-sans">
		<div id="iso-share">
			<button>Twitter</button>
			<button>Facebook</button>
		</div>
	</div>
</body>
</html>