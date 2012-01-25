<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div class="content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title">Erreur 404 - Page non trouvée</h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<p>Désolé, la page demandée est introuvable sur notre site.</p> 
			<p>Il se peut qu'elle ait été supprimée, que son nom ait changé ou qu'elle soit temporairement indisponible.</p>
			<p>Veuillez essayer ce qui suit :</p>
			<ul>
				<li>Si vous avez tapé l'adresse de la page dans la barre d'adresses, vérifiez l'orthographe.</li>
				<li>Essayez d'accéder à la page désirée par la <a href="/">page d'accueil</a> ou de la barre de navigation dans le bas.</li>
			</ul>
			<p>Pour rapporter un problème, <a href="/contact">communiquez avec nous</a>.</p>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>

<script type="text/javascript">
	if (typeof _gaq != "undefined") 
	{
		_gaq.push(['_trackPageview', '/404&page=' + document.location.pathname +
document.location.search + decodeURIComponent('%26') + 'from=' + document.referrer]);
	};
</script>

<?php get_footer(); ?>