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
      <?php get_template_part( 'template-parts/content', 'most-recent-asset-class' ) ?>
      <?php get_template_part( 'template-parts/widgets/mailing', 'list' ); ?>

      <div class="asset_classes__content">
        <header>
          <h2>Asset Class Archives</h2>
        </header>
        <section>
          <?php while( have_posts() ) : $asset_class = the_post(); ?>
  
          <div class="asset_classes__class">
            <h5><?php echo date("F Y", time($asset_class["post_date"])) ?></h5>
            <h3><?php echo get_the_title($asset_class["ID"]) ?></h3>
            <?php echo the_content(); ?>
            <a href="<?php echo get_field( 'asset_class_pdf' ); ?>" download title="Download Asset Class">
              <i class="fas fa-arrow-down"></i>
              <span>download pdf</span>
            </a>
          </div>
  
          <?php endwhile; ?>
        </section>
      </div>
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