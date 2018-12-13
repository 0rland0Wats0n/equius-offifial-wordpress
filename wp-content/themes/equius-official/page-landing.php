<?php
/**
 * Template Name: Landing Page
 */

 get_header(); ?>

  <?php 
    if ( has_post_thumbnail() ) {
        $featured_image = get_the_post_thumbnail_url();
    }
  ?>
  <header class="header__landing" style="background-image: url(<?php echo($featured_image) ?>)">
    <div class="header__content">
      <?php $hero_heading = get_field( 'hero_heading' ) ?>
      <h1 class="type__hero"><?php echo $hero_heading ?></h1>
      <?php get_template_part( 'template-parts/content', 'recent-articles' ); ?>
      <span class="header__scroll">Scroll</span>
    </div>
  </header>

  <section id="no-secrets">
    <?php 
      $ns_heading   = get_field( 'ns_heading' );
      $ns_content   = get_field( 'ns_content' );
    ?>
    <div class="no_secrets__content">
      <h1><?php echo $ns_heading ?></h1>
      <p><?php echo $ns_content ?></p>
    </div>
  </section>
      
  <?php 
    //get beliefs template part
    get_template_part( 'template-parts/content', 'beliefs' ); 
  ?>

  <?php 
    //get team heading and content
    $team_heading   = get_field( 'team_heading' );
    $team_content   = get_field( 'team_content' );
  ?>

  <section id="team">
    <div class="team__content">
        <h1><?php echo $team_heading ?></h1>
        <?php echo $team_content ?>

        <?php
          //get team members template part
          get_template_part( 'template-parts/content', 'team' ); 
        ?>
    </div>
  </section>

  <?php
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
    )
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
          <?php foreach( $expertise as $e ) : ?>
          <li>
            <img src="<?php echo $e[0] ?>" alt="">
            <h3><?php echo $e[1] ?></h3>
            <p><?php echo $e[2] ?></p>
          </li>
          <?php endforeach; ?>
        </ul>
      </section>
    </div>
  </section>

  <?php
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
    )
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
              <p class="type__caption">step <?php echo $key ?></p>
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

  <?php get_template_part( 'template-parts/content',  'testimonials' ); ?>

  <?php 
    $show_contact = get_field( 'show_contact_section' );
    
    if( $show_contact == "Show" ) :
  ?>

    <section id="contact">
      <section class="contact__top">
        <h1>Contact Equius</h1>
        <h3><?php echo get_field( 'business_phone' ); ?></h3>
      </section>
      <section class="contact__bottom">
        <div class="contact__form">
          <form action="">
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <textarea name="message" cols="30" rows="10"></textarea>
            <button type="button">Submit</button>
          </form>
        </div>
        <div class="contact__details">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/Map.png' ?>" alt="">
          <h4>Where to Find Us</h4>
          <section>
            <span>
              <p><?php echo get_field( 'business_address' ) ?></p>
            </span>
            <span>
              <p><?php echo get_field( 'business_email' ) ?></p>
              <p><?php echo get_field( 'business_phone' ) ?></p>
            </span>
          </section>
        </div>
      </section>
    </section>
    
  <?php endif; ?>

  <?php 
    $show_mail_widget = get_field( 'show_mailinglist_widget' );
    
    if( $show_mail_widget == "Show" ) :
  ?>

  <section class="widget__mailing_list">
    <ul class="widget__mailing_list_content">
      <li>
        <a href="#">
          <span>
            <h4>Knowledge Base</h4>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </span>
          <p>Explore our collection of investment research, articles, videos and commentary from independent sources.</p>
        </a>
      </li>
      <li>
        <a href="<?php  echo get_post_type_archive_link( 'asset_classes' ); ?>">
          <span>
            <h4>Asset Class</h4>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </span>
          <p>Don’t miss our monthly newsletter providing in-depth views of our investing philosophy and approach.</p>
        </a>
      </li>
      <li>
        <p>Join our mailinglist to receive updates on Equius.</p>
        <form action="">
          <input type="email" name="email" placeholder="Enter your email address here" />
          <button type="button">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </button>
        </form>
      </li>
    </ul>
  </section>

  <?php endif; ?>

 <?php get_footer() ?>