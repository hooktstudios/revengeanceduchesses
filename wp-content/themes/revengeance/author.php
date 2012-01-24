<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<?php the_post(); ?>

	<?php get_template_part( 'content', 'single' ); ?>

<?php get_footer(); ?>