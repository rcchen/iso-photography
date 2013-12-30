<?php
$str = file_get_contents('sample.json');
$json = json_decode($str);
?>
<!doctype html>
<html lang="en">
<head>
	<title><?php echo $json->title; ?></title>
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-31716187-2', 'rogr.me');
	  ga('send', 'pageview');

	</script>
	<div id="iso-cover" style="background-image: url('<?php echo $json->background; ?>');">
		<div id="iso-coverwrapper">
			<div id="iso-title" class="iso-sans"><?php echo $json->title; ?></div>
			<div id="iso-subtitle" class="iso-serif"><?php echo $json->subtitle; ?></div>
		</div>
	</div>
	<div id="iso-content">
		<div class="container">
			<?php $prevType = null; ?>
			<?php foreach ($json->content as $contentObject) { ?>
				<?php if ($contentObject->type == "heading") { ?>
					<?php if ($prevType == 'strip') { ?></div><?php } ?>
					<?php if ($prevType != null) { ?><div class="iso-divider"></div><?php } ?>
					<div class="iso-heading iso-sans"><?php echo $contentObject->content; ?></div>
				<?php } elseif ($contentObject->type == "text") { ?>
					<?php if ($prevType == 'strip') { ?></div><?php } ?>
					<div class="iso-text iso-serif"><?php echo $contentObject->content; ?></div>
				<?php } elseif ($contentObject->type == "strip") { ?>
					<?php if ($prevType != 'strip') { ?>  
						<div class="iso-collection">
					<?php } ?>
					<div class="iso-strip row">
					<?php foreach ($contentObject->photos as $photo) { ?>
						<div class="iso-photo col-sm-<?php echo 12/$contentObject->count; ?>">
							<img src="<?php echo $photo; ?>" />
						</div>
					<?php } ?>
					</div>
				<?php } ?>
				<?php $prevType = $contentObject->type; ?>
			<?php } ?>
		</div>
	</div>
	<div id="iso-footer" class="iso-sans">
		<!-- <div id="iso-share">
			<button>Twitter</button>
			<button>Facebook</button>
		</div> -->
		<div id="iso-signup" class="iso-sans">
			Want to share your adventure? Sign up to be notified when Iso enters public beta.
			<form action="/hitting-the-road" id="signup">
				<input type="text" name="email" placeholder="Email address">
				<input type="submit" value="Sign up">
			</form>
		</div>
		<div id="iso-opensource" class="iso-sans">
			<a href="https://www.github.com/rcchen/iso-photography">Github</a>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script>
	$('#signup').submit(function(event) {
		event.preventDefault();
		var $form = $(this),
			emailAddr = $form.find("input[name='email']").val(),
			url = $form.attr("action");
		var posting = $.post(url, { email: emailAddr});
		posting.done(function(data) {
			console.log(data);
			$('#iso-signup').empty().append(data);
		});
	});
	</script>
</body>
</html>
