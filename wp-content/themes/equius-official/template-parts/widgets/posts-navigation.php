<?php
  /**
   * Template for displaying posts navigation
   * 
   * @package equius-official
   */
?>

<nav class="widget__post_navigation" role="navigation">
  <h2 class="screen-reader-text">Posts navigation</h2>
  <ul class="post_navigation__links">
    <?php $prev = get_previous_posts_page_link(); if( $prev ) : ?>
      <li>
        <a href="<?php echo $prev ?>">
          <i class="fas fa-chevron-left"></i>
          <h3>Previous <span>Page</span></h3>
        </a>
      </li>
    <? endif; ?>
    <li class="back-to-posts">
      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
        <i class="fas fa-th"></i>
      </a>
    </li>
    <?php $next = get_next_posts_page_link(); if( $next ) : ?>
      <li>
        <a href="<?php echo $next ?>">
            <h3>Next <span>page</span></h3>
            <i class="fas fa-chevron-right"></i>
        </a>
      </li>
    <? endif; ?>
  </ul>
</nav>