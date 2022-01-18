<?php
/**
 * Client section
 *
 * This is the template for the content of client section
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */
if ( ! function_exists( 'educollege_add_client_section' ) ) :
    /**
    * Add client section
    *
    *@since educollege 1.0.0
    */
    function educollege_add_client_section() {
    	$options = educollege_get_theme_options();
        // Check if client is enabled on frontpage
        $client_enable = apply_filters( 'educollege_section_status', true, 'client_section_enable' );

        if ( true !== $client_enable ) {
            return false;
        }
        // Get client section details
        $section_details = array();
        $section_details = apply_filters( 'educollege_filter_client_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render client section now.
        educollege_render_client_section( $section_details );
    }
endif;

if ( ! function_exists( 'educollege_get_client_section_details' ) ) :
    /**
    * client section details.
    *
    * @since educollege 1.0.0
    * @param array $input client section details.
    */
    function educollege_get_client_section_details( $input ) {
        $options = educollege_get_theme_options();

        
        $content = array();

        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['client_content_page_' . $i] ) )
                $page_ids[] = $options['client_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    
           
        // Run The Loop.
 
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['url']       = get_the_permalink( );
                $page_post['title']     = get_the_title();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
                // Push to the main array.
                array_push( $content, $page_post );

            endwhile;
        endif;
        wp_reset_postdata();
    
                    
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// client section content details.
add_filter( 'educollege_filter_client_section_details', 'educollege_get_client_section_details' );


if ( ! function_exists( 'educollege_render_client_section' ) ) :
  /**
   * Start client section
   *
   * @return string client content
   * @since educollege 1.0.0
   *
   */
   function educollege_render_client_section( $content_details = array() ) {
        $options    = educollege_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="our-partners" class="relative page-section">
            <div class="wrapper">
                <div class="col-4">
                    <?php foreach ( $content_details as $key => $content ): ?>
                        <article>
                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ) ; ?>">
                            </a>
                        </article>
                    <?php endforeach ?>
                </div><!-- .col-4 -->
            </div><!-- .wrapper -->
        </div>
    <?php }
endif;