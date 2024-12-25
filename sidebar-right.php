<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bidaya
 */

if ( ! is_active_sidebar( 'bidaya-right-sidebar' ) ) {
	echo "<h4>There is no widgets yet!</h4>";
}
?>

<aside id="secondary" class="widget-area right-sidebar">
	<?php dynamic_sidebar( 'bidaya-right-sidebar' ); ?>
</aside><!-- #secondary -->
