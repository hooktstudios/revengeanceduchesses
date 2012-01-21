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
	<section id="catherine-genest" class="duchesse-wrap" style="display: none">
		<hgroup class="duchesse-infos">
			<h1>Catherine Genest</h1>
			<h2>Duchesse de Montcalm</h2>
		</hgroup>
		<div class="duchesse"></div>
	</section>
	<div id="texture"></div>
	<a href="#" class="arrow prev" title="Duchesse précédente">Duchesse précédente</a>
	<a href="#" class="arrow next" title="Duchesse suivante">Duchesse suivante</a>
</body>
</html>