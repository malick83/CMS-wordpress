<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Educollege
* @since Educollege 1.0.0
*/


// Service Section
if ( ! function_exists( 'educollege_service_title_partial' ) ) :
    // popular destination title
    function educollege_service_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'educollege_service_sub_title_partial' ) ) :
    // popular destination title
    function educollege_service_sub_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['service_sub_title'] );
    }
endif;

if ( ! function_exists( 'educollege_about_title_partial' ) ) :
    // popular destination title
    function educollege_about_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'educollege_about_description_partial' ) ) :
    // popular destination title
    function educollege_about_description_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['about_description'] );
    }
endif;

if ( ! function_exists( 'educollege_about_btn_title_partial' ) ) :
    // popular destination title
    function educollege_about_btn_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'educollege_course_title_partial' ) ) :
    // popular destination title
    function educollege_course_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['course_title'] );
    }
endif;

if ( ! function_exists( 'educollege_course_sub_title_partial' ) ) :
    // popular destination title
    function educollege_course_sub_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['course_sub_title'] );
    }
endif;

if ( ! function_exists( 'educollege_course_btn_title_partial' ) ) :
    // popular destination title
    function educollege_course_btn_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['course_btn_title'] );
    }
endif;

if ( ! function_exists( 'educollege_blog_title_partial' ) ) :
    // popular destination title
    function educollege_blog_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'educollege_blog_btn_title_partial' ) ) :
    // popular destination title
    function educollege_blog_btn_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['blog_btn_title'] );
    }
endif;

if ( ! function_exists( 'educollege_blog_event_title_partial' ) ) :
    // popular destination title
    function educollege_blog_event_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['blog_event_title'] );
    }
endif;

if ( ! function_exists( 'educollege_blog_event_btn_title_partial' ) ) :
    // popular destination title
    function educollege_blog_event_btn_title_partial() {
        $options = educollege_get_theme_options();
        return esc_html( $options['blog_event_btn_title'] );
    }
endif;



