<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'educollege_reset_section', array(
	'title'             => esc_html__('Reset all settings','educollege'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'educollege' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'educollege_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'educollege_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'educollege_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'educollege' ),
	'section'           => 'educollege_reset_section',
	'type'              => 'checkbox',
) );
