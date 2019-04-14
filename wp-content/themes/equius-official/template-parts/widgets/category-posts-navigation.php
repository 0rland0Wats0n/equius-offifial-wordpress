<?php
  /**
   * Template for displaying posts navigation on the category page
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
      <?php $prev = get_previous_posts_link( '<i class="fas fa-chevron-left"></i> <h3>Previous <span>Page</span></h3>' ); if( $prev ) : ?>
        <li>
          <?php echo $prev ?>
        </li>
      <?php endif; ?>
      <?php $next = get_next_posts_link( '<h3>Next <span>Page</span></h3> <i class="fas fa-chevron-right"></i>' ); if( $next ) : ?>
        <li>
          <?php echo $next ?>
        </li>
      <?php endif; ?>
    </div>
  </ul>
</nav>