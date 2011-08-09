<div id="singlePost">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'brunelleschi' ) ) ) : ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('twelvecol last'); ?>>
      
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <!-- .entry-meta --> 
    <section id="entry-gallery" class="eightcol">
      <?php
    $images = get_children(array(
    'post_type' => 'attachment',
    'post_status' => null,
    'post_parent' => $the_ID,
    'post_mime_type' => 'image',
    'order' => 'ASC',
    'orderby' => 'menu_order ID'));
    ?>
      <?php
    if ($images) {
    foreach($images as $image) {
    //get thumbnail of image first: (we'll actually display this one)
    $attachment=wp_get_attachment_image_src($image->ID, 'large');
    ?>
      <img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> />
      <?php }
    } ?>
    </section>
    <section id="entry" class="fourcol last">
      <div class="entry-meta">
      	<div id="time"><?php the_time('M Y'); ?></div>
        <div id="client">
          <ul>
            <li>Client:</li>
            <li>
              <?php $client = get_post_custom_values( "Client" ); echo $client[0] ?>
            </li>
          </ul>
        </div>
        <div id="tools">
          <ul>
            <li>Tools:</li>
            <?php if (in_category( 'Illustrator' )) { echo "<li><img src='http://localhost/wordpress/wp-content/themes/brunelleschi/images/illustrator.png' /></li>"; } ?>
            <?php if (in_category( 'Photoshop' )) { echo "<li><img src='http://localhost/wordpress/wp-content/themes/brunelleschi/images/photoshop.png' /></li>"; } ?>
          </ul>
        </div>
      </div>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brunelleschi' ), 'after' => '</div>' ) ); ?>
      </div>
      <!-- #entry-author-info -->
      
      <div class="entry-utility">
        <?php edit_post_link( __( 'Edit', 'brunelleschi' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
      <!-- .entry-utility -->
      </section>
      </article>
      <!-- #post-## --> 
    
<?php else : ?>

    <nav id="nav-above" class="navigation">
      <div class="nav-previous">
        <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brunelleschi' ) . '</span> %title' ); ?>
      </div>
      <div class="nav-next">
        <?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brunelleschi' ) . '</span>' ); ?>
      </div>
    </nav>
     <article id="post-<?php the_ID(); ?>" <?php post_class('twelvecol last'); ?>>
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
    <section id="entry-content" class="eightcol">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brunelleschi' ), 'after' => '</div>' ) ); ?>
      <!-- .entry-content --> 
    </section>
    <section id="entry-meta" class="fourcol last">
        Written by <?php the_author(); ?>
          <?php the_time('M d, Y'); ?>
      <div class="entry-utility">
        <?php edit_post_link( __( 'Edit', 'brunelleschi' ), '<span class="edit-link">', '</span>' ); ?>
      </div>
    </section>
   </article>
    <?php endif; ?>
    <nav id="nav-below" class="navigation">
      <div class="nav-previous">
        <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brunelleschi' ) . '</span> %title' ); ?>
      </div>
      <div class="nav-next">
        <?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brunelleschi' ) . '</span>' ); ?>
      </div>
    </nav>
    <!-- #nav-below -->
    
    <?php comments_template( '', true ); ?>
<?php endwhile; ?>
</div>