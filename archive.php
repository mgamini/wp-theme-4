<?php get_header(); ?>
		<?php get_template_part( 'nav' ); ?>
		<div id="main" role="main" class="<?php brunelleschi_sidebar_class(); ?>">

<?php
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'brunelleschi' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'brunelleschi' ), get_the_date( 'F Y' ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'brunelleschi' ), get_the_date( 'Y' ) ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'brunelleschi' ); ?>
<?php endif; ?>
			</h1>

<?php

	rewind_posts();

	get_template_part( 'loop', 'archive' );
?>
		</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
