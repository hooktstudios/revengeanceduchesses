<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article>
		<header class="entry-header">
			<h1><?php the_title(); ?></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
				<time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')) ?>" pubdate><?php echo esc_attr(get_the_date()) ?></time>
			<?php endif; ?>
		</header>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div>
		<footer class="entry-meta">
			<?php if ( comments_open() ) : ?>
			<?php comments_popup_link( '0', '1','%', 'comment-link'); ?>
			<?php endif;?>
			<?php //@todo : make this dynamic ?>
			<a href="#" class="article-nav next">‹ Article suivant</a>
			<a href="#" class="article-nav prev">Article précédent ›</a>
		</footer>
	</article>