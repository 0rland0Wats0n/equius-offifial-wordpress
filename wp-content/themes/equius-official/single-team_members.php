<?php
/**
 * The template for displaying single a single team member
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
		endwhile;
    ?>
    
    <p>single team member</p>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>