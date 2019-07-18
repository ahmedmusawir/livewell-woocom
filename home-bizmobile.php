<?php
/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cyberize_Framework
 */

get_header(); ?>

<section id="BLOCK1">
					
	<?php get_template_part( '_cyberize-modules/blog-index-bizmobile-sidebar' ); ?>
	
</section>

<!--====================================================
=            THE IS THE THRIVE LEADBOX AREA            =
=====================================================-->

<section class="leadbox">

	<div class="container">

		<?php 

			// $leadbox = get_field('mas_post_lead_shortcode');
			
			// if ($leadbox) {
			// 	echo do_shortcode( $leadbox ); 

			// } else {
			// 	 tve_leads_form_display(0, 5486); 
			// }

		?>
		<?php if (function_exists('tve_leads_form_display')) { tve_leads_form_display(0, 5486); } ?>
		
	</div>
	
</section>

<!--====  End of THE IS THE THRIVE LEADBOX AREA  ====-->


<?php
get_footer();
























