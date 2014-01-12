<!doctype html>
<html lang="en">
<head>
	<title>New Post</title>
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
	<div id="iso-cover">
		<div id="iso-coverwrapper">
			<div id="iso-title" class="iso-sans">New Title</div>
			<div id="iso-subtitle" class="iso-serif">New Subtitle</div>
		</div>
	</div>
	<div id="iso-content">
		<div class="container">
			<div id="iso-addcontent">+</div>
			<div class="iso-strip row">
				<div class="col-xs-3"><div class="iso-addphoto">+</div></div>
				<div class="col-xs-3"><div class="iso-addphoto">+</div></div>
				<div class="col-xs-3"><div class="iso-addphoto">+</div></div>
				<div class="col-xs-3"><div class="iso-addphoto">+</div></div>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			// Dynamically set height of photo divs
			var width = $('.iso-addphoto').css('width');
			$('.iso-addphoto').css('min-height', width);
		});
		$('#iso-addcontent').click(function() {

		});
	</script>
</body>
</html>
