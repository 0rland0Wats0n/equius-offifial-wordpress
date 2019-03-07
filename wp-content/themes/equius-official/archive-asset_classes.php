<?php
  /**
   * 
   * Archive Page: Asset Class
   * 
   */

   get_header();

  /** 
   * Get asset classes from api
  */
  $ac_temp = json_decode( file_get_contents( 'http://mobile.equiuspartners.com/newsletters.json' ) );
  $asset_classes = array();

  foreach( $ac_temp as $ac )
  {
    array_push( $asset_classes, $ac->newsletter );
  }

  usort( $asset_classes, function( $a, $b ) {
    return ( strtotime( $b->date ) - strtotime( $a->date ));
  });


  // get years
  $years = array();

  foreach( $asset_classes as $c ) {
    $dd = date( "m/d/Y", strtotime( $c->date_display ) );
    $edd = explode( "/", $dd );
    $year = $edd[sizeof( $edd ) - 1];

    if ( !in_array( $year, $years ) ) {
      array_push( $years, intval( $year ) );
    }
  }

  rsort( $years );
?>
  <main class="archive__asset_classes">
    <?php if ( sizeof( $asset_classes ) > 0 ) { ?>
      <?php get_template_part( 'template-parts/content', 'most-recent-asset-class' ) ?>
      <?php get_template_part( 'template-parts/widgets/mailing', 'list' ); ?>

      <div class="asset_classes__content">
        <header>
          <h2>Asset Class Archives</h2>
          <div class="asset_classes__year_switcher">
            <p>View By Year</p>
            <div class="switcher">
              <p class="switcher__year_holder"></p>
              <ul data-state="closed">
                <li data-year="all">All</li>
                <?php foreach ( $years as $year ) : ?>
                  <li data-year="<?php echo $year ?>"
                    data-state="inactive"><?php echo $year ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </header>
        <section>
          <?php for ( $i = 1; $i < sizeof( $asset_classes ) ; $i++ ) : $current = $asset_classes[$i]; ?>
  
          <div class="asset_classes__class" 
            data-year="<?php echo date( "Y", strtotime( $current->date ) ) ?>"
            data-state="<?php echo $i <= 12 ? 'visible' : 'hidden' ?>">
            <h5><?php echo date( "F, Y", strtotime( $current->date ) ) ?></h5>
            <h3><?php echo $current->title ?></h3>
            <a href="<?php echo $current->clean_pdf_link ?>" target="_blank" download title="Download Asset Class">
              <i class="fas fa-arrow-down"></i>
              <span>download pdf</span>
            </a>
          </div>
  
          <?php endfor; ?>
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