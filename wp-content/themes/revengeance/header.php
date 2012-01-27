<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
$revision = '';
$production = false;
if (file_exists('REVISION'))
{
	$revision = file_get_contents('REVISION');
	$production = true;
}
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php if (REVENGEANCE_FB_COMMENTS): ?>
<?php endif ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta property="fb:app_id" content="<?php echo REVENGEANCE_FB_APP_ID ?>"/>
<?php
// Set a pic for Facebook & others!
$args = array(
	'post_type' => 'attachment',
	'numberposts' => -1,
	'post_status' => null,
	'post_parent' => $post->ID
);
$attachments = get_posts( $args );
?>
<?php if (!empty($attachments)): ?>
	<?php 
	$attachment = array_pop($attachments);
	$attachment_src = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
	?>
	<meta rel="image_src" content="<?php echo $attachment_src[0] ?>"/>
	<meta property="og:image" content="<?php echo $attachment_src[0] ?>" />
<?php endif ?>
<meta name="medium" content="blog" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ($production): ?>
	<link rel="stylesheet" type="text/css" media="all" href="/min/revengeance_css-<?php echo $revision ?>.css" />
<?php else: ?>
	<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/revengeance/style.css" />
<?php endif ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="/wp-content/themes/revengeance/js/html5.js" type="text/javascript"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php if ($production): ?>
<script type="text/javascript" src="/min/revengeance_js-<?php echo $revision ?>.js"></script>
<?php else: ?>
<script type="text/javascript" src="/wp-content/themes/revengeance/js/default.js"></script>
<?php endif ?>
</head>

<body <?php body_class(); ?>>
<?php if (REVENGEANCE_FB_COMMENTS): ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/fr_CA/all.js#xfbml=1&appId=<?php echo REVENGEANCE_FB_APP_ID ?>";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php endif ?>
	<div id="content-wrap">
		<header id="header-wrap" role="banner">
			<hgroup>
				<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</hgroup>
		</header>
