<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Educollege
 * @since Educollege 1.0.0
 */
$class = has_post_thumbnail() ? 'has-post-thumbnail' : '';
$options = educollege_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
        <div class="post-item-wrapper clear">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                </div><!-- .featured-image -->
            <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
               <?php if ( $options['hide_date'] == false ):
                     educollege_posted_on() ;
                endif ; 
                if ( $options['hide_category'] == false ):
                    the_category( ' ', '', get_the_id() ) ;
                endif ; ?>  
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
        </div><!-- .entry-container -->

        

        
    </div><!-- .post-item-wrapper -->

</article><!-- #post-## -->
