	<?php if(get_option('brunelleschi_settings_sidebar') !== 'none'): ?>
		<div id="sidebar" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'brunelleschi' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'brunelleschi' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
			
			<!-- Unified into one widget area, as of 1.1.8 -->
			<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
					
				<div class="widget-area" role="complementary">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
					</ul>
				</div><!-- #secondary .widget-area -->
			
			<?php endif; ?>
		</div><!-- #primary .widget-area -->
	<?php endif; ?>