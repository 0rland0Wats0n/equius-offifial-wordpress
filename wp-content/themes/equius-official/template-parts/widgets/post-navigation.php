<?php
  /**
   * Template for displaying post navigation
   * 
   * @package equius-official
   */

   $prev = get_previous_post();
   $next = get_next_post();
?>

<nav class="widget__post_navigation" role="navigation">
  <h2 class="screen-reader-text">Post navigation</h2>
  <ul class="post_navigation__links">
    <div class="inner <?php echo (!$prev && !$next) ? 'none' : '' ?>">
      <?php  if( $prev ) : ?>
        <li>
          <a href="<?php echo get_permalink( $prev->ID ) ?>">
            <i class="fas fa-chevron-left"></i>
            <h3>Previous <span>Post</span></h3>
          </a>
        </li>
      <? endif; ?>
      <li class="back-to-posts">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
          <i class="fas fa-th"></i>
        </a>
      </li>
      <?php if( $next ) : ?>
        <li>
          <a href="<?php echo get_permalink( $next->ID ) ?>">
              <h3>Next <span>Post</span></h3>
              <i class="fas fa-chevron-right"></i>
          </a>
        </li>
      <? endif; ?>
    </div>
  </ul>
</nav>