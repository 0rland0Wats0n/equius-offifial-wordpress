<?php 
  /**
   * Template part for displaying a single post card
   * 
   * @package equius-official
   */
?>

<section class="post_card">
  <header>
    <div class="object__absolute_bg"
      style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
    <div class="object__overlay"></div>
    <?php $post_categories = get_the_category( get_the_ID() );
      if( !empty($post_categories) ) : ?>
      <span>
        <span class="ss-icon">book</span>
        <a href="<?php echo get_category_link( $post_categories[0]->term_id ) ?>"><?php echo $post_categories[0]->name ?></a>
      </span>
    <?php endif; ?>
  </header>
  <main>
    <div class="post_card__meta">
       <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
       <a href="<?php echo get_author_posts_url( get_the_author_meta( "ID" ) ); ?>">
          <?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?>
        </a>
    </div>
    <a href="<?php echo get_permalink( get_the_ID() ) ?>">
        <?php the_title( '<h4 class="post_card__title">', '</h4>' ); ?>
    </a>
    <p class="post_card__date"><?php echo date("m.d.Y", time( get_the_date() ) ); ?></p>
    <p class="post_card__excerpt"><?php echo substr( get_the_excerpt(), 0, 150 ) ?></p>
  </main>
</section>