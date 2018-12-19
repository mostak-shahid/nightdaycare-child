<?php 
global $mosacademy_options; 
function child_gradient_manager($options) {
	$from = $options['from'];
	$to = $options['to'];
	echo 'background: '.$from.';';
	echo 'background: -moz-linear-gradient(top,  '.$from.' 0%, '.$to. ' 100%);';
	echo 'background: -webkit-linear-gradient(top,  '.$from.' 0%, '.$to. ' 100%);';
	echo 'background: linear-gradient(to bottom, '.$from.' 0%, '.$to. ' 100%);';
	echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$from.'", endColorstr="'.$to.'",GradientType=0 );';
}
function child_background_manager ($options) {
    foreach ($options as $key => $value){
		if($key != 'media' AND $value) {
			if( $key !='background-image') {
				echo $key . ':' . $value . ';';
			} else {
				echo $key . ':url(' . $value . ');';					
			}
		}
    }
}
function child_rgba_manager ($options) {
	echo 'background-color: '. $options['rgba'];
}
function child_theme_css () {
	global $mosacademy_options; 
?>
<style>
#section-cservices {<?php if ($mosacademy_options['sections-cservices-background-type'] == 1) : ?>
	<?php child_gradient_manager($mosacademy_options['sections-cservices-background-gradient'])?>
<?php elseif ($mosacademy_options['sections-cservices-background-type'] == 2) : ?>
	<?php child_background_manager($mosacademy_options['sections-cservices-background-solid'])?>
<?php elseif ($mosacademy_options['sections-cservices-background-type'] == 3 AND $mosacademy_options['sections-cservices-background-rgba']['rgba']) : ?>
	<?php child_rgba_manager($mosacademy_options['sections-cservices-background-rgba'])?>
<?php endif; ?>}
#section-foptions {<?php if ($mosacademy_options['sections-foptions-background-type'] == 1) : ?>
	<?php child_gradient_manager($mosacademy_options['sections-foptions-background-gradient'])?>
<?php elseif ($mosacademy_options['sections-foptions-background-type'] == 2) : ?>
	<?php child_background_manager($mosacademy_options['sections-foptions-background-solid'])?>
<?php elseif ($mosacademy_options['sections-foptions-background-type'] == 3 AND $mosacademy_options['sections-foptions-background-rgba']['rgba']) : ?>
	<?php child_rgba_manager($mosacademy_options['sections-foptions-background-rgba'])?>
<?php endif; ?>}
#section-testimonial {<?php if ($mosacademy_options['sections-testimonial-background-type'] == 1) : ?>
	<?php child_gradient_manager($mosacademy_options['sections-testimonial-background-gradient'])?>
<?php elseif ($mosacademy_options['sections-testimonial-background-type'] == 2) : ?>
	<?php child_background_manager($mosacademy_options['sections-testimonial-background-solid'])?>
<?php elseif ($mosacademy_options['sections-testimonial-background-type'] == 3 AND $mosacademy_options['sections-testimonial-background-rgba']['rgba']) : ?>
	<?php child_rgba_manager($mosacademy_options['sections-testimonial-background-rgba'])?>
<?php endif; ?>}
</style>
<?php
}
add_action( 'wp_head', 'child_theme_css', 999, 1 );
function child_theme_js () {
	global $mosacademy_options; 
?>
<script>
	jQuery(document).ready(function($) {
	<?php $cservices_layout = ($mosacademy_options['sections-cservices-layout']) ? $mosacademy_options['sections-cservices-layout'] : 3; ?>
		var owl_service_owl = $('#section-cservices-owl');
		owl_service_owl.owlCarousel({
		    loop: true,
		    nav: true,
		    dots: true,
		    margin: 0,	    	    
		    lazyLoad: true,
		    autoplay: true,
		    autoplayTimeout: 6000,
		    autoplayHoverPause: true,
		<?php if($cservices_layout ==1) : ?>
			items:1,
		<?php else : ?>
			responsive:{
				0: {
		    		items:1,
				},
				992: {
		    		items:2,
				},
				1200: {
		    		items:<?php echo $cservices_layout ?>,
				}
			}
		<?php endif; ?>
		});	

	});
</script>
	<?php
}
add_action( 'wp_footer', 'child_theme_js', 998, 1 );