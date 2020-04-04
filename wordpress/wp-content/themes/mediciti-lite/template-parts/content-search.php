<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mediciti-lite
 */
$mediciti_lite_settings = mediciti_lite_get_theme_options();
$blog_meta = $mediciti_lite_settings['mediciti_lite_entry_meta_blog'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title" class="screen-reader-text" ><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() && ($blog_meta == 'show-meta') ) :?>
		<div class="entry-meta">
			<?php
			mediciti_lite_posted_on();
			mediciti_lite_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php mediciti_lite_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
        <a class="more-link" title="" href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo esc_html__('Read More','mediciti-lite');?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
