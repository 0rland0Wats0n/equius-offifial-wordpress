<?php
  /**
   * 
   * Archive Page: Asset Class
   * 
   */

   global $numpages;

   get_header();
?>
  <main class="archive__asset_classes">
    <?php if ( have_posts() ) { ?>

    <?php } else { ?>

      <span>no posts</span>

    <?php } ?>
  </main>
<?php get_footer(); ?>