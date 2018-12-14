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
      <?php get_template_part( 'template-parts/widgets/mailing', 'list' ); ?>
    <?php } ?>
    <section class="asset_classes__back_to_posts <?php echo have_posts() ? "" : "empty" ?>">
      <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">
        <h3>Return to Knowledge Base</h3>
      </a>
    </section>
  </main>
<?php get_footer(); ?>