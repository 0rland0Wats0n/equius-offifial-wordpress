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
      get_field( 'belief_1_image' ),
      get_field( 'belief_1_is_video' ),
      get_field( 'belief_1_embed_code' )
    ),
    "second"  => array (
      get_field( 'belief_2_heading' ),
      get_field( 'belief_2_content' ),
      get_field( 'belief_2_image' ),
      get_field( 'belief_2_is_video' ),
      get_field( 'belief_2_embed_code' )
    ),
    "third"   => array (
      get_field( 'belief_3_heading' ),
      get_field( 'belief_3_content' ),
      get_field( 'belief_3_image' ),
      get_field( 'belief_3_is_video' ),
      get_field( 'belief_3_embed_code' )
    )
    );

    $beliefs = array_filter( $beliefs );
?>

<section id="beliefs">
  <?php if ( !empty( $beliefs ) ) : ?>
    <?php foreach( $beliefs as $belief ): $belief = array_filter( $belief ); ?>
      <?php if ( ! empty( $belief ) ) : ?>
        <section class="belief" data-in-view="false">
          <section class="belief__image">
            <?php if ($belief[3]) : ?>
              <div data-belief="<?php echo $belief[0] ?>">
                <img src="<?php echo  get_stylesheet_directory_uri() . '/assets/images/playbutton.svg' ?>" alt="">
              </div>
            <?php endif; ?>
            <img src="<?php echo $belief[2] ?>" alt="">
          </section>
          <section class="belief__content">
            <h2><?php echo $belief[0] ?></h2>
            <p><?php echo $belief[1] ?></p>
          </section>
        </section>
        <?php if ($belief[3]) : ?>
            <div class="modal" data-state="closed" data-belief="<?php echo $belief[0] ?>">
              <div class="modal__content">
                <?php echo $belief[4] ?>
              </div>
            </div>
          <?php endif; ?>
  <?php endif; endforeach; endif; ?>
</section>