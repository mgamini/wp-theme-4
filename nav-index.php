    <nav id="filters" class="option-set clearfix" data-option-key="filter">
      <ul id="topFilters">
      	<li id="navPortfolio"><a href="#filter=%3Anot(.category-cat-blog)" class="selected">Portfolio</a></li>
        <li><a href="#filter=.category-cat-blog">blog</a></li>
        <li><a href="<?php bloginfo( url ); ?>/contact/" <?php if (is_page( 'contact' )) { echo "class='selected'" ; } ?>">contact</a></li>
      </ul>
      <ul id="portfolioFilters">
        <li><a href="#filter=%3Anot(.category-cat-blog)" class="selected">all</a></li>
        <li><a href="#filter=.category-cat-ui">ui</a></li>
        <li><a href="#filter=.category-cat-ux">ux</a></li>
        <li><a href="#filter=.category-cat-web">web</a></li>
        <li><a href="#filter=.category-cat-print">print</a></li>
        <li><a href="#filter=.category-cat-identity">identity</a></li>
      </ul>
    </nav>
    <!--<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>--> 
  </div>
</header>