<?php
/**
 * Template for displaying expertise on the front page
 * 
 * @package equius-official
 */

  $expertise_heading        = get_field( 'expertise_heading' );
  $expertise_details        = get_field( 'expertise_details' );
  $expertise_more_details   = get_field( 'expertise_more_details' );
  $expertise                = array(
    "1" => array(
      get_field( 'expertise_1_icon' ),
      get_field( 'expertise_1_heading' ),
      get_field( 'expertise_1_details' )
    ),
    "2" => array(
      get_field( 'expertise_2_icon' ),
      get_field( 'expertise_2_heading' ),
      get_field( 'expertise_2_details' )
    ),
    "3" => array(
      get_field( 'expertise_3_icon' ),
      get_field( 'expertise_3_heading' ),
      get_field( 'expertise_3_details' )
    ),
    "4" => array(
      get_field( 'expertise_4_icon' ),
      get_field( 'expertise_4_heading' ),
      get_field( 'expertise_4_details' )
    )
  );

  if ( !$expertise_heading ) {
    $expertise_heading = "Equius Expertise";
  }

  if ( !$expertise_details ) {
    $expertise_details = "By sharing our knowledge of modern investing principles with you, and by aligning those principles with your personal goals and aspirations, we help develop the confidence and discipline necessary for you to achieve superior results through all market cycles.";
  }

  if ( !$expertise_more_details ) {
    $expertise_more_details = "Our no-nonsense approach to investing is a refreshing change for investors who have been dissatisfied with traditional investment firms. Our clients include educators, physicians, attorneys, business owners, and retirees. Some have modest income and wealth. Others have more. They are fathers, mothers, sons, and daughters; trustees, charities, 401(k) plans, foundations, and endowments.";
  }
?>

<section id="expertise">
  <img class="expertise__q_overlay" src="<?php echo get_template_directory_uri() . '/assets/images/Q Overlay.png'; ?>" alt="" />
  <div class="expertise__content">
    <section>
      <h1><?php echo $expertise_heading ?></h1>
    </section>
    <section>
      <p><?php echo $expertise_details ?></p>
      <p><?php echo $expertise_more_details ?></p>
      <ul class="expertise__items">
        <?php 
          foreach( $expertise as $e ) :
            $e = array_filter( $e );
            
            if ( !empty( $e ) ) :
        ?>
        <li>
          <img src="<?php echo $e[0] ?>" alt="">
          <h3><?php echo $e[1] ?></h3>
          <p><?php echo $e[2] ?></p>
        </li>
        <?php endif; endforeach; ?>
      </ul>
    </section>
  </div>
</section>