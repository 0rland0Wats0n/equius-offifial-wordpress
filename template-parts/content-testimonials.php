<?php
  /**
   * Template part displaying testimonials
   * 
   * @package equius-official
   */

  /**
   * Get testimonials
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
        <ul class="testimonials__items owl-carousel owl-theme">
          <?php $i = 1; while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li data-testimonial="<?php echo $i ?>">
              <blockquote><?php echo get_field( 'testimonial_details' ); ?></blockquote>
              <p><?php echo get_field( 'testimonial_attestant' ) ?></p>
              <p><?php echo get_field( 'testimonial_job_title' ) . ', ' . get_field( 'testimonial_company' ) ?></p>
            </li>
          <?php $i++; endwhile; ?>
        </ul>
      </div>
    </section>

<?php 
  endif;
  wp_reset_postdata();
?>