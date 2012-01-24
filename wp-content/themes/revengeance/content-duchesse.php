<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="content">
	<article>
		<header class="entry-header">
			<h1><?php the_title(); ?></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
				<time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')) ?>" pubdate><?php echo esc_attr(get_the_date()) ?></time>
			<?php endif; ?>
		</header>
		<div class="entry-content">
			<?php 
			// You should configure the LightBox plugin to 2 columns in the default settings
			echo do_shortcode('[gallery]'); 
			?>
		</div>
	</article>
</div>