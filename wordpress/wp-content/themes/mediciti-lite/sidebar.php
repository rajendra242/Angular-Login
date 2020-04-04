<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediciti-lite
 */

if ( ! is_active_sidebar( 'mediciti_lite_main_sidebar' ) ) {
    return;
}
?>

<aside class="widget-area">
    <?php dynamic_sidebar( 'mediciti_lite_main_sidebar' ); ?>
</aside><!-- #secondary -->
