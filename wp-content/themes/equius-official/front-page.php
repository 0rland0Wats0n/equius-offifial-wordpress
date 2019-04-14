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
  
  <div class="recent_articles__mobile">
    <?php get_template_part( 'template-parts/content', 'recent-articles' ); ?>
  </div>

  <section id="no-secrets">
    <div class="no_secrets__content">
      <?php
        $no_secret_heading  = get_field( 'no_secret_heading' );
        $no_scret_content   = get_field( 'no_secret_content' );

        if ( !$no_secret_heading ) {
          $no_secret_heading = "Our secret? No secrets.";
        }

        if ( !$no_scret_content ) {
          $no_scret_content = "Information is indeed power, and it is most powerful when shared. We believe in complete transparency, in open-source knowledge. We encourage our clients to question the status quo, and the motives of those who defend it.";
        }
      ?>
      <h1><?php echo $no_secret_heading ?></h1>
      <p><?php echo $no_scret_content ?></p>
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
        <section class="team__content_content"
          data-state="visible">
          <?php echo $team_content ?>
        </section>

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
    </section>
    <section class="contact__bottom">
      <?php if ( is_active_sidebar( 'home_contact' ) ) { ?>
        <div id="home-contact" class="primary-sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'home_contact' ); ?>
        </div>
      <?php } else { ?>
        <div class="contact__activate_home_contact_widget">
          <h2>Action Required!</h2>
          <p>Ensure the Ninja Forms plugin is installed and you have added your contact form to the Home Contact widget area.</p>
        </div>
      <?php } ?>
      <div class="contact__details">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/Map.png' ?>" alt="">
        <section>
          <span>
            <h4>Where to Find Us</h4>
            <p><?php echo get_field( 'business_address' ) ?></p>
            <p><?php echo get_field( 'business_email' ) ?></p>
            <p><?php echo get_field( 'business_phone' ) ?></p>
          </span>
          <span>
            <h4>Follow Us</h4>
            <?php if ( is_active_sidebar( 'footer_social' ) ) : ?>
              <span class="footer_social">
                <?php dynamic_sidebar( 'footer_social' ); ?>
              </span>
            <?php endif; ?>
          </span>
        </section>
      </div>
    </section>
  </section>

 <?php get_footer() ?>