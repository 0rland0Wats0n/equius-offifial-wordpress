<?php
  /**
   * Template for displaying the knowledge base (blog) home
   */

   get_header();
?>
  
  <main id="main" class="site-main">
    <?php 
      
      get_template_part( 'template-parts/content', 'most-recent-post' );
      
      get_template_part( 'template-parts/widgets/category', 'switcher' );

    ?>

    <section class="posts__recent">
      <h3 class="object__fancy_heading">Recent Posts</h3>
      <div class="posts__recent_contatainer">
        <?php 
          if ( have_posts() ) : while ( have_posts() ) :
          
          the_post();

          get_template_part( 'template-parts/content', 'post-card' );
        ?>

        <?php endwhile; endif; ?>
      </div>
    </section>
  </main>

<?php get_footer(); ?>