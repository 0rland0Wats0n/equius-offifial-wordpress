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

   ?>

      <div class="popular_posts">
        <?php while( $popular->have_posts() ) : $popular->the_post(); ?>

        <a class="popular_posts__post" 
          href="<?php echo get_permalink( get_the_ID() ); ?>"
          style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
          <div class="popular_posts_post__meta">
            <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
            <p><?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?></p>
          </div>
          <?php $post_categories = get_the_category( get_the_ID() );
            if( !empty($post_categories) ) : ?>
            <span><?php echo $post_categories[0]->name ?></span>
          <?php endif; ?>
          <?php the_title( '<h3 class="popular_posts_post__title">', '</h3>' ); ?>
          <p class="popular_posts_post__date"><?php echo date("m.d.Y", time( get_the_date() ) ); ?></p>
          <p class="popular_posts_post__excerpt"><?php echo get_the_excerpt() ?></p>
        </a>
      </div>

<?php endwhile; wp_reset_postdata(); ?>