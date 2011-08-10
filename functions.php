<?php
/*----------------------------------------
# 
# Theme Name: Brunelleschi
# Theme Author: Kit MacAllister
# 
----------------------------------------*/

/*----------------------------------------
# 
# BRUNELLESCHI SETUP
# 
----------------------------------------*/

/* Run Brunelleschi Theme Setup */
add_action( 'after_setup_theme', 'brunelleschi_setup' );

/* brunelleschi setup */
if ( ! function_exists( 'brunelleschi_setup' ) ):
	function brunelleschi_setup() {
		
		/* Load Theme TextDomain */
		load_theme_textdomain( 'brunelleschi', TEMPLATEPATH . '/languages' );
		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable( $locale_file ) ) { require_once( $locale_file ); }
		
		/* Add Custom Background */
		add_custom_background();
		
		/* Add Theme Support for Aside and Gallery */
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
		
		/* Add Editor Style */
		add_editor_style();
		
		/* Add Automatic Feed Links */
		add_theme_support( 'automatic-feed-links' );
		
		/* Load Theme Textdomain */
		load_theme_textdomain( 'brunelleschi', TEMPLATEPATH . '/languages' );
		
		/* Register Navigation */
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'brunelleschi' ),
		) );
		
		/* Default Header Stuff */
		if ( ! defined( 'HEADER_TEXTCOLOR' ) ) { define( 'HEADER_TEXTCOLOR', '' ); }
		if ( ! defined( 'NO_HEADER_TEXT' ) ) { define( 'NO_HEADER_TEXT', true ); }
		
	}
endif;

/*----------------------------------------
# 
# REGISTER SCRIPTS
# 
----------------------------------------*/

/* Updated 6/27/11 */
wp_register_script('jquery', get_template_directory_uri() . 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', array() );
if( !is_admin() ){ wp_enqueue_script('jquery'); }

wp_register_script('bbq', get_template_directory_uri() . '/js/jquery.ba-bbq.min.js', array() );
if( !is_admin() ){ wp_enqueue_script('bbq'); }

wp_register_script('lightbox', get_template_directory_uri() . '/js/jquery.lightbox-0.5.min.js', array() );
if( !is_admin() ){ wp_enqueue_script('lightbox'); }

wp_register_script('hoverintent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', array() );
if( !is_admin() ){ wp_enqueue_script('hoverintent'); }

wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array() );
if( !is_admin() ){ wp_enqueue_script('isotope'); }

/* Modernizr */
wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.0.6.min.js', array(), '2.0.6' );
if( !is_admin() ){ wp_enqueue_script('modernizr'); }

/* Contains Media Queries Used by 1140px Grid*/
wp_register_script('respond', get_template_directory_uri() . '/js/respond.js', array());
if( !is_admin() ){ wp_enqueue_script('respond'); }

/*----------------------------------------
# 
# SETUP FUNCTIONS
# 
----------------------------------------*/

/* Title Function */
function brunelleschi_title(){
	global $page, $paged;
	wp_title( '&raquo;', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &raquo; $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' &raquo; ' . sprintf( __( 'Page %s', 'brunelleschi' ), max( $paged, $page ) );
}

/* Posted In Function */
function brunelleschi_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

/* Posted On Function */
function brunelleschi_posted_on() {
	printf( __('<span class="meta-sep">by</span> %3$s <span class="%1$s">Posted on</span> %2$s', 'brunelleschi' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'brunelleschi' ), get_the_author() ),
			get_the_author()
		)
	);
	edit_post_link( __( 'Edit', 'brunelleschi' ), ' <small><span class="edit-link">[', ']</span></small>' );
}

/* Theme Comments */
function brunelleschi_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'brunelleschi' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'brunelleschi' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( __( '%1$s at %2$s', 'brunelleschi' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'brunelleschi' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'brunelleschi' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'brunelleschi' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

/* Remove Recent Comments Style */
function brunelleschi_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'brunelleschi_remove_recent_comments_style' );

/* Remove Gallery CSS */
add_filter( 'use_default_gallery_style', '__return_false' );
function brunelleschi_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) ) { add_filter( 'gallery_style', 'brunelleschi_remove_gallery_css' ); }

/* Custom Excerpt More */
function brunelleschi_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= brunelleschi_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'brunelleschi_custom_excerpt_more' );

/* Show the Home Page */
function brunelleschi_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'brunelleschi_page_menu_args' );

/* Excerpt Length */
function brunelleschi_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'brunelleschi_excerpt_length' );

/* Continue Reading Link */
function brunelleschi_continue_reading_link() {
	return '</p><p><a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'brunelleschi' ) . '</a>';
}

/* Auto Excerpt More */
function brunelleschi_auto_excerpt_more( $more ) {
	return ' &hellip;' . brunelleschi_continue_reading_link();
}
add_filter( 'excerpt_more', 'brunelleschi_auto_excerpt_more' );

/* Admin Header Style */
function brunelleschi_admin_header_style() { ?>
	<style type="text/css">
	#headerimg {
		display: block;
		margin: 0 auto;
		margin-bottom: 17px;
		border-top: 1px solid #aaa;
		border-bottom: 1px solid #aaa;
	}
	</style>
<?php }

/*----------------------------------------
# 
# Theme Options
# 
----------------------------------------*/

/* Load Theme options Page from inc */
require( dirname( __FILE__ ) . '/inc/theme-options.php' );

/*----------------------------------------
# 
# OPTIONS DEPENDANT FUNCTIONS
# 
----------------------------------------*/

/*----------------------------------------
# 
# CUSTOM IMAGE HEADER
# 
----------------------------------------*/

/* REQUIRED! -- define content width */
if ( ! get_option('brunelleschi_settings_content-width' ) ) { $content_width = 960; }
else { $content_width = get_option('brunelleschi_settings_content-width'); }

/* Disable Based on Settings */
	
	/* Define Default Header */
	if ( ! defined( 'HEADER_IMAGE' ) ) { define( 'HEADER_IMAGE', '%s/images/headers/beach.png' ); }
		
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'brunelleschi_header_image_width', $content_width ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'brunelleschi_header_image_height', 198 ) );

	register_default_headers( array(
		'beach' => array(
			'url' => '%s/images/headers/beach.png',
			'thumbnail_url' => '%s/images/headers/beach-thumbnail.png',
			'description' => __('Beach', 'brunelleschi')
		),
		'fog' => array(
			'url' => '%s/images/headers/fog.png',
			'thumbnail_url' => '%s/images/headers/fog-thumbnail.png',
			'description' => __('Fog', 'brunelleschi')
		),
		'grass' => array(
			'url' => '%s/images/headers/grass.png',
			'thumbnail_url' => '%s/images/headers/grass-thumbnail.png',
			'description' => __('Grass', 'brunelleschi')
		)
	) );
	
	/* Add Post Thumbnails */
	add_theme_support( 'post-thumbnails' );
		
	set_post_thumbnail_size();
	

/*----------------------------------------
# 
# REGISTER WIDGETS AND SIDEBARS
# 
----------------------------------------*/
		
function brunelleschi_widgets_init( ) {
	if(get_option('brunelleschi_settings_sidebar') !== 'none' ){
		/* Widget Area 1, located at the top of the sidebar.*/
		register_sidebar( array(
			'name' => __( 'Primary Widget Area', 'brunelleschi' ),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
		/* Widget Area 2, located below the Primary Widget Area in the sidebar. Empty by default. */
		register_sidebar( array(
			'name' => __( 'Secondary Widget Area', 'brunelleschi' ),
			'id' => 'secondary-widget-area',
			'description' => __( 'The secondary widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	
	if(!get_option('brunelleschi_settings_footer')){
		/* Widget Area 3, located in the footer. Empty by default. */
		register_sidebar( array(
			'name' => __( 'First Footer Widget Area', 'brunelleschi' ),
			'id' => 'first-footer-widget-area',
			'description' => __( 'The first footer widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
		/* Widget Area 4, located in the footer. Empty by default. */
		register_sidebar( array(
			'name' => __( 'Second Footer Widget Area', 'brunelleschi' ),
			'id' => 'second-footer-widget-area',
			'description' => __( 'The second footer widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
		/* Widget Area 5, located in the footer. Empty by default. */
		register_sidebar( array(
			'name' => __( 'Third Footer Widget Area', 'brunelleschi' ),
			'id' => 'third-footer-widget-area',
			'description' => __( 'The third footer widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	
		/* Area 6, located in the footer. Empty by default. */
		register_sidebar( array(
			'name' => __( 'Fourth Footer Widget Area', 'brunelleschi' ),
			'id' => 'fourth-footer-widget-area',
			'description' => __( 'The fourth footer widget area', 'brunelleschi' ),
			'before_widget' => '<li id="%1$s" class="widget-container threecol last %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'brunelleschi_widgets_init' );

/* Brunelleschi Sidebar Function */
function brunelleschi_sidebar_class(){
	if( !get_option('brunelleschi_settings_sidebar') || get_option('brunelleschi_settings_sidebar' === false ) ) {
		echo 'ninecol ';
	} elseif( get_option('brunelleschi_settings_sidebar') === 'none' ) {
		echo 'twelvecol last ';
	} else {
		switch( get_option('brunelleschi_settings_sidebar-width') ) {
			case 'two':
				echo 'tencol ';
				break;
			case 'three':
				echo 'ninecol ';
				break;
			case 'three':
				echo 'ninecol ';
				break;
			case 'four':
				echo 'eightcol ';
				break;
			case 'five':
				echo 'sevencol ';
				break;
			case 'six':
				echo 'sixcol ';
				break;
			case 'seven':
				echo 'fivecol ';
				break;
			case 'eight':
				echo 'fourcol ';
				break;
			break;
		}
	}
	if( get_option('brunelleschi_settings_sidebar') === 'left' ) { echo ' last '; }
}

/* HTML5 Image Captions */
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
	. (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}