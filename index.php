<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maghreb
 */

if( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

		<?php get_sidebar( 'right' ); ?>	
		<main id="primary" class="site-main">
			<?php

			/**
			 * 
			 */
			do_action( 'maghreb_before_main_content' );
			
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				/**
				 * 
				 */
				do_action( 'maghreb_after_loop' );

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;

			/**
			 * 
			 */
			do_action( 'maghreb_after_main_content' );
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
	

		<?php
		/**
		 * 
		*/
		do_action( 'maghreb_after_primary_content_area' );

		get_footer();