<?php

/**
 * 
 * Template for displaying working with equius section of the front page
 * 
 * @package equius-official
 * 
 */


  $working_heading    = get_field( 'working_heading' );
  $steps              = array(
    "One" => array(
      get_field( 'step_1_heading' ),
      get_field( 'step_1_details' ),
      get_field( 'step_1_icon' )
    ),
    "Two" => array(
      get_field( 'step_2_heading' ),
      get_field( 'step_2_details' ),
      get_field( 'step_2_icon' )
    ),
    "Three" => array(
      get_field( 'step_3_heading' ),
      get_field( 'step_3_details' ),
      get_field( 'step_3_icon' )
    )
  );

  if ( !$working_heading ) {
    $working_heading = "Working With Equius";
  }

  if ( $working_heading &&
      !empty( array_filter( $steps["One"] ) ) &&
      !empty( array_filter( $steps["Two"] ) ) &&
      !empty( array_filter( $steps["Three"] ) )
  ) :
?>

  <section id="working">
    <div class="working__content">
      <h1><?php echo $working_heading ?></h1>
      <ul class="working__steps">
        <?php foreach( $steps as $key => $step ) : ?>
        <li>
          <header>
            <img src="<?php echo $step[2] ?>" alt="">
            <span>
              <h3><?php echo $step[0] ?></h3>
            </span>
          </header>
          <p><?php echo $step[1] ?></p>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="working__blue_bg"></div>
  </section>

<?php endif; ?>