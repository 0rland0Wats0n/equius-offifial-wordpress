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

      <?php
        $args = array(
          'numberposts' => 3,
          'offset' => 0,
          'category' => 0,
          'orderby' => 'post_date',
          'order' => 'DESC',
          'include' => '',
          'exclude' => '',
          'meta_key' => '',
          'meta_value' =>'',
          'post_type' => 'post',
          'post_status' => 'publish',
          'suppress_filters' => true
        );

        $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
      ?>

      <?php if($recent_posts): ?>
        <section class="widget__recent_articles">
          <p class="type__caption">Recent Articles</p>
          <section class="recent_articles__articles">
            <?php foreach( $recent_posts as $key => $recent ): ?>
              <div class="recent_articles__article" data-active="<?php echo $key == 0 ? "active" : "inactive" ?>">
                <h4><?php echo($recent["post_title"]); ?></h4>
                <span>
                  <?php $post_categories = get_the_category($recent["ID"]); ?>
                  <p class="type__caption">
                    <?php echo(date("m.d.Y", time($recent["post_date"]))); ?>
                    /
                    <?php
                      if( !empty($post_categories) ) {
                        foreach( $post_categories as $category ) { 
                          echo(esc_html($category->name));
                          echo " ";
                        }
                      } 
                    ?>
                  </p>
                  <a href="<?php echo( get_permalink($recent["ID"]) ); ?>"><span class="object__caret_right"></span></a>
                </span>
              </div>
      <?php endforeach; ?>
          </section>
          <ul class="recent_articles__switcher">
            <?php foreach( $recent_posts as $key => $recent ): ?>
              <li class="<?php echo $key == 0 ? "active" : "" ?>"></li>
            <?php endforeach; ?>
          </ul>
        </section>
      <?php 
        endif;
        wp_reset_query(); 
      ?>
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
 <?php get_footer() ?>