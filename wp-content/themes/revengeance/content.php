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
		</footer>
	</article>
</div>
<nav id="duchesses-nav">
	<h2>Vos <br>duchesses</h2>
	<ul>
		<li><a href="#">Montcalm</a></li>
		<li><a href="#">Limoilou</a></li>
		<li><a href="#">St-Jean-Baptise</a></li>
		<li><a href="#">Vieux-Québec</a></li>
		<li><a href="#">St-Sacrement</a></li>
		<li><a href="#">St-Sauveur</a></li>
		<li><a href="#">Vieux-Port</a></li>
		<li><a href="#">Petit Champlain</a></li>
	</ul>
</nav>
