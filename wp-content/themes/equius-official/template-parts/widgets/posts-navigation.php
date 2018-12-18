<?php
  /**
   * Template for displaying posts navigation
   * 
   * @package equius-official
   */

  $prev = get_previous_posts_link( '<i class="fas fa-chevron-left"></i> <h3>Previous <span>Page</span></h3>' );
  $next = get_next_posts_link( '<h3>Next <span>Page</span></h3> <i class="fas fa-chevron-right"></i>' );
  $links = "both";

  if ( $prev && !$next ) {
    $links = "prev-only";
  } elseif ( !$prev && $next ) {
    $links = "next-only";
  }
?>

<nav class="widget__post_navigation" role="navigation">
  <h2 class="screen-reader-text">Posts navigation</h2>
  <ul class="post_navigation__links">
    <div class="inner <?php echo $links ?>">
      <?php if( $prev ) : ?>
        <li>
          <?php echo $prev ?>
        </li>
      <? endif; ?>
      <li class="back-to-posts">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
          <i class="fas fa-th"></i>
        </a>
      </li class="post_navigation__link_next">
       <?php if( $next ) : ?>
        <li>
          <?php echo $next ?>
        </li>
      <? endif; ?>
    </div>
  </ul>
</nav>