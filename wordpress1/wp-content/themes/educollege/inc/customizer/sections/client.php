<?php
/**
 * Client Section options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */
// Add client Collection section
$wp_customize->add_section( 'educollege_client_section', array(
    'title'             => esc_html__( 'Client','educollege' ),
    'description'       => esc_html__( 'Client Section options.', 'educollege' ),
    'panel'             => 'educollege_front_page_panel',
) );

// client content enable control and setting
$wp_customize->add_setting( 'educollege_theme_options[client_section_enable]', array(
    'default'           =>  $options['client_section_enable'],
    'sanitize_callback' => 'educollege_sanitize_switch_control',
) );

$wp_customize->add_control( new Educollege_Switch_Control( $wp_customize, 'educollege_theme_options[client_section_enable]', array(
    'label'             => esc_html__( 'client Section Enable', 'educollege' ),
    'section'           => 'educollege_client_section',
    'on_off_label'      => educollege_switch_options(),
) ) );


for ($i=1; $i <= 4 ; $i++) :
    // client pages drop down chooser control and setting
    $wp_customize->add_setting( 'educollege_theme_options[client_content_page_' . $i . ']', array(
        'sanitize_callback' => 'educollege_sanitize_page',
    ) );

    $wp_customize->add_control( new Educollege_Dropdown_Chooser( $wp_customize, 'educollege_theme_options[client_content_page_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Page %d', 'educollege' ), $i ),
        'section'           => 'educollege_client_section',
        'choices'           => educollege_page_choices(),
        'active_callback'   => 'educollege_is_client_section_enable',
    ) ) );

    $wp_customize->add_setting( 'educollege_theme_options[client_hr_'. $i .']', array(
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Educollege_Customize_Horizontal_Line( $wp_customize, 'educollege_theme_options[client_hr_'. $i .']',
        array(
            'section'           => 'educollege_client_section',
            'active_callback'   => 'educollege_is_client_section_enable',
            'type'            => 'hr'
    ) ) );

endfor;



        