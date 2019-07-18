<?php 
/**
 *
 * MODULE: Blog Index Block 001
 *
 */
?>

<section id="archive-index-block-mfw-001" class="">
<!-- <h1>archive index mfw 001</h1> -->

	<div id="primary" class="content-area container">
		
		<div class="row">

				<div class="col-sm-9 col-md-9 col-lg-9">

					<main id="main" class="site-main">

						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title text-center">', '</h1>' );
									the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'post-item-bizmobile' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- #main -->
				
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">

				<?php get_sidebar(); ?>
				
			</div>
			
		</div> <!-- end row -->

	</div> <!-- end primary -->

</section>