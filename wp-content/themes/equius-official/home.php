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
  </main>

<?php get_footer(); ?>