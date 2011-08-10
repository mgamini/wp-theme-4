    <nav id="filters" class="clearfix" data-option-key="filter">
      <ul id="topFilters">
      	<li id="navPortfolio"><a href="<?php bloginfo( url ); ?>/#filter=%3Anot(.category-blog)" <?php if (in_category( array('ui','ux','web','print','identity' ) )) { echo "class='selected'" ; } ?> >Portfolio</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-blog" <?php if (in_category( 'blog' )) { echo "class='selected'" ; } ?>>blog</a></li>
        <li><a href="#">contact</a></li>
      </ul>
      <ul id="portfolioFilters">
        <li><a href="<?php bloginfo( url ); ?>/#filter=%3Anot(.category-blog)">all</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-ui" <?php if (in_category( 'ui' )) { echo "class='selected'" ; } ?>>ui</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-ux" <?php if (in_category( 'ux' )) { echo "class='selected'" ; } ?>>ux</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-web" <?php if (in_category( 'web' )) { echo "class='selected'" ; } ?>>web</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-print" <?php if (in_category( 'print' )) { echo "class='selected'" ; } ?>>print</a></li>
        <li><a href="<?php bloginfo( url ); ?>/#filter=.category-identity" <?php if (in_category( 'identity' )) { echo "class='selected'" ; } ?>>identity</a></li>
      </ul>
    </nav>
    <!--<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>--> 
  </div>
</header>