			</div><!-- #container -->
			<footer id="footer" role="contentinfo" class="row">
            	<div class="leftContent twocol last"></div> 
				<div id="footerbar" class="tencol last">
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- #colophon -->
			</footer><!-- #footer -->
        <div id="skyline">
<iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlq2rf0vb1s69f15f2hv6itgcm5m4jg6tcm0ijtqna0pq43c45bscaid5s1tjeh8hquf1i0pk1uo69ek7kt2fdgqbe0bp868acmjavidk6106598rkac372hjrpbufbnhuodlssda0&amp;w=159&amp;h=36" frameborder="0" allowtransparency="true" width="129" height="36"></iframe>        	
<img src="<?php bloginfo( 'template_url' ); ?>/images/seattleSkyline.png">
        </div>
		</div><!-- #wrapper -->
        
        </div>
        <script type="text/javascript">
		
  	var $j=jQuery.noConflict(); 

    $j('document').ready(function(){
		

		var mainheight = $j(window).height() * 0.9;		
		$j('#main').css('min-height', mainheight);
			      
      var container = $j('#main');
		$j('#main').isotope({
		  // options...
		  filter: ':not(.category-cat-blog, .category-contact)'
		});
    
      $j('#main').imagesLoaded( function(){
		  $j(this).isotope({
			itemSelector : '.isotopeItem',
		  });
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
      // -------- begin josh -------- //
      $j('.option-set a').click(function(){
          // get href attr, remove leading #
          var href = $j(this).attr('href').replace( /^#/, '' ),
              // convert href into object
              // i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
              option = $j.deparam( href, true );
          // set hash, triggers hashchange on window
          $j.bbq.pushState( option );
          return false;
      });

      $j(window).bind( 'hashchange', function( event ){
          // get options object from hash
          var hashOptions = $j.deparam.fragment();
          // apply options from hash
          container.isotope( hashOptions );
		  // remove selected class from all nav links, readds only to hash category
		  if ( hashOptions['filter'] ){
			  $j('.option-set a').removeClass('selected');
			  $j('#navPortfolio a').addClass('selected');
			  $j('a[href="#' + $j.param(hashOptions) + '"]').addClass('selected');
		  }
      })
          // trigger hashchange to capture any hash data on init
      .trigger('hashchange');
      // -------- end josh -------- //
		
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
	if ( $j(window).width() >= 767 ) {
		$j('#entry-gallery a').lightBox({
			imageLoading: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-loading.gif',
			imageBtnClose: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-close.gif',
			imageBtnPrev: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-prev.gif',
			imageBtnNext: '<?php bloginfo( 'template_url' ); ?>/images/lightbox-btn-next.gif'	
		});
	}
});

</script>
  <!--[if lt IE 8]>
    <script type="text/javascript" 
     src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

    <style>
     .chromeFrameInstallDefaultStyle {
       width: 60% /* default is 800px */
       border: 5px solid blue;
     }
    </style>

    <div id="prompt">
     <!-- if IE without GCF, prompt goes here -->
    </div>
 
    <script>
     // The conditional ensures that this code will only execute in IE,
     // Therefore we can use the IE-specific attachEvent without worry
     window.attachEvent("onload", function() {
       CFInstall.check({
         mode: "inline", // the default
         node: "prompt"
       });
     });
    </script>
  <![endif]-->

		<?php wp_footer(); ?>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21843817-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>
