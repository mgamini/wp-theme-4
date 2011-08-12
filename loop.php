<div id="main" role="main" class="twelvecol last">
<?php $the_query = new WP_Query( 'posts_per_page = -1' ); ?>

<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'brunelleschi' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'brunelleschi' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'brunelleschi' ) ) ) : ?>	
        <article id="post-<?php the_ID(); ?>" <?php post_class('isotopeItem'); ?>>
        	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            <div class="galleryFrame">
				<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
			</div>
            </a>
            <header>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="entry-meta">
                        <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M Y') ?></time>
                    </div>
                    <!--<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>-->
            </header>
		</article><!-- #post-## -->

	<?php elseif ( ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) || in_category( _x( 'asides', 'asides category slug', 'brunelleschi' ) )  ) : ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('aside isotopeItem'); ?>>
            <h1 class="entry-title">
              <?php the_title(); ?>
            </h1>
        <section class="eightcol">
            <div class="entry-content">
            <?php the_content(); ?>
            </div>
        </section>
        <section class="aboutMe fourcol last">
            <?php $recent = new WP_Query( 'pagename=about-me' ); while($recent->have_posts()) : $recent->the_post();?>
               <h3><?php the_title(); ?></h3>
               <?php the_content(); ?>
            <?php endwhile; ?>     
    
        </section>
       </article>
	<?php else : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('isotopeItem'); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'brunelleschi' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
				<div class="entry-meta">
					<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M Y') ?></time>
				</div><!-- .entry-meta -->
			</header>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; ?>

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


</div>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brunelleschi' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brunelleschi' ) ); ?></div>
				</nav><!-- #nav-below -->
<?php endif; ?>