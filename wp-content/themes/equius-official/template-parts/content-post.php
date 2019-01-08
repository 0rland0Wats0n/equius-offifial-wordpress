<?php
/**
 * Template part for displaying the contents of a single post
 *
 *
 * @package equiusofficial
 */
?>

<article class="post__single" id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>
  <header style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
    <div class="post__meta">
      <span style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( "ID" ) ); ?>)"></span>
      <p>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( "ID" ) ); ?>">
          <?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" )?>
        </a>
        <?php $post_categories = get_the_category( get_the_ID() );
          if( !empty($post_categories) ) : ?>
          <span><?php echo $post_categories[0]->name ?></span>
        <?php endif; ?>
        <span><?php echo the_time( "m.d.Y" ); ?></span>
      </p>
    </div>
    <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
  </header>
  <main>
    <?php if ( is_active_sidebar( 'kb_social_share' ) ) : ?>
        <div id="kb-social-share" class="primary-sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'kb_social_share' ); ?>
        </div>
    <?php endif; ?>
    <?php the_content(); ?>
  </main>
</article>