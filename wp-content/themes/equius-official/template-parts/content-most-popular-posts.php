<?php 
  /**
   * Template part for displaying the 4 most popular posts
   * 
   * @package equius-official
   */

   $args = array(
    'posts_per_page'  => 4, 
    'meta_key'        => 'popular_posts', 
    'orderby'         => 'meta_value_num', 
    'order'           => 'DESC'
   );

   $popular = new WP_Query( $args );

   if ( $popular->have_posts() ) :

   ?>

      <h3 class="object__fancy_heading">Most Popular</h3>
      <div class="popular_posts">
        <?php while( $popular->have_posts() ) : $popular->the_post(); ?>

        <div class="popular_posts__post" >
          <div class="object__overlay grayscale_overlay" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
          <div class="object__overlay"></div>
          <div class="popular_posts__post_meta">
            <span class="object__author_avatar" style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
            <p><?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?></p>
          </div>
          <?php $post_categories = get_the_category( get_the_ID() );
            if( !empty($post_categories) ) : ?>
            <a href="<?php echo get_category_link( $post_categories[0]->term_id ) ?>"><?php echo $post_categories[0]->name ?></a>
          <?php endif; ?>
          <a href="<?php echo get_permalink( get_the_ID() ); ?>">
            <?php the_title( '<h3 class="popular_posts_post__title">', '</h3>' ); ?>
          </a>
          <p class="popular_posts_post__date"><?php echo the_time( "m.d.Y" ); ?></p>
          <p class="popular_posts_post__excerpt"><?php echo substr( get_the_excerpt(), 0, 90 ) . "..." ?></p>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>
      </div>
  
   <?php endif; wp_reset_query(); ?>
