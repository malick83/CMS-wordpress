<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

if ( ! function_exists( 'educollege_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Educollege 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function educollege_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'educollege_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'educollege_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Educollege 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function educollege_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'educollege_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'educollege_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Educollege 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function educollege_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'educollege_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'educollege_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Educollege 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function educollege_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */


/**
 * Check if slider section is enabled.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[service_section_enable]' )->value() );
}


/**
 * Check if about section is enabled.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[about_section_enable]' )->value() );
}



/**
 * Check if client section is enabled.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_client_section_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[client_section_enable]' )->value() );
}


/**
 * Check if blog section is enabled.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is post.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_type]' )->value();
	return educollege_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}


/**
 * Check if blog section content type is recent.
 *
 * @since Educollege 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function educollege_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_type]' )->value();
	return educollege_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

// blog section event callbacks

function educollege_is_blog_section_event_enable( $control ) {
	return ( $control->manager->get_setting( 'educollege_theme_options[blog_event_enable]' )->value() );
}

function educollege_is_blog_section_content_post_event_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_event_type]' )->value();
	return educollege_is_blog_section_event_enable( $control ) && ( 'post' == $content_type );
}

function educollege_is_blog_section_content_page_event_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_event_type]' )->value();
	return educollege_is_blog_section_event_enable( $control ) && ( 'page' == $content_type );
}

function educollege_is_blog_section_content_category_event_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_event_type]' )->value();
	return educollege_is_blog_section_event_enable( $control ) && ( 'category' == $content_type );
}

function educollege_is_blog_section_content_event_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_event_type]' )->value();
	return educollege_is_blog_section_event_enable( $control ) && ( 'event' == $content_type );
}

function educollege_is_blog_section_content_event_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'educollege_theme_options[blog_content_event_type]' )->value();
	return educollege_is_blog_section_event_enable( $control ) && ( 'event-category' == $content_type );
}







