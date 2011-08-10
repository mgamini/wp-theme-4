<?php get_header(); ?>
	<?php get_template_part( 'nav', 'index' ); ?>
		<div id="main" role="main" class="<?php brunelleschi_sidebar_class(); ?>">

<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'brunelleschi' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
			<div id="post-0" class="post no-results not-found">
				<h2 class="entry-title"><?php _e( 'Nothing Found', 'brunelleschi' ); ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brunelleschi' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
<?php endif; ?>
		</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
