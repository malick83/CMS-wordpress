<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

$wp_customize->add_section( 'educollege_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','educollege' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'educollege' ),
	'panel'             => 'educollege_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'educollege_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'educollege_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'educollege' ),
	'section'          	=> 'educollege_breadcrumb',
	'on_off_label' 		=> educollege_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'educollege_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'educollege_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'educollege' ),
	'active_callback' 	=> 'educollege_is_breadcrumb_enable',
	'section'          	=> 'educollege_breadcrumb',
) );
