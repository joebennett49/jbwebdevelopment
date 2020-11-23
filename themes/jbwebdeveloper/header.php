<!DOCTYPE HTML>

<html>
<head>

	<?php wp_head(); ?>

	<!-- <link rel="icon" type="image/x-icon" href="/wp-content/themes/jbwebdevelopment/assets/img/favicon.ico" /> -->


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/db5ce81642.js" crossorigin="anonymous" SameSite="None"></script>
	<script>
	   window.FontAwesomeConfig = {
	      searchPseudoElements: true
	   }
	</script>

</head>

<body class="frontend">

<div class="menu showNav" id="burgerMenu">
	<input id="checkbox" type="checkbox" autocomplete='off'>
	<label class="checkLabel" for="checkbox"><span></span></label>
</div>

<div class="sideNav showNav">
	<a class="home" href="<?php echo get_home_url(); ?>">

		<svg class="svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 30.86 24.29" style="enable-background:new 0 0 30.86 24.29;" xml:space="preserve">
		<style type="text/css">
			.st0{fill:#1b1c2d;stroke:#1b1c2d;stroke-width:2;stroke-miterlimit:10;}
			.st1{fill:#1b1c2d;stroke:#1b1c2d;stroke-width:2;stroke-miterlimit:10;}
		</style>
		<path class="st0" d="M1.21,14.53c0,2.87-0.23,8.33,6.83,8.56s7.24-5.63,7.24-5.63V1.38h-4.54v16.08c0,0-0.4,1.84-2.5,1.84
			s-2.9-1.34-2.9-4.77C5.34,14.53,1.21,14.53,1.21,14.53z"/>
		<path class="st1" d="M27.35,20.38h-6.2v-5.67h6.2c1.29,0,2.33,1.05,2.33,2.33v1C29.69,19.33,28.64,20.38,27.35,20.38z"/>
		<path class="st1" d="M26.79,9.07h-5.64V4.09h5.64c1.14,0,2.06,0.92,2.06,2.06v0.88C28.84,8.15,27.92,9.07,26.79,9.07z"/>
		</svg>
	</a>

</div>


<div class="offCanvasMenu">
	<div class="navContainer">
		<img id="navImg" src="<?php echo get_template_directory_uri(); ?>/assets/img/nav.svg" alt="Navigate jbwebdevelopment">
		<?php
		wp_nav_menu(
		  array(
		    'theme_location' => 'primary',
		    'container_class' => 'openedMenu'
		  )
		);
		?>
	</div>
</div>


<div class="websiteContent">
	<div class="overlayContent">
	</div>
