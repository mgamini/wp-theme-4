			</div><!-- #container -->
			<footer id="footer" role="contentinfo" class="row">
            	<div class="leftContent twocol last"></div> 
				<div id="footerbar" class="tencol last">
					<?php get_sidebar( 'footer' ); ?>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
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
		optionSet.find('.selectedReturn').removeClass('selectedReturn');
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
		
	$j('nav #topFilters').hover( 
		function () {
			$j('.selected').addClass('selectedReturn');
			$j('.selected').removeClass('selected');			
		},
		function () {
			$j('.selectedReturn').addClass('selected');
			$j('.selected').removeClass('selectedReturn');
		});
	$j('nav #portfolioFilters a').hover( 
		function () {
			$j('nav #portfolioFilters a.selected').addClass('selectedReturn');
			$j('nav #portfolioFilters a.selected').removeClass('selected');			
		},
		function () {
			$j('nav #portfolioFilters a.selectedReturn').addClass('selected');
			$j('nav #portfolioFilters a.selected').removeClass('selectedReturn');
	});
	$j('nav#filters a').hover(
		function () {
			this.addClass('selected');
		},
		function () {
			this.removeClass('selected');
		});
	$j('nav #portfolioFilters a').click(function(){
		$j('nav #navPortfolio a').addClass('selected');
	});
	$j('#nav-above .nav-previous a').hover(function() {
			$j('#nav-above .nav-previous .meta-nav').fadeIn('fast');
		},
		function(){
			$j('#nav-above .nav-previous .meta-nav').fadeOut('fast');
	});
	$j('#nav-above .nav-next a').hover(function() {
			$j('#nav-above .nav-next .meta-nav').fadeIn('fast');
		},
		function(){
			$j('#nav-above .nav-next .meta-nav').fadeOut('fast');
	});
	$j('#entry-gallery a').lightBox({
	imageLoading: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-loading.gif',
	imageBtnClose: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-close.gif',
	imageBtnPrev: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-prev.gif',
	imageBtnNext: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-next.gif'	
	});
});

</script>
		<?php wp_footer(); ?>
	</body>
</html>
