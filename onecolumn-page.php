<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 */

get_header(); ?>

		<div id="main" class="one-column twelvecol last" role="main">

			<?php get_template_part( 'loop', 'page' ); ?>

		</div><!-- #main -->

<?php get_footer(); ?>