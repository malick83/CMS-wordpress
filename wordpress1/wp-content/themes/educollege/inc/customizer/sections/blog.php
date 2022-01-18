<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'educollege_blog_section', array(
	'title'             => esc_html__( 'Blog','educollege' ),
	'description'       => esc_html__( 'Blog Section options.', 'educollege' ),
	'panel'             => 'educollege_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'educollege_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'educollege' ),
	'section'           => 'educollege_blog_section',
	'on_off_label' 		=> educollege_switch_options(),
) ) );




// blog title setting and control
$wp_customize->add_setting( 'educollege_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'educollege_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'educollege' ),
	'section'        	=> 'educollege_blog_section',
	'active_callback' 	=> 'educollege_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'educollege_theme_options[blog_title]', array(
		'selector'            => '.blog h2',
		'settings'            => 'educollege_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'educollege_blog_title_partial',
    ) );
}



// Event social icons number control and setting
$wp_customize->add_setting( 'educollege_theme_options[blog_count]', array(
	'default'          	=> $options['blog_count'],
	'sanitize_callback' => 'educollege_sanitize_number_range',
	'validate_callback' => 'educollege_validate_blog_count',
) );

$wp_customize->add_control( 'educollege_theme_options[blog_count]', array(
	'label'             => esc_html__( 'Number of Posts', 'educollege' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'educollege' ),
	'section'           => 'educollege_blog_section',
	'active_callback'   => 'educollege_is_blog_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		'style' => 'width: 100px;'
		),
) );

// Blog content type control and setting
$wp_customize->add_setting( 'educollege_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'educollege_sanitize_select',
) );

$wp_customize->add_control( 'educollege_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'educollege' ),
	'section'           => 'educollege_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'educollege_is_blog_section_enable',
	'choices'			=> array( 
		'post' 		=> esc_html__( 'Post', 'educollege' ),
		'recent' 	=> esc_html__( 'Recent', 'educollege' ),
	),
) );


for ( $i = 1; $i <= $options['blog_count']; $i++ ) :

	// blog posts drop down chooser control and setting
	$wp_customize->add_setting( 'educollege_theme_options[blog_content_post_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[blog_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'educollege' ), $i ),
		'section'           => 'educollege_blog_section',
		'choices'			=> educollege_post_choices(),
		'active_callback'	=> 'educollege_is_blog_section_content_post_enable',
	) ) );
endfor;


// Add dropdown categories setting and control.
$wp_customize->add_setting( 'educollege_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'educollege_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Educollege_Dropdown_Category_Control( $wp_customize,'educollege_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'educollege' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'educollege' ),
	'section'           => 'educollege_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'educollege_is_blog_section_content_recent_enable'
) ) );

if ( class_exists('TP_Education') ) {
	// Blog content enable control and setting
	$wp_customize->add_setting( 'educollege_theme_options[blog_event_enable]', array(
		'default'			=> 	$options['blog_event_enable'],
		'sanitize_callback' => 'educollege_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[blog_event_enable]', array(
		'label'             => esc_html__( 'Enable Events', 'educollege' ),
		'section'           => 'educollege_blog_section',
		'active_callback'	=>'educollege_is_blog_section_enable',
		'on_off_label' 		=> educollege_switch_options(),
	) ) );
	// blog sub title setting and control
	$wp_customize->add_setting( 'educollege_theme_options[blog_event_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['blog_event_title'],
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'educollege_theme_options[blog_event_title]', array(
		'label'           	=> esc_html__( 'Event Title', 'educollege' ),
		'section'        	=> 'educollege_blog_section',
		'active_callback' 	=> 'educollege_is_blog_section_event_enable',
		'type'				=> 'text',
	) );

	// Abort if selective refresh is not available.
	if ( isset( $wp_customize->selective_refresh ) ) {
	    $wp_customize->selective_refresh->add_partial( 'educollege_theme_options[blog_event_title]', array(
			'selector'            => '.event h2',
			'settings'            => 'educollege_theme_options[blog_event_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'educollege_blog_event_title_partial',
	    ) );
	}

	$wp_customize->add_setting( 'educollege_theme_options[blog_event_count]', array(
		'default'          	=> $options['blog_event_count'],
		'sanitize_callback' => 'educollege_sanitize_number_range',
		'validate_callback' => 'educollege_validate_blog_event_count',
	) );

	$wp_customize->add_control( 'educollege_theme_options[blog_event_count]', array(
		'label'             => esc_html__( 'Number of Posts', 'educollege' ),
		'description'       => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'educollege' ),
		'section'           => 'educollege_blog_section',
		'active_callback'   => 'educollege_is_blog_section_event_enable',
		'type'				=> 'number',
		'input_attrs'		=> array(
			'min'	=> 1,
			'max'	=> 12,
			'style' => 'width: 100px;'
			),
	) );
	// Blog content type control and setting
	$wp_customize->add_setting( 'educollege_theme_options[blog_content_event_type]', array(
		'sanitize_callback' => 'educollege_sanitize_select',
		'default'			=> $options['blog_content_event_type']
	) );

	$wp_customize->add_control( 'educollege_theme_options[blog_content_event_type]', array(
		'label'             => esc_html__( 'Blog Event Type', 'educollege' ),
		'section'           => 'educollege_blog_section',
		'type'				=> 'select',
		'active_callback' 	=> 'educollege_is_blog_section_event_enable',
		'choices'			=> educollege_popular_event_content_type(),
	) );

	for ( $i = 1; $i <= $options['blog_event_count']; $i++ ) :

	$wp_customize->add_setting( 'educollege_theme_options[blog_content_event_post_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[blog_content_event_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'educollege' ), $i ),
		'section'           => 'educollege_blog_section',
		'choices'			=> educollege_post_choices(),
		'active_callback'	=> 'educollege_is_blog_section_content_post_event_enable',
	) ) );

	$wp_customize->add_setting( 'educollege_theme_options[blog_content_event_page_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[blog_content_event_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'educollege' ), $i ),
		'section'           => 'educollege_blog_section',
		'choices'			=> educollege_page_choices(),
		'active_callback'	=> 'educollege_is_blog_section_content_page_event_enable',
	) ) );


	// blog pages drop down chooser control and setting
	$wp_customize->add_setting( 'educollege_theme_options[blog_content_event_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[blog_content_event_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Event %d', 'educollege' ), $i ),
		'section'           => 'educollege_blog_section',
		'choices'			=> educollege_event_choices(),
		'active_callback'	=> 'educollege_is_blog_section_content_event_enable',
	) ) );

	endfor;

	$wp_customize->add_setting(  'educollege_theme_options[blog_content_event_section_category]', array(
		'sanitize_callback' => 'educollege_sanitize_single_category',
	) ) ;

	$wp_customize->add_control( new Educollege_Dropdown_Taxonomies_Control( $wp_customize,'educollege_theme_options[blog_content_event_section_category]', array(
		'label'             => esc_html__( 'Select Category', 'educollege' ),
		'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'educollege' ),
		'section'           => 'educollege_blog_section',
		'type'              => 'dropdown-taxonomies',
		'active_callback'	=> 'educollege_is_blog_section_content_category_event_enable'
	) ) );

	// Add dropdown category setting and control.
	$wp_customize->add_setting(  'educollege_theme_options[blog_content_event_category]', array(
		'sanitize_callback' => 'absint',
	) ) ;

	$wp_customize->add_control( new Educollege_Dropdown_Taxonomies_Control( $wp_customize,'educollege_theme_options[blog_content_event_category]', array(
		'label'             => esc_html__( 'Select Category', 'educollege' ),
		'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'educollege' ),
		'section'           => 'educollege_blog_section',
		'type'              => 'dropdown-taxonomies',
		'taxonomy'			=> 'tp-event-category',
		'active_callback'	=> 'educollege_is_blog_section_content_event_category_enable'
	) ) );

}

