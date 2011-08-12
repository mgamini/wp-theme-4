<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>
			<?php get_template_part( 'nav' ); ?>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="singlePost">			
    <article id="post-<?php the_ID(); ?>" <?php post_class('twelvecol last format-standard'); ?>>
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
    <section class="eightcol">
        <div class="entry-content">
		<?php the_content(); ?>
        </div>
    </section>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?> 
    <section class="aboutMe fourcol last">
		<?php $recent = new WP_Query( 'pagename=about-me' ); while($recent->have_posts()) : $recent->the_post();?>
           <h3><?php the_title(); ?></h3>
           <?php the_content(); ?>
		<?php endwhile; ?>     

    </section>
   </article>
</div>      
<?php get_sidebar(); ?>
<?php get_footer(); ?>
