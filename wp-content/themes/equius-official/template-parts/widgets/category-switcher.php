<?php
  /**
   * Template for displaying the category switcher widget
   * 
   * @package equius-official
   */

  $cat_id = get_query_var( 'cat' );

   $args = array(
     'order_by' => 'name',
     'order'    => 'ASC'
   );

   $categories = get_categories( $args );
?>

<section class="widget__category_switcher">
   <h3>I'm Looking For</h3>
   <section>
      <?php if( $cat_id ) : ?>
        <h3><?php echo get_category( $cat_id )->name ?></h3>
      <?php endif; ?>
      <i class="fas fa-chevron-down widget__category_switcher__toggler"></i>
    <ul data-state="closed">
      <?php foreach( $categories as $category ) : ?>
        <li><a href="<?php echo get_category_link( $category->term_id ) ?>">
          <?php echo $category->name ?>
        </a></li>
      <?php endforeach; ?>
    </ul>
   </section>
</section>

