<?php
/**
 * Template for displaying search forms in Theme Palace
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'educollege' ); ?></span>
	</label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'educollege' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo educollege_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'educollege' ); ?></span></button>
</form>