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
			<?php the_content(); ?>
			<div class="comments">
				<?php if (REVENGEANCE_FB_COMMENTS && comments_open()) : ?>
				<div class="fb-comments" data-href="<?php echo the_permalink() ?>" data-num-posts="4" data-width="330"></div>
				<?php endif;?>
			</div>
		</div>
		<footer class="entry-meta">
			<?php if (REVENGEANCE_FB_COMMENTS && comments_open() ) : ?>
			<a href="#" class="comment-link"><fb:comments-count href="<?php echo the_permalink() ?>"></fb:comments-count></a>
			<?php endif;?>
			<nav id="article-nav">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
				<span class="nav-previous"><?php echo get_prev_post_by_author( '%link', __( 'Article précédent ›', 'twentyeleven article-nav next' ) ); ?></span>
				<span class="nav-next"><?php echo get_next_post_by_author( '%link', __( '‹ Article suivant', 'twentyeleven article-nav next' ) ); ?></
			</nav><!-- #nav-single -->
		</footer>
	</article>
</div>