<?php
/**
 * Template part for displaying results in search pages
 *
 * @package CarListings
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/content', 'media' ); ?>

	<div class="article__content">
		<header class="entry-header">
			<?php carlistings_get_category(); ?>
			<div class="entry-meta">
				<?php carlistings_posted_on(); ?>
			</div>
		</header><!-- .entry-header -->

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<div class="entry-content">
			<?php

			the_excerpt();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'carlistings' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
