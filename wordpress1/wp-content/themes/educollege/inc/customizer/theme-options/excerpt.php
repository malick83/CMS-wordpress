<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'educollege_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','educollege' ),
	'description'       => esc_html__( 'Excerpt section options.', 'educollege' ),
	'panel'             => 'educollege_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'educollege_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'educollege_sanitize_number_range',
	'validate_callback' => 'educollege_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'educollege_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'educollege' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'educollege' ),
	'section'     		=> 'educollege_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
