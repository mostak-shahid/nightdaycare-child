<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-testimonial-animation'];
$animation_delay = ( $mosacademy_options['sections-testimonial-animation-delay'] ) ? $mosacademy_options['sections-testimonial-animation-delay'] : 0;
$title = $mosacademy_options['sections-testimonial-title'];
$content = $mosacademy_options['sections-testimonial-content'];
$attachment_id = $mosacademy_options['sections-testimonial-media']['id'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_testimonial hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_testimonial', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
			<div class="row">
				<div class="col-md-4 col-md-push-8">
					<?php
					$img_url = wp_get_attachment_url( $attachment_id );
					list($width, $height) = getimagesize($img_url);
					?>
					<img class="img-responsive img-centered img-testimonial" src="<?php echo $img_url; ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title )) ?>" width="<?php echo $width ?>" height="<?php echo $height ?>">
				</div>
				<div class="col-md-8 col-md-pull-4">
					<?php if ($content) : ?>				
						<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>					
				</div>
			</div>

		<?php 
		/*
		* action_after_testimonial hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_testimonial', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details  ); ?>