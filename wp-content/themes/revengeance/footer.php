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
	<nav id="duchesses-nav">
		<h2>Vos <br>duchesses</h2>
		<?php
		$main_post = $post;
		$is_duchesse = false;
		wp_reset_query();
		$options = array(
			'post_type'=>'duchesse',
			'orderby'=>'title',
			'order'=>'asc',
			'posts_per_page' => 999,
			'tax_query' => array(array(
				'field'=>'slug',
				'taxonomy'=>'duch_edition',
				'terms' => '2012',
			))
		);
		$duchesses = new WP_Query( $options );  
		?>
		<ul>
			<?php while ( $duchesses->have_posts() ) : $duchesses->the_post(); ?>
				<?php
				$quartier = array_pop(get_the_terms($duchesses->post->ID, 'duch_quartier'));
				?>
				<li>
					<a href="<?php echo get_author_posts_url($duchesses->post->post_author) ?>"><?php echo $quartier->name ?></a>
					<?php if ($main_post->post_author == $duchesses->post->post_author): ?>
					  <?php $is_duchesse = true; ?>
					  <a class="photos" href="<?php the_permalink() ?>">Ses photos11</a>
					<?php endif ?>
				</li>
			<?php endwhile; ?>
		</ul>
	</nav>
	</div>
	<nav id="main-nav">
		<?php wp_nav_menu(array(
			'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\"><li><a href="/">Accueil</a></li>%3$s</ul>'
			)); ?>
	</nav>
	<?php
	$duchesses->rewind_posts();
	$i=0;
	// Show a random duchesse
	$the_chosen_one = rand(1, $duchesses->post_count);
	?>
	<?php while ( $duchesses->have_posts() ) : $duchesses->the_post(); $i++; ?>
		<?php
		$quartier = array_pop(get_the_terms($duchesses->post->ID, 'duch_quartier'));
		$display = ($main_post->post_author == $duchesses->post->post_author || !(!$is_duchesse && $i==$the_chosen_one)) ? 'display:none;' : '';
		?>		
  	<section id="<?php echo $duchesses->post->post_name ?>" class="duchesse-wrap" style="<?php echo $display ?>">
  		<hgroup class="duchesse-infos">
  			<h1><?php echo $duchesses->post->post_title ?></h1>
  			<h2><?php echo $quartier->name ?></h2>
  		</hgroup>
  		<div class="duchesse"></div>
  	</section>
	<?php endwhile; ?>
	<div id="texture"></div>
	<a href="#" class="arrow prev" title="Duchesse précédente">Duchesse précédente</a>
	<a href="#" class="arrow next" title="Duchesse suivante">Duchesse suivante</a>
</body>
</html>