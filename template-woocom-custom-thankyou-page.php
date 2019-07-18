<?php
/**
 * Template Name: Custom Thank You Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moose_Framework_2
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main class="section-top container">

			<h1 class="page-headline text-center display-4 mx-auto">
				Thank you for shopping with us!
			</h1>

			<article class="main-content">

				<div class="col-sm-12 col-md-12 top-text">
					<h5 class="subheading mx-auto p-3">
						Here's a special offer on your next visit
					</h5>
					<h1 class="heading">
						10% OFF
					</h1>
					<h5 class="subheading mx-auto">
						you next purchase
					</h5>
					<p>Use code: 12345</p>

					<div class="button-holder">
						<a class="btn btn-primary" href="#">Shop Now</a>
					</div>

					<figure class="shopping-bag-holder">
						<img class="shopping-bag img-fluid mx-auto" src="http://livewell.local/wp-content/uploads/2019/06/shopping-bag-vector.png">
					</figure>

				</div>

				<div class="secondary-content">

					<figure class="days30-holder">

						<img class="img-fluid float-left mx-auto p-5" src="/wp-content/uploads/2019/06/30-day-badge.png">
					
					</figure>

					<div class="social-block">
						
						<h5 class="social-text">Share it now on:</h5>
					
						<?php echo do_shortcode( '[Sassy_Social_Share type="standard"]' ); ?>
					
					</div>

				</div>

				
			</article>

		</main><!-- section-top -->

		<section class="section-bottom">

			<div class="container">
				<h1 class="section-headline text-center mx-auto">
					Customers Also Purchased
				</h1>

				<article class="featured-product-block">

					<?php echo do_shortcode( '[products limit="3" columns="3" visibility="featured" ]' ); ?>
					
				</article>
			</div>

		</section><!-- section-bottom -->
		
</div><!-- #primary -->

<?php
get_footer();
