<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bidaya
 */

 if( ! defined( 'ABSPATH' ) ) {
	exit;
 }

?>
	</div>
	<footer id="colophon" class="site-footer">
		<div class="footer-widgets">
			<div class="footer-widget-area footer-widget-1">
				<?php if (is_active_sidebar('footer-1')) : ?>
					<?php dynamic_sidebar('footer-1'); ?>
				<?php endif; ?>
			</div>

			<div class="footer-widget-area footer-widget-2">
				<?php if (is_active_sidebar('footer-2')) : ?>
					<?php dynamic_sidebar('footer-2'); ?>
				<?php endif; ?>
			</div>

			<div class="footer-widget-area footer-widget-3">
				<?php if (is_active_sidebar('footer-3')) : ?>
					<?php dynamic_sidebar('footer-3'); ?>
				<?php endif; ?>
			</div>
		</div>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'bidaya'); ?>">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'bidaya-footer-menu',
				'menu_class'     => 'footer-menu',
				'container'      => false,
			));
			?>
    	</nav>
		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s by %2$s', 'bidaya' ), 'Bidaya', '<a href="http://anassrahou.com/">Anass Rahou</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
