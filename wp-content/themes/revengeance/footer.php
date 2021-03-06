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
		if($wp_query->is_author()){
			$current_author = $wp_query->get('author');
		}
		else
		{
			$current_author = $wp_query->post->post_author;
		}
		$is_duchesse = false;
		wp_reset_query();
		$options = array(
			'fields'=>array('ID', 'post_author'),
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
		<ul class="plain">
			<?php while ( $duchesses->have_posts() ) : $duchesses->the_post(); ?>
				<?php
				$quartier = array_pop(get_the_terms($duchesses->post->ID, 'duch_quartier'));
				// Any duchesse post
				if ($current_author == $duchesses->post->post_author) {
					$is_duchesse = true;
				}
				// Get latest post
				$last_post = new WP_Query(array(
					'author'=>$duchesses->post->post_author, 
					'status'=>'published',
					'sort'=>'DESC',
					'limit'=>1,
					'fields'=>array('ID')
				));
				?>
				<?php if ($last_post->have_posts()): ?>
					<?php $last_post->the_post(); ?>
					<li>
						<a href="<?php echo get_permalink($last_post->post->ID); ?>"><?php echo $quartier->name ?></a>
						<?php if (REVENGEANCE_DUCH_GALLERY && $current_author == $duchesses->post->post_author): ?>
							<a class="photos" href="<?php echo get_permalink($duchesses->post->ID) ?>">Ses photos</a>
						<?php endif ?>
					</li>
				<?php endif ?>
			<?php endwhile; ?>
		</ul>
		<a target="_blank" href="http://fr-fr.facebook.com/pages/Revengeance-des-duchesses/185712408115123" class="social fb" title="Suivez-nous sur Facebook">Facebook</a>
		<a target="_blank" href="https://twitter.com/#!/LesDuchessesQC" class="social tw" title="Suivez-nous sur Twitter">Twitter</a>
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
		$display = 'display:none;';
		if($current_author == $duchesses->post->post_author || (!$is_duchesse && $i==$the_chosen_one)){
			$display = '';
		}
		?>
		<?php
		// Inclued hidden if current page is not a duchesse page, or if its the duchesse
		if (!$is_duchesse || $display == ''):
		?>
			<?php
			// Get duchesse quartier
			$quartier = array_pop(get_the_terms($duchesses->post->ID, 'duch_quartier'));
			// Poll answer
			$answer = get_post_custom($duchesses->post->ID);
			$answer = $answer['simplepoll_answer'][0];
			?>
			<section id="<?php echo $duchesses->post->post_name ?>" class="duchesse-wrap" style="<?php echo $display ?>">
				<hgroup class="duchesse-infos">
					<h1><?php echo $duchesses->post->post_title ?></h1>
					<h2><?php echo $quartier->name ?></h2>
					<?php if (REVENGEANCE_VOTE && $current_author == $duchesses->post->post_author): ?>
						<?php 
						// check if voted
						global $wpdb;
						$ip = $_SERVER["REMOTE_ADDR"];
						$pollID = 1;
						$t = $wpdb->get_results(sprintf('SELECT `id` FROM `%s` WHERE sp_polls_id = \'%s\' AND ip = \'%s\' AND DATEDIFF(NOW(), `created`) = 0', 
							SP_TABLE_ANSWERS, $pollID, $ip));
					  ?>
						<a class="vote" data-answer="<?php echo $answer; ?>">
						  <?php if (!empty($t)): ?>
						  Merci!  <div class="vote-limit">1 vote/jour</div>
						  <?php else: ?>
						  Voter pour moi
						  <?php endif ?>
						</a>
					<?php endif ?>
				</hgroup>
				<div class="duchesse"></div>
			</section>
		<?php endif ?>
	<?php endwhile; ?>
	<div id="texture"></div>
	<?php if (!$is_duchesse): ?>
		<a href="#" class="arrow prev" title="Duchesse précédente">Duchesse précédente</a>
		<a href="#" class="arrow next" title="Duchesse suivante">Duchesse suivante</a>
	<?php endif ?>
	<?php wp_footer(); ?>
</body>
</html>