<?php
global $mosacademy_options;
$address_link = ( $mosacademy_options['contact-address'][0]['map_link'] ) ? $mosacademy_options['contact-address'][0]['map_link'] : 'javascript:void(0)';
$attachment_id = $mosacademy_options['contact-address'][0]['attachment_id'];
$title = $mosacademy_options['contact-address'][0]['title'];
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
?>
<div class="visible-lg">
	<?php 
	$img_url = wp_get_attachment_url( $attachment_id );
	list($width, $height) = getimagesize($img_url);
	 ?>
	<a href="<?php echo $address_link ?>"><img class="img-responsive img-map" src="<?php echo $img_url ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title ))?>" width="<?php echo $width ?>" height="<?php echo $height ?>"></a>
</div>
<div class="visible-md">
	<a href="<?php echo $address_link ?>"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 1200, 400, true) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title ))?>" width="1200" height="400"></a>
</div>
<div class="visible-sm">
	<a href="<?php echo $address_link ?>"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 992, 400, true) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title ))?>" width="992" height="400"></a>
</div>
<div class="visible-xs">
	<a href="<?php echo $address_link ?>"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 768, 400, true) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $title ))?>" width="768" height="400"></a>
</div>