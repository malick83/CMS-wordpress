<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'educollege_menu', array(
	'title'             => esc_html__('Header Menu','educollege'),
	'description'       => esc_html__( 'Header Menu options.', 'educollege' ),
	'panel'             => 'nav_menus',
) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'educollege_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'educollege_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'educollege' ),
	'section'           => 'educollege_menu',
	'on_off_label' 		=> educollege_switch_options(),
) ) );

// search enable setting and control.
$wp_customize->add_setting( 'educollege_theme_options[social_nav_enable]', array(
	'sanitize_callback' => 'educollege_sanitize_switch_control',
	'default'           => $options['social_nav_enable'],
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[social_nav_enable]', array(
	'label'             => esc_html__( 'Enable Social Links', 'educollege' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'educollege' ), esc_html__( 'Click Here', 'educollege' ), esc_html__( 'to create menu', 'educollege' ) ),
	'section'           => 'educollege_menu',
	'on_off_label' 		=> educollege_switch_options(),
) ) );
