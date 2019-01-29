	<footer id="footer">
		<div class="footer-body">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-5 footer-brand-wrapper">

						<?php
							$footer_logo = get_field('ugm_options_footer_logo','option');
							if (!empty($footer_logo)) :
								$footer_logo_img = $footer_logo;
							else:
								$footer_logo_img = THEME_URI_ASSETS."/images/ugm_logo.png";
							endif;
						?>

						<a href="<?php echo home_url() ?>" class="footer-brand"><img src="<?php echo $footer_logo_img ?>" alt="Universitas Gadjah Mada"></a>

						<?php the_field_poly('ugm_options_footer_text','option') ?>
					</div>
					<div class="col-md-8 col-sm-7 footer-menu-wrapper">
						<div class="row">
							<?php
								if ( is_active_sidebar( 'footer-widget' ) ) {
									dynamic_sidebar( 'footer-widget' );
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6"><p class="copyright">&copy; <?php the_field_poly('ugm_options_footer_copyright', 'option') ?></p></div>
					<div class="col-md-6">
						<p class="site-menu text-right">
							<?php
								$theme_locations = get_nav_menu_locations();
								if (!empty($theme_locations['footer'])) {
									$menu = get_term( $theme_locations['footer'], 'nav_menu' );
		        					$menu_items = wp_get_nav_menu_items($menu->term_id);
		        					if (!empty($menu_items)) {
		        						foreach ($menu_items as $m) {
		        							echo '<a href="'.$m->url.'">'.$m->title.'</a>';
		        						}
		        					}
		        				}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<?php 
		$custom_js = get_field('ugm_options_custom_js','option');
		if (!empty($custom_js)) :
			echo '<script type="text/javascript">'.$custom_js.'</script>';
		endif;
	?>
<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ "Lora:400,400i,700","Montserrat:400,700","Open+Sans:400,400i,700,700i" ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); 


  </script>
</body>
</html>