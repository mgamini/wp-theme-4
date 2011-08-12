    <nav id="filters" class="clearfix" data-option-key="filter">
      <ul id="topFilters">
      	<li id="navPortfolio"><a href="<?php bloginfo( url ); ?>/#filter=%3Anot(.category-cat-blog, .category-contact)" <?php if (in_category( array('cat-ui','cat-ux','cat-web','cat-print','cat-identity' ) )) { echo "class='selected'" ; } ?> >Portfolio</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-blog" <?php if (in_category( 'cat-blog' )) { echo "class='selected'" ; } ?>>blog</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-contact" <?php if (is_page( 'contact' )) { echo "class='selected'" ; } ?>>contact</a></li>
      </ul>
      <ul id="portfolioFilters">
        <li><a href="<?php bloginfo( url ); ?>/#filter=%3Anot(.category-cat-blog, .category-contact)">all</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-ui" <?php if (in_category( 'cat-ui' )) { echo "class='selected'" ; } ?>>ui</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-ux" <?php if (in_category( 'cat-ux' )) { echo "class='selected'" ; } ?>>ux</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-web" <?php if (in_category( 'cat-web' )) { echo "class='selected'" ; } ?>>web</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-print" <?php if (in_category( 'cat-print' )) { echo "class='selected'" ; } ?>>print</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-cat-identity" <?php if (in_category( 'cat-identity' )) { echo "class='selected'" ; } ?>>identity</a></li>
      </ul>
    </nav>
    <!--<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>--> 
  </div>
</header>