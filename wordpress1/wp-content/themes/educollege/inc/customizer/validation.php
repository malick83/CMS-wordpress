<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Educollege
* @since Educollege 1.0.0
*/

if ( ! function_exists( 'educollege_validate_long_excerpt' ) ) :
  function educollege_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'educollege' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'educollege' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'educollege' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'educollege_validate_blog_count' ) ) :
  function educollege_validate_blog_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'educollege' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'educollege' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'educollege' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'educollege_validate_blog_event_count' ) ) :
  function educollege_validate_blog_event_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'educollege' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of event is 1', 'educollege' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of event is 12', 'educollege' ) );
	 }
	 return $validity;
  }
endif;







