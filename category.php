<?php get_header(); ?>
<?php get_template_part( 'nav' ); ?>
		<div id="main" role="main" class="<?php brunelleschi_sidebar_class(); ?>">
			<h1 class="page-title"><?php
				printf( __( 'Category Archives: %s', 'brunelleschi' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="archive-meta">' . $category_description . '</div>';
			get_template_part( 'loop', 'category' );
			?>
		</div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
