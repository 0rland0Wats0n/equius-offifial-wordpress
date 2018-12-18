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
      <?php $hero_heading = get_bloginfo( 'description' ) ?>
      <h1 class="type__hero"><?php echo $hero_heading ?></h1>
      <?php get_template_part( 'template-parts/content', 'recent-articles' ); ?>
      <span class="header__scroll">Scroll</span>
    </div>
  </header>

  <section id="no-secrets">
    <div class="no_secrets__content">
      <?php the_content() ?>
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

    if ( !$team_heading ) {
      $team_heading = "Wisdom never gets old.";
    }

    if ( !$team_content ) {
      $team_content = "<p>Everyone on the Equius team believes that adhering to our proven investment principles is the key to your success. We are focused and disciplined, but also realize we must continue to nourish our own intellectual curiosity around new technologies, new research, and new generations of investors.</p> 
      <p>That’s the difference between knowledge and wisdom.</p>";
    }
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

  <?php get_template_part( 'template-parts/content', 'expertise' ); ?>

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

 <?php get_footer() ?>