<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'educollege_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','educollege' ),
	'description'       => esc_html__( 'Archive section options.', 'educollege' ),
	'panel'             => 'educollege_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'educollege_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'educollege_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'educollege' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'educollege' ),
	'section'           => 'educollege_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'educollege_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'educollege_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'educollege' ),
	'section'           => 'educollege_archive_section',
	'on_off_label' 		=> educollege_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'educollege_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'educollege' ),
	'section'           => 'educollege_archive_section',
	'on_off_label' 		=> educollege_hide_options(),
) ) );
