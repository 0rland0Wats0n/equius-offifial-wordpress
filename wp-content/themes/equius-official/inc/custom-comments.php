<?php
  function cus_format_comment($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"> 
      <header>
        <?php
        if ( $args['avatar_size'] != 0 ) {
          echo get_avatar( $comment, $args['avatar_size'] ); 
        }
        ?>
      </header>
      <main>
        <span>
          <?php printf(__('%s'), get_comment_author_link()) ?>
          <p><?php echo get_comment_time() ?></p>
        </span>

        <div class="the_comment">
          <?php comment_text(); ?>
        </div>
      </main>
        
<?php } ?>