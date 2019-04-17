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
      <i class="fas fa-chevron-down widget__category_switcher__toggler"></i>
      <?php if( $cat_id ) : ?>
        <h3><?php echo get_category( $cat_id )->name ?></h3>
      <?php endif; ?>
    <ul data-state="closed">
      <li class="tag__asset_class">
        <a href="<?php echo get_post_type_archive_link( 'asset_classes' ); ?>">Asset Class</a>
      </li>
      <li class="tag__video">
        <?php $tag = get_term_by( "slug", "video", "post_tag" ); ?>
        <a href="<?php echo get_tag_link( $tag ); ?>">Video</a>
      </li>
      <?php foreach( $categories as $category ) : ?>
        <li><a href="<?php echo get_category_link( $category->term_id ) ?>">
          <?php echo $category->name ?>
        </a></li>
      <?php endforeach; ?>
    </ul>
   </section>
</section>

