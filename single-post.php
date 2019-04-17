<?php
/**
 * The template for displaying single blog posts
 *
 *
 * @package equiusofficial
 */

get_header();
?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'post' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			get_template_part( 'template-parts/widgets/post', 'navigation' );

		endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>