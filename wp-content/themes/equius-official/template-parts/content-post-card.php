<?php 
  /**
   * Template part for displaying a single post card
   * 
   * @package equius-official
   */
?>

<section class="post_card">
  <header style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
    <?php $post_categories = get_the_category( get_the_ID() );
      if( !empty($post_categories) ) : ?>
      <span>
        <span class="ss-icon">book</span>
        <?php echo $post_categories[0]->name ?>
      </span>
    <?php endif; ?>
  </header>
  <main>
    <div class="post_card__meta">
       <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
       <p><?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?></p>
    </div>
    <a href="<?php echo get_permalink( get_the_ID() ) ?>">
        <?php the_title( '<h4 class="post_card__title">', '</h4>' ); ?>
    </a>
    <p class="post_card__date"><?php echo date("m.d.Y", time( get_the_date() ) ); ?></p>
    <p class="post_card__excerpt"><?php echo get_the_excerpt() ?></p>
  </main>
</section>