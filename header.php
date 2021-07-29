<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package campus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header" id="header">
		<nav class="nav">	
			<div class="header__logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo SD_THEME_IMAGE_URI; ?>/logo.png" alt="Campus Clinic">
				</a>
				<a href="<?php echo home_url(); ?>/my-account/?action=register">
				register
				</a>
			</div>
			<?php
				if( has_nav_menu( 'main_menu' ) ) {
					wp_nav_menu(array(
						'menu' => 'main_menu',
						'menu_class' => 'menu header__menu',
						'theme_location' => 'main_menu',
						'container' => 'ul',
						'menu_id' => 'menu',
					));
				}						
			?>
			<!-- <ul class="menu header__menu" id="menu">
				<li class="menu-item">
					<a href="#about">accueil</a>
				</li>
				<li class="menu-item">
					<a href="#cards">Nos Formations</a>
				</li>
				<li class="menu-item">
					<a href="#program">Agenda</a>
				</li>
				<li class="menu-item">
					<a href="#trainers">Formateurs</a>
				</li>
				<li class="menu-item">
					<a href="#">Telechargements</a>
				</li>
				<li class="menu-item">
					<a href="#">Contact</a>
				</li>
			</ul> -->
			<a href='<?php echo home_url(); ?>/#program' class="header__btn">
				Inscription
			</a>
			<button class="burger"></button>	
		</nav>	
	</header>
	
