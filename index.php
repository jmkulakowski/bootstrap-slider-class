<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Bootstrap Slider</title>
	<meta name="description" content="Bootstrap Slider">
	<meta name="author" content="Jim Kulakowski">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
	<!-- Import Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Import jQuery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<!-- Import Bootstrap Javascript -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<!-- HTML -->
<body>

	<!-- Javascript Boostrap Carousel --> 
	<div id="newCarousel"></div>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="build/BootstrapSlider.js" type="text/javascript"></script>
	<script>
		// Create Bootstrap slider
		var slider = new BootstrapSlider({
			id: '#newCarousel',
			showIndicators: true,
			defaultArrows: true,
			slides: [
				{
					imageURL: 'img/la.jpg',
					link: '#la',
					caption: {
						title: 'Los Angeles',
						description: 'LA is always so much fun!',
					}
				},
				{
					imageURL: 'img/ny.jpg',
					link: '#ny',
					caption: {
						title: 'New York',
						description: 'NY is always so much fun!',
					}
				},
				{
					imageURL: 'img/chicago.jpg',
					link: '#chicago',
					caption: {
						title: 'Chicago',
						description: 'Chicago is always so much fun!',
					}
				}
			]
		});
	</script>

	<!-- PHP Boostrap Carousel -->
	<?php 
	// Import the BootstrapSlider class
	include 'build/BootstrapSlider.php';

	// Setup slider options
	$args = array(
		'id' => 'mySlider',
		'showIndicators' => true,
		'defaultArrows' => true,
		'slides' => array(
			'Los Angeles' => array(
				'link' => '#la',
				'imageURL'	=>	'img/la.jpg',
				'caption' => 'LA is always so much fun!',
			), 
			'New York' => array(
				'link' => '#ny',
				'imageURL'	=>	'img/ny.jpg',
				'caption' => 'NY is always so much fun!',
			), 
			'Chicago' => array (
				'link' => '#chicago',
				'imageURL'	=>	'img/chicago.jpg',
				'caption' => 'Chicago is always so much fun!',
			),
		),
	);

	// Build a new slider with options
	$slider = new BootstrapSlider($args);
	//var_dump($slider);
	?>

</body>