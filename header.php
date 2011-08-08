<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php echo language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php brunelleschi_title(); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
 var disqus_developer = 1; // this would set it to developer mode
 </script> 
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="leftBack"></div>
<div id="glow"></div>
<div id="rightBack">
<div id="wrapper" class="hfeed container">
<div id="container" class="row">
<div id="leftContent" class="twocol last">
  <?php get_sidebar(); ?>
</div>
<div id="rightContent" class="tencol last">
<header id="header" class="row">
  <div id="access" role="navigation" class="twelvecol last clearfix">
    <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'brunelleschi' ); ?>">
      <?php _e( 'Skip to content', 'brunelleschi' ); ?>
      </a></div>
    <nav id="filters" class="option-set clearfix" data-option-key="filter">
      <ul id="topFilters">
      	<li id="navPortfolio"><a href="#" data-option-value=":not(.category-blog)" class="selected">Portfolio</a></li>
        <li><a href="#filter" data-option-value=".category-blog">blog</a></li>
        <li><a href="#">contact</a></li>
      </ul>
      <ul id="portfolioFilters">
        <li><a href="#filter" data-option-value=":not(.category-blog)" class="selected">show all</a></li>
        <li><a href="#filter" data-option-value=".category-ui">ui</a></li>
        <li><a href="#filter" data-option-value=".category-ux">ux</a></li>
      </ul>
    </nav>
    <!--<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>--> 
  </div>
</header>
<!-- #header --> 

