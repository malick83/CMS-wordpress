<?php
/**
 * service Section options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

// Add service section
$wp_customize->add_section( 'educollege_service_section', array(
	'title'             => esc_html__( 'Service','educollege' ),
	'description'       => esc_html__( 'Service Section options.', 'educollege' ),
	'panel'             => 'educollege_front_page_panel',
) );

// service content enable control and setting
$wp_customize->add_setting( 'educollege_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'educollege' ),
	'section'           => 'educollege_service_section',
	'on_off_label' 		=> educollege_switch_options(),
) ) );

// service title setting and control
$wp_customize->add_setting( 'educollege_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'educollege_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'educollege' ),
	'section'        	=> 'educollege_service_section',
	'active_callback' 	=> 'educollege_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'educollege_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2',
		'settings'            => 'educollege_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'educollege_service_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'educollege_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'educollege_sanitize_page',
	) );

	$wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'educollege' ), $i ),
		'section'           => 'educollege_service_section',
		'choices'			=> educollege_page_choices(),
		'active_callback'	=> 'educollege_is_service_section_enable',
	) ) );


	$wp_customize->add_setting( 'educollege_theme_options[service_content_icon_' . $i . ']', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'			=> $options['service_content_icon_'.$i ],
    ) );

    $wp_customize->add_control( new Educollege_Icon_Picker( $wp_customize, 'educollege_theme_options[service_content_icon_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Icon %d', 'educollege' ), $i ),
        'section'           => 'educollege_service_section',
        'active_callback'   => 'educollege_is_service_section_enable',
    ) ) );

    $wp_customize->add_setting( 'educollege_theme_options[service_hr_'. $i .']', array(
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Educollege_Customize_Horizontal_Line( $wp_customize, 'educollege_theme_options[service_hr_'. $i .']',
        array(
            'section'           => 'educollege_service_section',
            'active_callback'   => 'educollege_is_service_section_enable',
            'type'            => 'hr'
    ) ) );
endfor;