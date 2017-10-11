<?php	$menu_layout = isset($_GET['menu']) ? $_GET['menu'] : get_theme_mod('nora_menu_layout', 'classic'); ?>


</div>

<footer class="footer-area">

	<div class="container">
		<div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="copy-right">
                    <p><?php echo get_theme_mod('nora_copyright', esc_html__('Copyright © 2017 Nora.', 'nora') ); ?></p>
                </div>
            </div>
	        <div class="col-md-6 col-sm-6">
	            <div class="social-bookmark-wrapper">
	                <ul class="social-bookmark-wrapper">
						<?php if ( get_theme_mod('nora_facebook') ) { ?>
		                    <li><a href="<?php echo esc_url( get_theme_mod('nora_facebook') ); ?>"><i class="fa fa-facebook"></i></a></li>
	                    <?php } ?>
						<?php if ( get_theme_mod('nora_twitter') ) { ?>
		                    <li><a href="<?php echo esc_url( get_theme_mod('nora_twitter') ); ?>"><i class="fa fa-twitter"></i></a></li>
	                    <?php } ?>	                    
						<?php if ( get_theme_mod('nora_linkedin') ) { ?>
		                    <li><a href="<?php echo esc_url( get_theme_mod('nora_linkedin') ); ?>"><i class="fa fa-linkedin"></i></a></li>
	                    <?php } ?>	   	                    
						<?php if ( get_theme_mod('nora_instagram') ) { ?>
		                    <li><a href="<?php echo esc_url( get_theme_mod('nora_instagram') ); ?>"><i class="fa fa-instagram"></i></a></li>
	                    <?php } ?>		                    
						<?php if ( get_theme_mod('nora_dribble') ) { ?>
		                    <li><a href="<?php echo esc_url( get_theme_mod('nora_dribble') ); ?>"><i class="fa fa-dribbble"></i></a></li>
	                    <?php } ?>			                
	                </ul>
	            </div>
	        </div>
		</div>
	</div>

</footer>



<?php wp_footer(); ?>


</body>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107312672-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107312672-1');
</script>




</html>