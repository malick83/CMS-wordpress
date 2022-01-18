<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

/**
 * educollege_footer_primary_content hook
 *
 * @hooked educollege_add_contact_section -  10
 *
 */
do_action( 'educollege_footer_primary_content' );

/**
 * educollege_content_end_action hook
 *
 * @hooked educollege_content_end -  10
 *
 */
do_action( 'educollege_content_end_action' );

/**
 * educollege_content_end_action hook
 *
 * @hooked educollege_footer_start -  10
 * @hooked educollege_Footer_Widgets->add_footer_widgets -  20
 * @hooked educollege_footer_site_info -  40
 * @hooked educollege_footer_end -  100
 *
 */
do_action( 'educollege_footer' );

/**
 * educollege_page_end_action hook
 *
 * @hooked educollege_page_end -  10
 *
 */
do_action( 'educollege_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
