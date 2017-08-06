<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ds-blade
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8.css">
	<![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsAON98ndGW0tqEmULBRVhFKV3UmgjPZQ"></script>
</head>

<body <?php body_class(); ?>>

	<header class="ds-blade-header">
		<div class="container">
			<div class="ds-blade-header-social-links visible-xs visible-sm">
				<a href="<?php echo get_theme_mod('facebook_link'); ?>"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo get_theme_mod('google_link'); ?>"><i class="fa fa-google-plus"></i></a>
				<a href="<?php echo get_theme_mod('linkedin_link'); ?>"><i class="fa fa-linkedin-square"></i></a>
			</div>

			<h1 class="ds-blade-logo col-md-6">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_theme_mod('site_dealer_name'); ?></a>
			</h1>

			<div class="col-md-6">
				<div class="ds-blade-header-social-links visible-md visible-lg">
					<p>Connect with us</p>
					<a href="<?php echo get_theme_mod('facebook_link'); ?>"><i class="fa fa-facebook"></i></a>
					<a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo get_theme_mod('google_link'); ?>"><i class="fa fa-google-plus"></i></a>
					<a href="<?php echo get_theme_mod('linkedin_link'); ?>"><i class="fa fa-linkedin-square"></i></a>
				</div>
				<div class="ds-blade-header-contact-info">
					<span><?php echo get_theme_mod('site_dealer_contact_number'); ?></span>
					<address>
						<?php echo get_theme_mod('site_dealer_address'); ?>
					</address>
				</div>
			</div>
		</div>
	</header><!-- Site main navigation -->
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">Menu</a>

			</div><!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'blade1_main-menu',
						'container'      => 'ul',
						'menu_class' 		 => 'nav navbar-nav'
					) );
				?>
			</div>
		</div>
	</nav>
