<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Phoenix_Gear
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div>
				<img src="<?php echo get_template_directory_uri().'/img/phoenix_gear_logo_x360.png'; ?>" height='350' width='350' alt='Secondary Logo of Freedom Bird with 13 American Stars.'/>
				<div class='sm'>
					<a href="https://www.fb.com/phoenixgear1776 "><img src="<?php echo get_template_directory_uri().'/img/facebook_x128x125.png'; ?>"" alt="Facebook Social Media Icon"/></a>
					<a href="https://www.instagram.com/phoenixgear1776"><img src="<?php echo get_template_directory_uri().'/img/instagram_x128x125.png'; ?>"" alt="Instagram Social Media Icon"/></a>
				</div>
				<div class="footer-nav">
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id' => 'footer-menu',
					) );?>
				</div>
				<div class="omnigecko">
					<a href="https://omnigecko.io/"><h5>-Designed & Developed-</h5></a>
					<a href="https://omnigecko.io/"><h5>Omni Gecko Solutions</h5></a>
					<span>
						<a href="mailto:contact@omnigecko.com"><p>| contact@omnigecko.com |</p></a>
						<a href="https://omnigecko.io/"><p>| www.omnigecko.io |</p></a>
						<a href="https://fb.com/omnigecko/"><p>| fb.com/omnigecko/ |</p></a>
						<a href="call:805-836-0701"><p>| (805)-836-0701 |</p></a>
					</span>
					<a href="https://omnigecko.io/"">
						<img src="<?php echo get_template_directory_uri().'/img/omni_gecko_logo_x400x400.png'; ?>" height='350' width='350' alt='Omni Gecko Solutions Company Logo'/>
					</a>
				</div>
				<span>| &copy; Pheonix Gear 2019 |</span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php $footer_parallax = wp_get_attachment_image_src(get_theme_mod('front_page_banner_img'), 'full'); ?>
	<style>
		#colophon {
			background: url(<?php echo $footer_parallax[0]; ?>) ;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
