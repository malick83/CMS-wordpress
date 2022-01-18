<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'educollege_pagination', array(
	'title'               => esc_html__('Pagination','educollege'),
	'description'         => esc_html__( 'Pagination section options.', 'educollege' ),
	'panel'               => 'educollege_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'educollege_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'educollege_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'educollege' ),
	'section'             => 'educollege_pagination',
	'on_off_label' 		=> educollege_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'educollege_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'educollege_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'educollege_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'educollege' ),
	'section'             => 'educollege_pagination',
	'type'                => 'select',
	'choices'			  => educollege_pagination_options(),
	'active_callback'	  => 'educollege_is_pagination_enable',
) );
