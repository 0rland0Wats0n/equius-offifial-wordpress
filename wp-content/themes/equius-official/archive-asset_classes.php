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

      <section class="asset_classes__empty">
        <h1>whoops!</h1>
        <h4>No Asset Classes added yet. Subscribe to find out when we post Asset Classes.</h4>
      </section>

    <?php } ?>
  </main>
<?php get_footer(); ?>