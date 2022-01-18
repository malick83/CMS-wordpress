<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'educollege_slider_section', array(
	'title'             => esc_html__( 'Main Slider','educollege' ),
	'description'       => esc_html__( 'Slider Section options.', 'educollege' ),
	'panel'             => 'educollege_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'educollege_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'educollege' ),
	'section'           => 'educollege_slider_section',
	'on_off_label' 		=> educollege_switch_options(),
) ) );


// Slider btn label setting and control
$wp_customize->add_setting( 'educollege_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
) );

$wp_customize->add_control( 'educollege_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'educollege' ),
	'section'        	=> 'educollege_slider_section',
	'active_callback' 	=> 'educollege_is_slider_section_enable',
	'type'				=> 'text',
) );


for ( $i = 1; $i <= 4; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'educollege_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'educollege' ), $i ),
		'section'           => 'educollege_slider_section',
		'choices'			=> educollege_page_choices(),
		'active_callback'	=> 'educollege_is_slider_section_enable',
	) ) );

endfor;

