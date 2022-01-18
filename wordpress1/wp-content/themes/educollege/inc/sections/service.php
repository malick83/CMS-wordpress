<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */
if ( ! function_exists( 'educollege_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Educollege 1.0.0
    */
    function educollege_add_service_section() {
    	$options = educollege_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'educollege_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'educollege_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        educollege_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'educollege_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Educollege 1.0.0
    * @param array $input service section details.
    */
    function educollege_get_service_section_details( $input ) {
        $options = educollege_get_theme_options();

        $content = array();
        
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) )
                $page_ids[] = $options['service_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );               

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = educollege_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// service section content details.
add_filter( 'educollege_filter_service_section_details', 'educollege_get_service_section_details' );


if ( ! function_exists( 'educollege_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Educollege 1.0.0
   *
   */
   function educollege_render_service_section( $content_details = array() ) {
        $options = educollege_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="our-services" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['service_title'] ) ): ?>
                        <h2 class="section-title">
                            <?php echo esc_html( $options['service_title'] ) ; ?>
                        </h2>
                    <?php endif; ?>
                    
                </div><!-- .section-header -->

                <div class="col-3 clear">
                    <?php foreach ( $content_details as $key => $content ): ?>
                        <article>
                            <div class="service-item-wrapper">
                                <div class="service-icon">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                        <i class="fa <?php echo esc_attr( $options['service_content_icon_' . absint($key+1)] ) ; ?>"></i>
                                    </a>
                                </div><!-- .service-icon -->

                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                            <?php echo esc_html( $content['title'] ) ; ?>
                                        </a>
                                    </h2>
                                </header>

                                <div class="entry-content">
                                    <p>
                                        <?php echo wp_kses_post( $content['excerpt'] ) ; ?>
                                    </p>
                                </div><!-- .entry-content -->
                            </div><!-- .service-item-wrapper -->
                        </article>
                    <?php endforeach ?>
                </div><!-- .col-3 -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
        
    <?php }
endif;