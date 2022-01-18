<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 * @return array An array of default values
 */

function educollege_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$educollege_default_options = array(
		// Color Options
		'header_title_color'			=> '#2c2d39',
		'header_tagline_color'			=> '#990f12',
		'header_txt_logo_extra'			=> 'show-all',
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'social_nav_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'educollege' ), '[the-year]', '[site-link]' ),
		'footer_social_enable'			=> true,
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,service,about,blog,client',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'educollege' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		'nav_search_enable'				=> true,
		
		// slider search
		'slider_section_enable'			=> false,
		'slider_title'					=> esc_html__( 'Are you ready to join', 'educollege' ),
		'slider_btn_label'				=> esc_html__( 'Learn More', 'educollege' ),


		//service 
		'service_section_enable'		=> false,		
		'service_title'					=> esc_html__( 'Welcome To Educollege', 'educollege' ),		
		'service_content_icon_1'		=> esc_html__( 'fa-mortar-board', 'educollege' ),
		'service_content_icon_2'		=> esc_html__( 'fa-user', 'educollege' ),
		'service_content_icon_3'		=> esc_html__( 'fa-book', 'educollege' ),

		//about 
		'about_section_enable'		=> false,
		'about_title'				=> esc_html__( 'About Us', 'educollege' ),
		'about_description'			=> esc_html__( 'Get know about us', 'educollege' ),
		'about_btn_title'			=> esc_html__( 'Learn More', 'educollege' ),

					
		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'post',
		'blog_event_enable'				=> false,
		'blog_count'					=> 3,
		'blog_title'					=> esc_html__( 'Latest News', 'educollege' ),
		'blog_btn_title'				=> esc_html__( 'View All Articles', 'educollege' ),
		'blog_event_title'				=> esc_html__( 'Upcoming Events', 'educollege' ),
		'blog_event_btn_title'			=> esc_html__( 'View All Events', 'educollege' ),
		'blog_event_count'				=> 3,
		'blog_content_event_type'		=> 'page',
	

		// client
		'client_section_enable'			=> false,

	);

	$output = apply_filters( 'educollege_default_theme_options', $educollege_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}