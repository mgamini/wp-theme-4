			</div><!-- #container -->
			<footer id="footer" role="contentinfo" class="row">
				<div id="footerbar" class="twelvecol last">
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- #footerbar -->
				<div id="colophon" class="twelvecol last">
					<div id="site-info" class="sixcol">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div><!-- #site-info -->
					<div id="site-generator" class="sixcol last">
						<?php do_action( 'brunelleschi_credits' ); ?>
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'brunelleschi' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'brunelleschi' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'brunelleschi' ), 'WordPress' ); ?></a>
					</div><!-- #site-generator -->
				</div><!-- #colophon -->
			</footer><!-- #footer -->
        <div id="skyline">
        	<img src="<?php bloginfo( 'template_url' ); ?>/images/seattleSkyline.png">
        </div>
		</div><!-- #wrapper -->
        
        </div>
        <script type="text/javascript">
  	var $j=jQuery.noConflict(); 
    $j('document').ready(function(){
      
      var container = $j('#main');

      container.isotope({
        itemSelector : '.isotopeItem'
      });
      
      
      var optionSets = $j('.option-set'),
          optionLinks = optionSets.find('a');

      optionLinks.click(function(){
        var thisLink = $j(this);
        // don't proceed if already selected
        if ( thisLink.hasClass('selected') ) {
          return false;
        }
        var optionSet = thisLink.parents('.option-set');
        optionSet.find('.selected').removeClass('selected');
        thisLink.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = optionSet.attr('data-option-key'),
            value = thisLink.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( thisLink, options )
        } else {
          // otherwise, apply new options
          container.isotope( options );
        }
        
		if ( $j('li#portfolioFilters > li a').hasClass('selected') ) {
			$j('li#navPortfolio > a').addClass('selected');
		}
		
        return false;
      });
	$j('.isotopeItem').hoverIntent(
		function () {
			$j(this).addClass('highlight');
			$j('.isotopeItem.highlight').siblings().fadeTo('fast', 0.6);
		},
		function () {
			$j('.isotopeItem.highlight').siblings().fadeTo('fast', 1);
			$j(this).removeClass('highlight');
		});

	var portfolioFilters = $j('#portfolioFilters');
	$j('li#navPortfolio').mouseenter(
		function () {
			portfolioFilters.slideDown('400');
		});
	$j('li#navPortfolio').siblings().mouseenter(
		function () {
			portfolioFilters.slideUp('400');
			if( $j('li#navPortfolio > a').hasClass('selected') ) { 
				$j('li#navPortfolio > a').removeClass('selected') }
		});
	$j('#topFilters').mouseleave(
		function () {
			$j('#portfolioFilters li a').each(function (index, element) {
				if($j(element).hasClass('selected')) {
					$j('li#navPortfolio > a').addClass('selected')		
					portfolioFilters.slideDown('400');
				}
			})
		});
	$j('#navPortfolio a').click(
		function () {
			$j('ul#portfolioFilters > li:first-child a').addClass('selected');
		});
	$j('li#navPortfolio').siblings().click(
		function () {
			$j('li#navPortfolio').removeClass('selected');
			$j(this).addClass('selected');
		});
	$j('ul#portfolioFilters > li a').click(
		function () {
			if( !$j('li#navPortfolio > a').hasClass('selected') ) { 
				$j('li#navPortfolio > a').addClass('selected') }
			});
	portfolioFilters.mouseenter(
		function () {
			if( !$j('li#navPortfolio > a').hasClass('selected') ) { 
				$j('li#navPortfolio > a').addClass('selected') }
		});
});

</script>
		<?php wp_footer(); ?>
	</body>
</html>
