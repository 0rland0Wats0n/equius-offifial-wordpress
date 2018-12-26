<?php
/**
 * Template part displaying beliefs
 * 
 * @package equius-official
 */

  // get all beliefs from acf
  $beliefs  = array(
    "first"   => array(
      get_field( 'belief_1_heading' ),
      get_field( 'belief_1_content' ),
      get_field( 'belief_1_image' )
    ),
    "second"  => array (
      get_field( 'belief_2_heading' ),
      get_field( 'belief_2_content' ),
      get_field( 'belief_2_image' )
    ),
    "third"   => array (
      get_field( 'belief_3_heading' ),
      get_field( 'belief_3_content' ),
      get_field( 'belief_3_image' )
    )
    );

    $beliefs = array_filter( $beliefs );
?>

<section id="beliefs">
  <?php if ( !empty( $beliefs ) ) : ?>
    <?php foreach( $beliefs as $belief ): $belief = array_filter( $belief ); ?>
      <?php if ( ! empty( $belief ) ) : ?>
        <div class="belief" data-in-view="false">
          <section class="belief__image">
            <img src="<?php echo $belief[2] ?>" alt="">
          </section>
          <section class="belief__content">
            <h2><?php echo $belief[0] ?></h2>
            <p><?php echo $belief[1] ?></p>
          </section>
        </div>
  <? endif; endforeach; endif; ?>
</section>