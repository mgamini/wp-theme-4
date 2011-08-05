<?php get_header(); ?>

		<div id="main" role="main" class="<?php brunelleschi_sidebar_class(); ?>">

			<?php get_template_part( 'loop', 'page' ); ?>

		</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
