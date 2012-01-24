<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

	<?php query_posts('author=1,2'); ?>

	<?php if ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'content-single', get_post_format() ); ?>
	<?php endif; ?>

<?php get_footer(); ?>