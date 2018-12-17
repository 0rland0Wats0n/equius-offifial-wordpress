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
          if ( have_posts() ) : 
          $i = 0;
          while ( have_posts() && $i < 8 ) :
          
          the_post();

          get_template_part( 'template-parts/content', 'post-card' );

          $i++;
        ?>

        <?php endwhile; endif; ?>
      </div>
    </section>

    <section class="posts__popular">
      <h3 class="object__fancy_heading">Most Popular</h3>
      <?php get_template_part( 'template-parts/content', 'most-popular-posts' ); ?>
    </section>
  </main>

<?php get_footer(); ?>