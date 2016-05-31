<?php
/**
 * Template Name: Home Page
 *
 * @package BoldGrid
 */

get_header(); ?>

<?php if ( get_header_image() ) : ?>
	<div id="custom-header">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</div>
<?php endif; // End header image check. ?>

<div class="row">
	<div class="col-md-12">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .col -->
</div><!-- .row -->

<?php get_footer(); ?>
