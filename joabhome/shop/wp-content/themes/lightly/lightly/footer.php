<?php
global $theme_options;
?>
			<footer role="contentinfo" class="footer">
				<div id="inner-footer" class="wrap clearfix">
					<?php if ( is_active_sidebar( 'footer-sidebar1' ) || is_active_sidebar( 'footer-sidebar2' ) || is_active_sidebar( 'footer-sidebar3' ) || is_active_sidebar( 'footer-sidebar4' ) ) : ?>
					<div id="footer-widgets" class="clearfix">
						<?php if ( is_active_sidebar( 'footer-sidebar1' ) ) : ?>
						<div class="f-widget col220 first f-widget-1">
							<?php 	dynamic_sidebar( 'Footer Sidebar 1' ); ?>
						</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-sidebar2' ) ) : ?>
						<div class="f-widget col220 f-widget-2">
							<?php 	dynamic_sidebar( 'Footer Sidebar 2' ); ?>
						</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-sidebar3' ) ) : ?>
						<div class="f-widget col220 f-widget-3">
							<?php 	dynamic_sidebar( 'Footer Sidebar 3' ); ?>
						</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-sidebar4' ) ) : ?>
						<div class="f-widget col220 last f-widget-4">
							<?php 	dynamic_sidebar( 'Footer Sidebar 4' ); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					
					<div class="attribution col940">
                    	<nav>
							<?php plus62_footer_links(); // Adjust using Menus in Wordpress Admin ?>
						</nav>
						<?php if ( isset($theme_options['lightly_footer_credit_text']) && $theme_options['lightly_footer_credit_text'] ): ?>
						<p><?php echo $theme_options['lightly_footer_credit_text'] ?></p>
						<?php else: ?>
						<p>&copy; <?php bloginfo('name'); ?> <?php _e('is powered by', 'plus62'); ?> <a href="http://fooir.com/" title="WordPress">Sirty主题基于+62</a> &amp; <a href="http://fooir.com/" title="FOOIR" class="footer_bones_link">+62</a>.</p>
						<?php endif; ?>
					</div> 
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
        <?php 
		if ( $theme_options['lightly_homepage_headline_slider'] ){
		?>
        <script>
		jQuery(document).ready(function($){
			$('#headline-carousel').fwCarousel( { onScreen: 4, autoPlay:<?php echo $theme_options['lightly_headline_auto_slide']? 'true' : 'false'; ?>, delay:<?php echo isset($theme_options['lightly_headline_auto_slide_timer'])? $theme_options['lightly_headline_auto_slide_timer'] . '000' : '5000'; ?> } );
		});
		</script>
        <?php
		}
		?>

        <?php 
		if ( $theme_options['lightly_homepage_featured_slider'] ){
		?>
        <script>
		jQuery(document).ready(function($){
			$('#featured-posts').fwCarousel( { autoPlay:<?php echo $theme_options['lightly_featured_auto_slide']? 'true' : 'false'; ?>, delay:<?php echo isset($theme_options['lightly_featured_auto_slide_timer'])? $theme_options['lightly_featured_auto_slide_timer'] . '000' : '5000'; ?> } );
		});
		</script>
        <?php
		}
		?>
		
		<!-- prompt for Google Chrome Frame for IE6 users -->
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php if ( $theme_options['lightly_footer_script'] )  echo $theme_options['lightly_footer_script'] ; ?>
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>