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

  <?php 
    
    get_template_part( 'template-parts/content', 'expertise' ); 

    get_template_part( 'template-parts/content', 'working-with' );
    
    get_template_part( 'template-parts/content',  'testimonials' ); 
  
  ?>

  <section id="contact">
    <section class="contact__top">
      <h1>Contact Equius</h1>
      <h3><?php echo get_field( 'business_phone' ); ?></h3>
    </section>
    <section class="contact__bottom">
      <?php if ( is_active_sidebar( 'home_contact' ) ) { ?>
        <div id="home-contact" class="primary-sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'home_contact' ); ?>
        </div>
      <?php } else { ?>
        <div class="contact__activate_home_contact_widget">
          <h2>Please activate home contact widget to display contact form.</h2>
        </div>
      <?php } ?>
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

 <?php get_footer() ?>