<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */
if ( ! function_exists( 'educollege_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Educollege 1.0.0
    */
    function educollege_add_blog_section() {
    	$options = educollege_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'educollege_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'educollege_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        educollege_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'educollege_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Educollege 1.0.0
    * @param array $input blog section details.
    */
    function educollege_get_blog_section_details( $input ) {
        $options = educollege_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_content_event_type = $options['blog_content_event_type'];       
        $blog_count = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 3;
        $blog_event_count = ! empty( $options['blog_event_count'] ) ? $options['blog_event_count'] : 3;
        
        $content['blog'] = array();
        $content['event'] = array();
        switch ( $blog_content_type ) {
        	
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_post_' . $i] ) )
                        $post_ids[] = $options['blog_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = educollege_trim_content( 20 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                // Push to the main array.
                array_push( $content['blog'], $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( class_exists('TP_Education') ) {
            switch ( $blog_content_event_type ) {  

            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_event_page_' . $i] ) )
                        $page_ids[] = $options['blog_content_event_page_' . $i];
                }
                
                $event_args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_event_post_' . $i] ) )
                        $post_ids[] = $options['blog_content_event_post_' . $i];
                }
                
                $event_args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['blog_content_event_section_category'] ) ? $options['blog_content_event_section_category'] : '';
                $event_args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break; 
            
            case 'event':  
                if ( class_exists( 'TP_Education' ) ) {
                    $page_ids = array();

                    for ( $i = 1; $i <= $blog_event_count; $i++ ) {
                        if ( ! empty( $options['blog_content_event_' . $i] ) )
                            $page_ids[] = $options['blog_content_event_' . $i];
                    }
                    
                    $event_args = array(
                        'post_type'         => 'tp-event',
                        'post__in'          => ( array ) $page_ids,
                        'posts_per_page'    => absint( $blog_event_count ),
                        'orderby'           => 'post__in',
                        );   
                }             
                    
                   
            break;

            case 'event-category':    
                if ( class_exists( 'TP_Education' ) ) {
                    $cat_id = ! empty( $options['blog_content_event_category'] ) ? $options['blog_content_event_category'] : '';

                    $event_args = array(
                        'post_type'         => 'tp-event',
                        'posts_per_page'    => absint( $blog_event_count ),
                        'tax_query'         => array(  
                            array( 
                                'taxonomy'  => 'tp-event-category', 
                                'field'     => 'id', 
                                'terms'     => $cat_id,  
                                ) 
                            ),
                        );
                }            
                                        
            break;         

            default:
            break;
         }

            
             // Run The Loop.
            $event_query = new WP_Query( $event_args );
            if ( $event_query->have_posts() ) : 
                while ( $event_query->have_posts() ) : $event_query->the_post();
                    $event_post['id']        = get_the_id();
                    $event_post['title']     = get_the_title();
                    $event_post['url']       = get_the_permalink();
                    $event_post['excerpt']   = educollege_trim_content( 20 );
                    $event_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                    // Push to the main array.
                    array_push( $content['event'], $event_post );
                endwhile;
            endif;
            wp_reset_postdata();
        }
        
    
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'educollege_filter_blog_section_details', 'educollege_get_blog_section_details' );


if ( ! function_exists( 'educollege_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Educollege 1.0.0
   *
   */
   function educollege_render_blog_section( $content_details = array() ) {
        $options = educollege_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="latest-posts" class="relative page-section">
                <div class="wrapper">
                    <div class="blog-posts-wrapper <?php echo ( $options['blog_event_enable'] == true && class_exists( 'TP_Education' ) ) ? 'col-2' : 'col-1'; ?> clear">
                        <div class="latest-news-wrapper">
                            <div class="section-header blog <?php echo ( $options['blog_event_enable'] == true && class_exists( 'TP_Education' ) ) ? '' : 'title-center'; ?>">
                                <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ) ; ?></h2>
                            </div><!-- .section-header -->

                            <div class="post-articles-wrapper clear">
                                <?php foreach ( $content_details['blog'] as $content ): ?>
                                    <article class="<?php echo ! empty( $content['image'] ) ? esc_attr__('has-post-thumbnail', 'educollege') : esc_attr__('no-post-thumbnail', 'educollege') ; ?>">
                                        <div class="post-item-wrapper clear">
                                            <?php if ( ! empty( $content['image'] ) ): ?>
                                                <div class="featured-image" style="background-image:url('<?php echo esc_url( $content['image'] ) ; ?>');">
                                                    <a class="post-thumbnail-link"></a>
                                                </div><!-- .featured-image -->
                                            <?php endif ?>
                                            
                                            <div class="entry-container">
                                                <div class="entry-meta">
                                                    <?php 
                                                        educollege_posted_on( $content['id'] ) ;
                                                        the_category( ' ', '', $content['id'] ) ; 

                                                    ?>
                                                </div><!-- .entry-meta -->

                                                <header class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                                            <?php echo esc_html( $content['title'] ) ; ?>
                                                        </a>
                                                    </h2>
                                                </header>

                                                <div class="entry-content">
                                                    <p>
                                                        <?php echo esc_html( $content['excerpt'] ) ; ?>
                                                    </p>
                                                </div><!-- .entry-content -->
                                            </div><!-- .entry-container -->
                                        </div><!-- .post-item-wrapper -->
                                    </article>
                                <?php endforeach ?>
                            </div><!-- .post-articles-wrapper -->
                            
                        </div><!-- .latest-news-wrapper -->

                        <?php if ( class_exists('TP_Education') ): ?>
                            <?php if ( $options['blog_event_enable'] == true ): ?>
                                <div class="upcoming-events-wrapper clear">
                                    <?php if ( ! empty( $options['blog_event_title'] ) ): ?>
                                        <div class="section-header event">
                                            <h2 class="section-title"><?php echo esc_html( $options['blog_event_title'] ) ; ?></h2>
                                        </div><!-- .section-header -->
                                    <?php endif ?>
                                    <div class="events-articles-wrapper clear">
                                        <?php foreach ( $content_details['event'] as $content ): ?>
                                            <article>
                                                <div class="event-item-wrapper">
                                                    <div class="entry-meta">
                                                        <span class="posted-on">
                                                            <a href="<?php echo esc_url( $content['url'] ) ; ?>" rel="bookmark">
                                                                <?php educollege_event_date( $content['id'] ) ;?>
                                                            </a>                                                
                                                        </span><!-- .posted-on -->
                                                    </div><!-- .entry-meta -->

                                                    <div class="entry-container">
                                                        <header class="entry-header">
                                                            <h2 class="entry-title">
                                                                <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                                                   <?php echo esc_html( $content['title'] ) ; ?>
                                                                </a>
                                                            </h2>
                                                        </header>

                                                        <div class="entry-content">
                                                            <p>
                                                                <?php echo esc_html( $content['excerpt'] ) ; ?>
                                                            </p>
                                                        </div><!-- .entry-content -->

                                                        <?php if ( ! in_array( $options['blog_content_event_type'], array('post', 'page', 'category') ) ): ?>
                                                            <ul class="tp-education-meta entry-meta">
                                                                <li>
                                                                    <?php 
                                                                        tp_event_start_time( $content['id'] ) ; 
                                                                        echo esc_html( ' - ',  'educollege');
                                                                        tp_event_end_time( $content['id'] ) ; 
                                                                    ?>
                                                                </li>
                                                                <li>
                                                                   <?php tp_event_location( $content['id'] ) ;  ?>
                                                                </li>
                                                            </ul>
                                                        <?php endif ?>                                                   
                                                    </div><!-- .entry-container -->
                                                </div><!-- .event-item-wrapper -->
                                            </article>
                                        <?php endforeach ?>
                                    </div><!-- .events-articles-wrapper -->
                                    
                                </div><!-- .upcoming-events-wrapper -->
                            <?php endif ?>
                        <?php endif ?>
                        
                        
                    </div><!-- .col-2 -->
                </div><!-- .wrapper -->
            </div>

    <?php }
endif;