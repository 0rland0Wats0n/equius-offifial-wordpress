<?php
  /**
 * Template part displaying 3 most recent articles
 * 
 * @package equius-official
 */
?>

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
    <p>Recent Articles</p>
    <section class="recent_articles__articles">
      <?php foreach( $recent_posts as $key => $recent ): ?>
        <div class="recent_articles__article"
          data-post-id="<?php echo $recent["ID"] ?>" 
          data-active="<?php echo $key == 0 ? "active" : "inactive" ?>">
          <h4><?php echo($recent["post_title"]); ?></h4>
          <span>
            <?php $post_categories = get_the_category($recent["ID"]); ?>
            <p class="type__caption">
              <?php echo(date("m.d.Y", time($recent["post_date"]))); ?>
              <?php
                if( !empty($post_categories) ) {
                  $category = $post_categories[0];
              ?>
              <a href="<? echo get_category_link( $category->term_id ) ?>">
                <?php echo " / " . $category->name ?>
              </a>
              <?php } ?>
            </p>
            <a href="<?php echo( get_permalink($recent["ID"]) ); ?>"><span class="object__caret_right"></span></a>
          </span>
        </div>
<?php endforeach; ?>
    </section>
    <ul class="recent_articles__switcher">
      <?php foreach( $recent_posts as $key => $recent ): ?>
        <li class="<?php echo $key == 0 ? "active" : "" ?>"
          data-post-id="<?php echo $recent["ID"] ?>"></li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php 
  endif;
  wp_reset_query(); 
?>