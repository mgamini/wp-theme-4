<div id="singlePost">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

     <article id="post-<?php the_ID(); ?>" <?php post_class('twelvecol last'); ?>>
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
    <section class="eightcol last">
        <div class="entry-content">
		<?php the_content(); ?>
        </div>
    </section>
   
   </article>


<?php endwhile; ?>
</div>