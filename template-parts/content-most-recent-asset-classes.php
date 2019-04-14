<?php 
/**
 * Template part for displaying the 6 most recent asset classes
 * 
 * @package equius-official
 */
?>

<?php
  $ac_temp = json_decode( file_get_contents( 'http://mobile.equiuspartners.com/newsletters.json' ) );
  $asset_classes = array();

  foreach( $ac_temp as $ac )
  {
    array_push( $asset_classes, $ac->newsletter );
  }

    usort( $asset_classes, function( $a, $b ) {
    return ( strtotime( $b->date ) - strtotime( $a->date ));
  });
?>

<?php if( sizeof( $asset_classes ) > 0 ) : ?>

  <a href="<?php echo get_post_type_archive_link( 'asset_classes' ); ?>">
    <h3 class="object__fancy_heading">Asset Classes</h3>
  </a>    
  <div class="recent_asset_classes">
    <?php for ( $i = 0; $i < 6 ; $i++ ) : $current = $asset_classes[$i]; ?>
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
  </div>
<?php 
  endif;
?>