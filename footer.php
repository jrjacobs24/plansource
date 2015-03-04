			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
	        			'after' => '',                                  // after the menu
	        			'link_before' => '',                            // before each link
	        			'link_after' => '',                             // after each link
	        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>
					<div class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></div>
					<div class="social">
						<a href="http://www.linkedin.com/company/plansource/" target="_blank"><i class="fa fa-linkedin-square"></i></a> 
						<a href="http://www.twitter.com/plansource" target="_blank"><i class="fa fa-twitter-square"></i></a> 
						<a href="http://www.facebook.com/plansourceHRHQ" target="_blank"><i class="fa fa-facebook-square"></i></a>
					</div>
				</div>
			</footer>
			<div class='toTop'><a href="#container"><i class="fa fa-arrow-up"></i> Top</a></div>
		</div>
		<div id="login-area" class="login-area  white-popup mfp-hide">
			<h3>Choose your login area:</h3>
			<?php if( have_rows('login_buttons','options') ): ?>
				<?php while( have_rows('login_buttons','options') ): the_row(); ?>
					<p><a href="<?php the_sub_field('login_button_url'); ?>" class="themebutton"><?php the_sub_field('login_button_text'); ?> <i class="fa fa-chevron-circle-right"></i></a></p>
				<?php endwhile; ?>
			<?php endif; ?> 
		</div> <!-- /login-area -->
		<script>
			jQuery(document).ready(function($) {
				$(".pinned").pin({
				      minWidth: 1280
				});
				$("#slider2").responsiveSlides( {
					timeout: 7000
				});
				$("#slider").responsiveSlides({
					timeout: 8000,
					nav: true
				});
			});
		</script>
		<script>
			if (!window.console) (function() {
			    var __console, Console;
			    Console = function() {
			        var check = setInterval(function() {
			            var f;
			            if (window.console && console.log && !console.__buffer) {
			                clearInterval(check);
			                f = (Function.prototype.bind) ? Function.prototype.bind.call(console.log, console) : console.log;
			                for (var i = 0; i < __console.__buffer.length; i++) f.apply(console, __console.__buffer[i]);
			            }
			        }, 1000); 
			        function log() {
			            this.__buffer.push(arguments);
			        }
			        this.log = log;
			        this.error = log;
			        this.warn = log;
			        this.info = log;
			        this.__buffer = [];
			    };
			    __console = window.console = new Console();
			})();
		</script>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html>