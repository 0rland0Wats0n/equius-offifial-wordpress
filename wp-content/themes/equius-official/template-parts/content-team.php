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
    'meta_key'          => 'team_member_name',
    'orderby'           => 'meta_value',
    'order'             => 'ASC',
    'post_type'         => 'team_members',
    'suppress_filters'  => true
  );
  $the_query = new WP_Query( $args );

  if( $the_query->have_posts() ):
?>

  <section class="widget__team">
    <div class="widget_team__content">
      <span class="object__arrow_left toggle" data-toggle="prev">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_left.png'?>" alt="">
      </span>
      <div class="team__carousel_wrapper">
        <ul class="team__members carousel is-set">
          <?php
          $count = 1;
          $members = $the_query->post_count;
           while( $the_query->have_posts() ):
              $the_query->the_post();
  
              $name   = get_field( 'team_member_name' );
              $role   = get_field( 'team_member_role' );
              $image  = get_field( 'team_member_photo' );
          ?>
  
          <li class="carousel-seat <?php echo $count == $members ? "is-ref" : "" ?>">
            <a href="#">
              <img src="<?php echo $image ?>" alt="">
              <div class="object__overlay"></div>
            </a>
            <h4><?php echo $name ?></h4>
            <p class="type__caption"><?php echo $role ?></p>
          </li>
  
          <?php $count++; endwhile; ?>
        </ul>
      </div>
      <span class="object__arrow_right toggle" data-toggle="next">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
      </span>
      <?php endif; ?>
    </div>
  </section>

<?php wp_reset_postdata(); ?>

