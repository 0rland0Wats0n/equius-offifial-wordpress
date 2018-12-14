<?php 
/**
 * Template part for displaying the most recent asset class
 * 
 * @package equius-official
 */
?>

<?php
  $args = array(
    'numberposts' => 1,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'include' => '',
    'exclude' => '',
    'meta_key' => '',
    'meta_value' =>'',
    'post_type' => 'asset_classes',
    'post_status' => 'publish',
    'suppress_filters' => true
  );

  $most_recent = wp_get_recent_posts( $args, ARRAY_A );
?>

<?php if( $most_recent ) : ?>

  <section class="asset_classes__most_recent">
    <div class="asset_classes__most_recent_content">
      <h1>Asset Class</h1>
      <h4>latest asset class</h4>
      <h2><?php echo $most_recent[0]["post_title"] ?></h2>
      <p><?php echo date("F Y", time($most_recent[0]["post_date"])) ?></p>
      <p><?php echo $most_recent[0]["post_content"] ?></p>
    </div>
  </section>

<?php 
  endif;
  wp_reset_query(); 
?>