<?php
function add_dumketo_theme_functions($sections){
    global $container_list, $animations, $section_list, $bootstrap_grids, $col_ratio;
    $page_sections = array_diff($section_list,array('banner' => 'Banner Section', 'welcome' => 'Welcome Section'));

    // $sections[] = array(
    //     'title'            => __( 'Child theme', 'redux-framework-demo' ),
    //     'id'               => 'child-theme',
    //     'desc'             => '',
    //     'customizer_width' => '400px',
    //     'icon'             => 'el el-move'
    // );
    $sections[] = array(
        'title'            => __( 'Custom Service', 'redux-framework-demo' ),
        'id'               => 'sections-cservices',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-cservices-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-cservices-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cservices .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),
            array(
                'id'             => 'sections-cservices-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cservices .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-cservices-border',
                'type'     => 'border',
                'title'    => __( 'Custom Service Border', 'redux-framework-demo' ),
                'output'   => array( '#section-cservices .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-cservices-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-cservices-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-cservices-title',
                'type'     => 'text',
                'title'    => __( 'Custom Service Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-cservices-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),

            array(
                'id'          => 'sections-cservices-slides',
                'type'        => 'slides',
                'title'       => __( 'Slider Details', 'redux-framework-demo' ),
                'subtitle'    => __( 'Use large images (Max Width 1920px) for best results.', 'redux-framework-demo' ),              
                'show' => array(
                    'title' => true,
                    'description' => false,
                    'url' => true              // <<========= that is what was asked at the top.
                ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework-demo' ),
                    'description' => __( 'Description Here', 'redux-framework-demo' ),
                    'url'         => __( 'Give us a link!', 'redux-framework-demo' ),
                ),
            ),
            array(
                'id'       => 'sections-cservices-layout',
                'type'     => 'image_select',
                'title'    => __( 'Service Layout', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1-col-portfolio.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/2-col-portfolio.png'
                    ),
                    '3' => array(
                        'alt' => '3 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'
                    ),
                    '4' => array(
                        'alt' => '4 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'
                    )
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'sections-cservices-view',
                'type'     => 'select',
                'title'    => __( 'Service View', 'redux-framework-demo' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'grid' => 'Grid',
                    'slider' => 'Slider',                    
                ),
                'default'  => 'grid'
            ), 
            array(
                'id'       => 'sections-cservices-gap',
                'type'     => 'checkbox',
                'title'    => __( 'Grid Spacing', 'redux-framework-demo' ),                
                'options'  => array(
                    '1' => 'Yes I like to use gap between grids.',
                ),
            ), 
            array(
                'id'       => 'sections-cservices-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Service Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-cservices-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-cservices-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Custom Service Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-cservices-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-cservices-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Custom Service Background', 'redux-framework-demo' ),
                'required' => array( 'sections-cservices-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-cservices-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Custom Service Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-cservices-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-cservices-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    $sections[] = array(
        'title'            => __( 'Finance Options', 'redux-framework-demo' ),
        'id'               => 'sections-foptions',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-foptions-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-foptions-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-foptions .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),
            array(
                'id'             => 'sections-foptions-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-foptions .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-foptions-border',
                'type'     => 'border',
                'title'    => __( 'Finance Options Border', 'redux-framework-demo' ),
                'output'   => array( '#section-foptions .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-foptions-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-foptions-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-foptions-title',
                'type'     => 'text',
                'title'    => __( 'Finance Options Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-foptions-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-foptions-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Section Content', 'redux-framework-demo' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'sections-foptions-url',
                'type'     => 'text',
                'title'    => __( 'Read More Link', 'redux-framework-demo' ),
                'subtitle' => __( 'All HTML will be stripped', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'validate' => 'no_html',
            ),             
            array(
                'id'       => 'sections-foptions-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Service Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-foptions-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-foptions-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Finance Options Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-foptions-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-foptions-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Finance Options Background', 'redux-framework-demo' ),
                'required' => array( 'sections-foptions-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-foptions-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Custom Service Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-foptions-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-foptions-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    );
    $sections[] = array(
        'title'            => __( 'Testimonial Section', 'redux-framework-demo' ),
        'id'               => 'sections-testimonial',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-testimonial-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-testimonial-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-testimonial-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-testimonial-border',
                'type'     => 'border',
                'title'    => __( 'Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-testimonial .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-testimonial-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-testimonial-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-testimonial-title',
                'type'     => 'text',
                'title'    => __( 'Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-testimonial-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),            
            array(
                'id'       => 'sections-testimonial-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Section Media', 'redux-framework-demo' ),
                'compiler' => 'true'
            ),

            array(
                'id'       => 'sections-testimonial-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-testimonial-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-testimonial-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-testimonial-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-testimonial-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-testimonial-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-testimonial-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    return $sections;
}
add_filter("redux/options/mosacademy_options/sections", 'add_dumketo_theme_functions');