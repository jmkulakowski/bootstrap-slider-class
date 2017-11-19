# bootstrap-slider-class
Instantly create Bootstrap carousels/sliders with a few lines of code. (JS and PHP versions)

# examples

## JS
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


## PHP
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
