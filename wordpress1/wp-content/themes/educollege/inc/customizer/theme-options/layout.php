<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'educollege_layout', array(
	'title'               => esc_html__('Layout','educollege'),
	'description'         => esc_html__( 'Layout section options.', 'educollege' ),
	'panel'               => 'educollege_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'educollege_theme_options[site_layout]', array(
	'sanitize_callback'   => 'educollege_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Educollege_Custom_Radio_Image_Control ( $wp_customize, 'educollege_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'educollege' ),
	'section'             => 'educollege_layout',
	'choices'			  => educollege_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'educollege_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'educollege_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Educollege_Custom_Radio_Image_Control ( $wp_customize, 'educollege_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'educollege' ),
	'section'             => 'educollege_layout',
	'choices'			  => educollege_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'educollege_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'educollege_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Educollege_Custom_Radio_Image_Control ( $wp_customize, 'educollege_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'educollege' ),
	'section'             => 'educollege_layout',
	'choices'			  => educollege_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'educollege_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'educollege_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Educollege_Custom_Radio_Image_Control( $wp_customize, 'educollege_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'educollege' ),
	'section'             => 'educollege_layout',
	'choices'			  => educollege_sidebar_position(),
) ) );