<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function educollege_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'educollege' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function educollege_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'educollege' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}



/**
 * List of posts for course choices.
 * @return Array Array of course ids and name.
 */
function educollege_event_choices() {
    $events = get_posts( array( 'numberposts' => -1, 'post_type'=>'tp-event' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'educollege' );
    foreach ( $events as $event ) {
        $choices[ $event->ID ] = $event->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}



if ( ! function_exists( 'educollege_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function educollege_selected_sidebar() {
        $educollege_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'educollege' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'educollege' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'educollege' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'educollege' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'educollege' ),
        );

        $output = apply_filters( 'educollege_selected_sidebar', $educollege_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'educollege_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function educollege_site_layout() {
        $educollege_site_layout = array(
            'wide-layout'  => esc_url(get_template_directory_uri()) . '/assets/images/full.png',
            'boxed-layout' => esc_url(get_template_directory_uri()) . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'educollege_site_layout', $educollege_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'educollege_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function educollege_global_sidebar_position() {
        $educollege_global_sidebar_position = array(
            'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right.png',
            'no-sidebar'    => esc_url(get_template_directory_uri()) . '/assets/images/full.png',
        );

        $output = apply_filters( 'educollege_global_sidebar_position', $educollege_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'educollege_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function educollege_sidebar_position() {
        $educollege_sidebar_position = array(
            'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right.png',
            'no-sidebar'    => esc_url(get_template_directory_uri()) . '/assets/images/full.png',
        );

        $output = apply_filters( 'educollege_sidebar_position', $educollege_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'educollege_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function educollege_pagination_options() {
        $educollege_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'educollege' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'educollege' ),
        );

        $output = apply_filters( 'educollege_pagination_options', $educollege_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'educollege_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function educollege_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'educollege' ),
            'off'       => esc_html__( 'Disable', 'educollege' )
        );
        return apply_filters( 'educollege_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'educollege_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function educollege_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'educollege' ),
            'off'       => esc_html__( 'No', 'educollege' )
        );
        return apply_filters( 'educollege_hide_options', $arr );
    }
endif;


if ( ! function_exists( 'educollege_popular_event_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function educollege_popular_event_content_type() {
        $educollege_popular_event_content_type = array(
                'page'      => esc_html__( 'Page', 'educollege' ),
                'post'      => esc_html__( 'Post', 'educollege' ),
                'category'  => esc_html__( 'Category', 'educollege' ),
            ) ;
        if ( class_exists( 'TP_Education' ) ) {
            $educollege_popular_event_content_type = array_merge($educollege_popular_event_content_type, array(
                'event'            => esc_html__( 'Event', 'educollege' ),
                'event-category'   => esc_html__( 'Event Category', 'educollege' ),
                ) );
        }

        $output = apply_filters( 'educollege_popular_event_content_type', $educollege_popular_event_content_type );


        return $output;
    }
endif;

