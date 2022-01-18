<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'educollege_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'educollege' ),
		'priority'   			=> 900,
		'panel'      			=> 'educollege_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'educollege_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'educollege_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'educollege_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'educollege' ),
		'section'    			=> 'educollege_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'educollege_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'educollege_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'educollege_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'educollege_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'educollege_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'educollege' ),
		'section'    			=> 'educollege_section_footer',
		'on_off_label' 		=> educollege_switch_options(),
    )
) );

$wp_customize->add_setting( 'educollege_theme_options[footer_social_enable]', array(
	'default'			=> 	$options['footer_social_enable'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[footer_social_enable]', array(
	'label'             => esc_html__( 'Social Menu Enable', 'educollege' ),
	'section'           => 'educollege_section_footer',
	'on_off_label' 		=> educollege_switch_options(),
) ) );
