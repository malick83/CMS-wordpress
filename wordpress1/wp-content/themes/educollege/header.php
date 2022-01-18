<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Educollege
	 * @since Educollege 1.0.0
	 */

	/**
	 * educollege_doctype hook
	 *
	 * @hooked educollege_doctype -  10
	 *
	 */
	do_action( 'educollege_doctype' );

?>
<head>
<?php
	/**
	 * educollege_before_wp_head hook
	 *
	 * @hooked educollege_head -  10
	 *
	 */
	do_action( 'educollege_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * educollege_page_start_action hook
	 *
	 * @hooked educollege_page_start -  10
	 *
	 */
	do_action( 'educollege_page_start_action' ); 

	/**
	 * educollege_loader_action hook
	 *
	 * @hooked educollege_loader -  10
	 *
	 */
	do_action( 'educollege_before_header' );

	/**
	 * educollege_header_action hook
	 *
	 * @hooked educollege_header_start -  10
	 * @hooked educollege_site_branding -  20
	 * @hooked educollege_site_navigation -  30
	 * @hooked educollege_header_end -  50
	 *
	 */
	do_action( 'educollege_header_action' );

	/**
	 * educollege_content_start_action hook
	 *
	 * @hooked educollege_content_start -  10
	 *
	 */
	do_action( 'educollege_content_start_action' );

	/**
	 * educollege_header_image_action hook
	 *
	 * @hooked educollege_header_image -  10
	 *
	 */
	do_action( 'educollege_header_image_action' );

    if ( educollege_is_frontpage() ) {
    	$options = educollege_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'educollege_primary_content', 'educollege_add_'. $section .'_section' );
		}
		do_action( 'educollege_primary_content' );
	}