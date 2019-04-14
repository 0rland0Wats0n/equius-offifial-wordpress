<?php
  /**
   * Template for displaying a sorting dropdown on category pages
   * 
   * @package equius-official
   */

   global $wp;

   $curr_url = home_url( $wp->request );
   $order = get_query_var( "orderby", 1 );
?>
  
  <div class="widget__sort_posts">
    <p>Sort by:</p>
    <div class="sort_posts__switcher">
      <p>
        <?php
          if ( $order == "meta_value_num" ) {
            echo "Popularity";
          } elseif ( $order == "date" ) {
            echo "Date";
          } else {
            echo "Default";
          }
        ?>
      </p>
      <ul>
        <li>
          <a href="<?php echo $curr_url ?>">
            <?php if( $order == 1 ) { ?>
              <i class="fas fa-check"></i>
            <?php } ?>
            Default
          </a>
        </li>
        <li>
          <a href="<?php echo $curr_url . "?orderby=meta_value_num&meta_key=popular_posts&order=desc" ?>">
            <?php if( $order == "meta_value_num" ) { ?>
              <i class="fas fa-check"></i>
            <?php } ?>
            Popularity
          </a>
        </li>
        <li>
          <a href="<?php echo $curr_url . "?orderby=date&order=desc" ?>">
            <?php if( $order == "date" ) { ?>
              <i class="fas fa-check"></i>
            <?php } ?>
            Date
          </a>
        </li>
      </ul>
    </div>
  </div>