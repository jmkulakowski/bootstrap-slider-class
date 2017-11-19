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
 
function BootstrapSlider(options) {
	this.id = options.id;
	this.slides = options.slides;
	this.showIndicators = options.showIndicators;
	this.defaultArrows = options.defaultArrows;

	/**
	 * Build
	 * -----
	 * Builds the slider based on options provided by the user
	 */
	this.build = function() {
		// Get a reference to our slider's container and set it's attributes
		var container = document.querySelector(this.id);
		container.setAttribute('class', 'carousel slide');
		container.setAttribute('data-ride', 'carousel');

		// Build indicators container and set class
		var indicators = document.createElement('div');
		indicators.classList.add('carousel-indicators');

		// Build inner content area container and set class
		var inner = document.createElement('div');
		inner.classList.add('carousel-inner');

		// Loop through slides and build an indicator for each and a carousel
		// item for each
		for(var i = 0; i < this.slides.length; i++) {
			
			var currentSlide = this.slides[i];
			//console.log(currentSlide);

			// Create a new list element and set attributes
			var li = document.createElement('li');
			li.setAttribute('data-target', this.id);
			li.setAttribute('data-slide-to', i);

			// Add this indicator to indicators div
			indicators.appendChild(li);

			// Create a new slide item
			var item = document.createElement('div');
			item.classList.add('item');

			// Create image image link and caption, and append to this 
			// slide item
			if(currentSlide.imageURL && currentSlide.caption) {
				// Create link
				var link = document.createElement('a');
				link.href = currentSlide.link;

				// Create image
				var img = document.createElement('img');
				img.src = currentSlide.imageURL;
				img.setAttribute('alt', currentSlide.caption.title);

				// Append image to link and link to this slide item
				link.appendChild(img);
				item.appendChild(link);

				// Create Caption
				var caption = document.createElement('div');
				caption.classList.add('carousel-caption');

				// Create title
				var h3 = document.createElement('h3');
				h3.innerHTML = currentSlide.caption.title;

				// Create description
				var description= document.createElement('p');
				description.innerHTML = currentSlide.caption.description;

				// Append title and description to caption, and caption to 
				// the current slide item
				caption.appendChild(h3);
				caption.appendChild(description);
				item.appendChild(caption);
			}

			// Append this item to the inner li
			inner.appendChild(item);

		}

		// Add the indicators and inner items to the slider container
		container.appendChild(indicators);
		container.appendChild(inner);

		// Activate first indicator and first slide item
		indicators.childNodes[0].classList.add('active');
		inner.childNodes[0].classList.add('active');

		// Build the default prev/next arrows
		var prev = document.createElement('a');
		prev.setAttribute('class', 'left carousel-control');
		prev.href = this.id;
		prev.setAttribute('data-slide', 'prev');
		prev.innerHTML = '<span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span>';

		var next = document.createElement('a');
		next.setAttribute('class', 'right carousel-control');
		next.href = this.id;
		next.setAttribute('data-slide', 'next');
		next.innerHTML = '<span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span>';

		// Add the default arrows to the slider
		container.appendChild(prev);
		container.appendChild(next);

		// Conditionally hide indicators
		if(!this.showIndicators) {
			this.hideIndicators();
		}

		// Conditionally hide the default arrows
		if(!this.defaultArrows) {
			this.hideDefaultArrows();
		}

	}

	/** 
	 * Hides the slide indicators (dots)
	 */
	this.hideIndicators = function() {
		// Get a reference to our slider's container and set it's attributes
		var slider = document.querySelector(this.id);
		var indicators = slider.querySelector('.carousel-indicators');
		indicators.style.display = 'none';
	}

	/**
	 * Hide the default Bootstrap nav arrows
	 */
	this.hideDefaultArrows = function() {
		// Get a reference to our slider's container and set it's attributes
		var slider = document.querySelector(this.id);
		var prev = slider.querySelector('.left');
		prev.style.display = 'none';		

		var next = slider.querySelector('.right');
		next.style.display = 'none';
	}

	// Build the slider 
	this.build();
}