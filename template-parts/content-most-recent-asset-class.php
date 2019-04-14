<?php 
/**
 * Template part for displaying the most recent asset class
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

  $most_recent = $asset_classes[0];
?>

<?php if( $most_recent ) : ?>

  <section class="asset_classes__most_recent" 
    style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/mras_bg.jpg" ?>)">
    <div>
      <h1>Asset Class</h1>
      <h4>latest asset class</h4>
      <h2><?php echo $most_recent->title ?></h2>
      <p><?php echo date( "F, Y", strtotime( $most_recent->date ) ) ?></p>
      <a href="<?php echo $most_recent->clean_pdf_link ?>" target="_blank" download>download pdf</a>
    </div>
  </section>

<?php 
  endif;
?>