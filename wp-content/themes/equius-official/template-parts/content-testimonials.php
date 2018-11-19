<?php
  /**
   * Template part displaying testimonials
   * 
   * @package equius-official
   */

  /**
   * Get team members
   */
  $args = array(
    'meta_key'          => 'testimonial_attestant',
    'orderby'           => 'meta_value',
    'order'             => 'ASC',
    'post_type'         => 'testimonials',
    'suppress_filters'  => true
  );
  $the_query = new WP_Query( $args );

  if( $the_query->have_posts() ):
?>

    <section class="widget__testimonials">
      <div class="testimonials__content">
        <span class="object__arrow_left">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_left.png'?>" alt="">
        </span>
        <ul class="testimonials__items">
          <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li>
              <blockquote><?php echo get_field( 'testimonial_details' ); ?></blockquote>
              <p><?php echo get_field( 'testimonial_attestant' ) ?></p>
              <p><?php echo get_field( 'testimonial_job_title' ) . ', ' . get_field( 'testimonial_company' ) ?></p>
            </li>
          <?php endwhile; ?>
        </ul>
        <span class="object__arrow_right">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
        </span>
      </div>
    </section>

<?php 
  endif;
  wp_reset_postdata();
?>