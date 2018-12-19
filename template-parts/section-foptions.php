<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-foptions-animation'];
$animation_delay = ( $mosacademy_options['sections-foptions-animation-delay'] ) ? $mosacademy_options['sections-foptions-animation-delay'] : 0;
$title = $mosacademy_options['sections-foptions-title'];
$content = $mosacademy_options['sections-foptions-content'];
$attachment_id = $mosacademy_options['sections-foptions-media']['id'];
$url = $mosacademy_options['sections-foptions-url'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_foptions', $page_details ); 
?>
<section id="section-foptions" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_foptions hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_foptions', $page_details ); 
		?>
		<div class="row">
			<div class="col-md-<?php if ($attachment_id) echo 6; else echo 12 ?>">
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($url) : ?>
					<a class="btn btn-finance" href="<?php echo do_shortcode( $url ) ?>">Read More</a>
				<?php endif; ?>			
			</div>
		<?php if ($attachment_id) : ?>
			<div class="col-md-6">
				<img class="img-responsive img-centered img-finance" src="<?php echo wp_get_attachment_url( $attachment_id ) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title )) ?>" width="<?php echo $mosacademy_options['sections-foptions-media']['width'] ?>" height="<?php echo $mosacademy_options['sections-foptions-media']['height'] ?>">
			</div>
		<?php endif; ?>
		</div>

		<?php 
		/*
		* action_after_foptions hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_foptions', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_foptions', $page_details  ); ?>