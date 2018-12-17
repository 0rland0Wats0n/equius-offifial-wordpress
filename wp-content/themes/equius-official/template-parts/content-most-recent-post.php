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
    <div class="post__meta">
      <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID", $p["post_author"] ) ); ?>)"></span>
      <p>
        <span><?php echo get_the_author_meta( "user_firstname", $p["post_author"] ) . " " . get_the_author_meta( "user_lastname", $p["post_author"] )?></span>
        <?php $post_categories = get_the_category( $most_recent[0]["ID"] );
          if( !empty($post_categories) && $post_categories[0]->name !== "Uncategorized" ) : ?>
          <span><?php echo $post_categories[0]->name ?></span>
        <?php endif; ?>
        <span><?php echo date("m.d.Y", time( get_the_date() ) ); ?></span>
      </p>
    </div>
    <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
    <span>
      <a href="<?php echo get_permalink( $p["ID"] ); ?>">Read Article</a>
    </span>
  </section>

<?php 
  endif;
  wp_reset_query(); 
?>