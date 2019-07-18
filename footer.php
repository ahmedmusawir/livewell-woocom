<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moose_Framework_2
 */

?>
	</div><!-- #content -->

	<footer id="footer-livewell" class="site-footer">
		

		<section class="site-info">

			<div class="container">
				<div class="copyright row">
					<div class="col-sm-6 col-md-6 col-lg-6">

						<a href="<?php echo esc_url( __( 'https://cyberizegroup.com/', 'moose-framework-2' ) ); ?>">
						
							<?php printf( esc_html__( 'Powered by %s', 'moose-framework-2' ), 'Cyberize' );	?>
								
						</a>

					</div>	
					<div class="col-sm-6 col-md-6 col-lg-6">
	
						<span class="float-right">
	
							<?php the_field('theme_footer_text', 'option') ?>
							
						</span>

					</div>	
						
				</div>						
			</div>
			
		</section>

				<!--==============================================================================
				=            THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH            =
				===============================================================================-->
				
				<!-- <div style="color: white"><strong>Current template:</strong>  -->
					<?php  // echo get_current_template( true ); ?>
				<!-- </div> -->
				
				<!-- ====  End of THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH  ==== -->
						
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!--===========================================
=            CUSTOM ANALYTICS TAGS - FOOTER     =
============================================-->

	<?php the_field('before_bottom_body_tag_default', 'option'); ?>

	<?php the_field('before_bottom_body_tag'); ?>

<!--====  End of CUSTOM ANALYTICS TAGS  ====-->

</body>
</html>
