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
	<nav id="main-nav">
		<?php wp_nav_menu(array(
			'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\"><li><a href="/">Accueil</a></li>%3$s</ul>'
			)); ?>
	</nav>
	<section id="felix-dumas" class="duchesse-wrap">
		<hgroup class="duchesse-infos">
			<h1>Félix Dumas</h1>
			<h2>Duchesse du Petit Champlain</h2>
		</hgroup>
		<div class="duchesse"></div>
	</section>
	<div id="texture"></div>
</body>
</html>