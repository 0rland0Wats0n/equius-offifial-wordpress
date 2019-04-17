<?php
  /**
 * Template part displaying team members
 * 
 * @package equius-official
 */

  /**
  * Get team members
  */
  $args = array(
    'posts_per_page'    => -1,
    'orderby'           => 'meta_value',
    'meta_key'          => 'team_member_order',
    'order'             => 'ASC',
    'post_type'         => 'team_members',
    'suppress_filters'  => true
  );
  $the_query = new WP_Query( $args );

  if( $the_query->have_posts() ):
?>
  <section class="team__full_content">
    <?php
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
        
        $headshot =   get_field( 'team_member_photo' );
        $linkedin =   get_field( 'team_member_linkedin' );
        $phone =      get_field( 'team_member_phone' );
        $email =      get_field( 'team_member_email' );
    ?>
      <div class="team_member"
        data-state="hidden"
        data-id="<?php echo get_the_ID() ?>">
        <img src="<?php echo $headshot ?>" alt="" />
        <div>
          <h3><?php echo get_the_title() ?></h3>
          <h4><?php echo get_field( 'team_member_role' ) ?></h4>
          <?php echo get_field( 'team_member_bio' ) ?>
          <span>
            <?php if ( $linkedin ) : ?>
              <a href="<?php echo $linkedin ?>">
                <i class="fab fa-linkedin-in"></i>
              </a>
            <?php endif; ?>
            <?php if ( $phone ) : ?>
              <p>
                <span class="ss-icon">phone</span>
                <span><?php echo $phone ?></span>
              </p>
            <?php endif; ?>
            <?php if ( $email ) : ?>
              <p>
                <span class="ss-icon">email</span>
                <span><?php echo $email ?></span>
              </p>
            <?php endif; ?>
          </span>
        </div>
      </div>
    <?php endwhile; ?>
  </section>
  <section class="widget__team">
    <div class="widget_team__content">
      <div class="team__carousel_wrapper">
        <ul class="team__members owl-carousel owl-theme">
          <?php
          $count = 1;
          $members = $the_query->post_count;
           while( $the_query->have_posts() ):
              $the_query->the_post();
  
              $name   = get_the_title();
              $role   = get_field( 'team_member_role' );
              $image  = get_field( 'team_member_photo' );
              $order  = get_field( 'team_member_order' );
          ?>
  
          <li data-order="<?php echo $order; ?>">
            <a href="#" 
              data-id="<?php echo get_the_ID(); ?>">
              <img src="<?php echo $image ?>" alt="">
            </a>
            <h4><?php echo $name ?></h4>
            <p class="type__caption"><?php echo $role ?></p>
          </li>
  
          <?php $count++; endwhile; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </section>

<?php wp_reset_postdata(); ?>

