<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-cservices-animation'];
$animation_delay = ( $mosacademy_options['sections-cservices-animation-delay'] ) ? $mosacademy_options['sections-cservices-animation-delay'] : 0;
$title = $mosacademy_options['sections-cservices-title'];
$content = $mosacademy_options['sections-cservices-content'];
$layout = $mosacademy_options['sections-cservices-layout'];
$gap = $mosacademy_options['sections-cservices-gap'][1];
$slides = $mosacademy_options['sections-cservices-slides'];
$view = $mosacademy_options['sections-cservices-view'];
if($layout == '3') { $colsize = 4; }
elseif($layout == '4') { $colsize = 3; }
else { $colsize = 6; }
if ($colsize < 6) $smallcol = 6;
else  $smallcol = 12;
$n = 1;
$total = sizeof($slides);

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_cservices', $page_details ); 
?>
<section id="section-cservices" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_cservices hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_cservices', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>

			<div <?php if ($view == 'slider') echo 'id="section-cservices-owl" class="cservicess owl-carousel owl-theme"'; elseif ($view == 'grid') echo 'class="row cservicess"'; else echo 'class="cservicess"'; ?> >
			<?php do_action( 'action_before_cservices_loop', $page_details ); ?>

				<?php foreach ($slides as $slide) :	?>
				<div class="<?php if ($view == 'grid') echo 'col-sm-'.$smallcol.' col-md-'.$colsize; else echo 'wrapper'?><?php if ($gap) echo ' mb30'; else echo ' no-padding'?>">
					<div class="cservices-unit">
						<div class="img-part">
							<?php if ($slide['image']) : ?>
								<img class="img-responsive img-cservices-one" src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $slide['title'] )) ?>" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['height'] ?>">
							<?php endif; ?>
						</div>
						<div class="content">							
							<h3 class="cservices-section-title"><?php echo do_shortcode($slide['title']) ?></h3>
						</div>
						<a class="cservices-link" href="<?php echo do_shortcode( $slide['url'] ) ?>">View More</a>
					</div>
				</div>
				<?php if ($view == 'grid' AND $n%$layout == 0 AND $n<$total) echo '<div class="hidden-xs hidden-sm clearfix"></div>';  if ($view == 'grid' AND $n%2 == 0 AND $n<$total) echo '<div class="hidden-md hidden-lg clearfix"></div>'; $n++;?>	
				<?php endforeach;?>

			<?php do_action( 'action_after_cservices_loop' ); ?>
			</div>

		<?php 
		/*
		* action_after_cservices hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_cservices', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_cservices', $page_details  ); ?>