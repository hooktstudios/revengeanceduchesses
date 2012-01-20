<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	</div>
	<footer id="colophon" role="contentinfo">
		<nav>
			<?php wp_nav_menu(array(
				'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\"><li><a href="/">Accueil</a></li>%3$s</ul>'
				)); ?>
		</nav>
	</footer>
</body>
</html>