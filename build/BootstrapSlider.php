<?php 
/** 
 * ----------------
 * Bootstrap Slider 
 * ----------------
 * Author: Jim Kulakowski
 * Author URI: http://jimkulakowski.com
 * Date: 09-26-17
 * Description: A custom class that allows a user to quickly build a Bootstrap
 * Carousel with easy to configure options
 */

class BootstrapSlider {

	/**
	 * Constructor
	 * -----------
	 * Accepts an array() (object) as an argument with the following 
	 * properties:
	 *    'id' => 'string',
	 *    'showIndicators' => bool,
	 *    'defaultArrows' => bool,
	 *    'slides' => array(
	 *        'Title' => array(
	 *            'link' => 'string',
	 *            'imageURL' => 'string',
	 *            'caption' => 'string'
	 *        ),
	 *        ... (add as many slides as you want)
	 *    );
	 */
	public function __construct($options) {
        foreach($options as $key => $value) {
            $this->$key = $value;
        }
        $this->build();
	}

	/** 
	 * Build
	 * -----
	 * Internal function that uses passed arguments to build a Bootstrap
	 * carousel
	 */
	private function build() {

		$carousel = '';

		$carousel .= '<link rel="stylesheet" href="./css/style.css">';

		// Echo the beginning tags for the Bootstrap Carousel
		$carousel .= '<div id="' . $this->id . '" class="carousel slide" data-ride="carousel">';

		// Build Bootstrap indicators (navigation dots)
		if($this->showIndicators) {
			$carousel .= '<ul class="carousel-indicators">';

			// Loop through each slide in arguments and create indicator (dot)
			// for each slide
			$index = 0;
			foreach($this->slides as $slide) {
				$carousel .= '<li class="';
				if($index === 0) {
					$carousel .= 'active';
				}
				$carousel .= '" data-slide-to="' . $index . '" data-target="#' . $this->id . '"></li>';
				$index++;
			}

			$carousel .= '</ul>';
		}

		// Build Slides
		if($this->slides) {
			$carousel .= '<div class="carousel-inner">';

			// Loop through each slide and add details - img, title, etc.
			$index = 0;
			foreach($this->slides as $title => $details) {
				$carousel .= '<div class="item '; 
				if($index === 0) {
					$carousel .= 'active '; 
				}
				$carousel .= 'left"><a href="' . $details['link'] . '"><img src="' . $details['imageURL'] . '" alt="' . $title . '" /></a>';

				$carousel .= '<div class="carousel-caption"><h3>' . $title . '</h3><p>' . $details['caption'] . '</p></div>';
				$carousel .= '</div>';
				$index++;
			}

			$carousel .= '</div>';
		}

		// Build stock left and right Bootstrap arrows
		if($this->defaultArrows) {
			$carousel .= '<a class="left carousel-control" data-slide="prev" href="#' . $this->id . '"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" data-slide="next" href="#' . $this->id . '"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>';
		}

		// End tag for Bootstrap Carousel
		$carousel .= '</div>';

		// Print the carousel
		echo $carousel;

	}

}

?>