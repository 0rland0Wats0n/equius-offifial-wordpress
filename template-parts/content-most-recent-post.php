<?php 
/**
 * Template part for displaying the most recent post
 * 
 * @package equius-official
 */
?>

<?php
  $args = array(
    'numberposts' => 1,
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

  $most_recent = wp_get_recent_posts( $args, ARRAY_A );
?>

<?php if( $most_recent ) : $p = $most_recent[0]; ?>

  <section class="posts__most_recent" 
    style="background-image: url(<?php echo get_the_post_thumbnail_url( $p["ID"] ) ?>)">
    <div class="object__overlay"></div>
    <div class="post__meta">
      <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID", $p["post_author"] ) ); ?>)"></span>
      <p>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( "ID", $p["post_author"] ) ); ?>">
          <?php echo get_the_author_meta( "user_firstname", $p["post_author"] ) . " " . get_the_author_meta( "user_lastname", $p["post_author"] )?>
        </a>
        <?php $post_categories = get_the_category( $most_recent[0]["ID"] );
          if( !empty($post_categories) ) : ?>
          <a href="<?php echo get_category_link( $post_categories[0]->term_id ) ?>"><?php echo $post_categories[0]->name ?></a>
        <?php endif; ?>
        <span><?php echo the_time( "m.d.Y" ); ?></span>
      </p>
    </div>
      <a href="<?php echo get_permalink( $p["ID"] ); ?>">
        <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
      </a>
    <span>
      <a href="<?php echo get_permalink( $p["ID"] ); ?>">Read Article</a>
    </span>
  </section>

<?php 
  endif;
  wp_reset_query(); 
?>