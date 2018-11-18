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
  <header style="background-image: url(<?php echo($featured_image) ?>)">
    <div class="header__content">
      <h1 class="type__hero"><?php echo(get_bloginfo('description')) ?></h1>

      <!-- get 3 most recent posts -->
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

      <!-- show recent posts widget if posts were found -->
      <?php if($recent_posts): ?>
        <section class="widget__recent_articles">
          <p class="type__caption">Recent Articles</p>
          <section class="recent_articles__articles">
            <?php foreach( $recent_posts as $key => $recent ): ?>
              <div class="recent_articles__article" data-active="<?php echo $key == 0 ? "active" : "inactive" ?>">
                <h4><?php echo($recent["post_title"]); ?></h4>
                <span>
                  <!-- get post categories -->
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

 <?php get_footer() ?>