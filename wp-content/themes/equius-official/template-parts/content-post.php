<?php
/**
 * Template part for displaying the contents of a single post
 *
 *
 * @package equiusofficial
 */
?>

<article class="post__single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
    <div class="post__meta">
      <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
      <p>
        <span><?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?></span>
        <?php $post_categories = get_the_category( the_ID() );
          if( !empty($post_categories) ) : ?>
          <span><?php echo $post_categories[0]->name ?></span>
        <?php endif; ?>
        <span><?php echo date("m.d.Y", time( get_the_date() ) ); ?></span>
      </p>
    </div>
    <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
  </header>
  <main>
    
    <?php the_content() ?>
  </main>
</article>