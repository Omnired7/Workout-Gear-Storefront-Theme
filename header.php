<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Phoenix_Gear
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'phoenix-gear' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
				the_custom_logo();
			?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="header-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'phoenix-gear' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				));
			?>
		</nav><!-- #site-navigation -->
		<img src="<?php echo get_template_directory_uri().'/img/Hamburger_icon_white_x200.svg.png' ?>" alt="Menu Icon"/>
	</header><!-- #masthead -->
	<img id="ios-icon" src="<?php echo get_template_directory_uri().'/img/Hamburger_icon_white_x200.svg.png' ?>" alt="Menu Icon"/>
	<style>
		#ios-icon{
			display:none;
		}
		/* CSS specific to iOS devices */ 
		@supports (-webkit-overflow-scrolling: touch) {
			#ios-icon{
				display:block;
				position: absolute;
				height: 4em;
				width: 4em;
				right: 0;
				margin-right: 1em;
			}
		}
	</style>
	<div id="content" class="site-content">