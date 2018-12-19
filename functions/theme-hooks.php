<?php

// add_action( 'action_before_footer', 'bottom_section_fnc', 10, 1 );
// function bottom_section_fnc ($page_details) {
// 	get_template_part( 'template-parts/section', 'bottom' );
// }

// add_action( 'wp_head', 'remove_theme_actions' );
// function remove_theme_actions () {
// 	remove_action( 'action_contact_page_form', 'contact_info', 5 );
// 	remove_action( 'action_contact_page_form', 'form_generator', 10 );
//     remove_action( 'action_team_archive_page', 'team_archive_page_fnc', 10 );
// }
add_action( 'action_above_header', 'child_header_fnc' );
function child_header_fnc ($page_details) {
    ?>
    <div id="hidden-header" class="container-fluid">
        <div class="row">
            <div class="col-md-3"><?php echo do_shortcode( '[site_identity]' ) ?></div>
            <div class="col-lg-3 col-lg-push-6 col-md-9"><?php echo do_shortcode( "[phone index='1']" ) ?></div>
            <div class="col-lg-6 col-lg-pull-3 col-md-12"><?php echo do_shortcode( "[mosmenu container='nav' container_class='mosmenu menu-centered' menu_class='mos-menu' location='mainmenu']" ) ?></div>
        </div>
    </div>
    <?php
}
add_action( 'init', 'child_text_layout_manager' );
function child_text_layout_manager () {
    global $mosacademy_options;
    //Custom Service
    if ($mosacademy_options['sections-cservices-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_cservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_cservices', 'start_row', 11, 1 );
        add_action( 'action_before_cservices', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_cservices', 'end_div', 10, 1 );
        add_action( 'action_after_cservices', 'end_div', 11, 1 );
        add_action( 'action_after_cservices', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-cservices-text-layout'] == 'container-fliud') {
        add_action( 'action_before_cservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_cservices', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-cservices-text-layout'] == 'container-full') {
        add_action( 'action_before_cservices', 'start_full_width', 10, 1 );
        add_action( 'action_after_cservices', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_cservices', 'start_container', 10, 1 );
        add_action( 'action_after_cservices', 'end_div', 10, 1 );
    }
    //Finance Options
    if ($mosacademy_options['sections-foptions-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_foptions', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_foptions', 'start_row', 11, 1 );
        add_action( 'action_before_foptions', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_foptions', 'end_div', 10, 1 );
        add_action( 'action_after_foptions', 'end_div', 11, 1 );
        add_action( 'action_after_foptions', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-foptions-text-layout'] == 'container-fliud') {
        add_action( 'action_before_foptions', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_foptions', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-foptions-text-layout'] == 'container-full') {
        add_action( 'action_before_foptions', 'start_full_width', 10, 1 );
        add_action( 'action_after_foptions', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_foptions', 'start_container', 10, 1 );
        add_action( 'action_after_foptions', 'end_div', 10, 1 );
    }
    //Testimonial Section
    if ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
}



