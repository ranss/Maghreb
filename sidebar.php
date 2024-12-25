<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bidaya
 */

if ( ! is_active_sidebar( 'bidaya-left-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'bidaya-left-sidebar' ); ?>
</aside><!-- #secondary -->
