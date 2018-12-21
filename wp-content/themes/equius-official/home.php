<?php
  /**
   * Template for displaying the knowledge base (blog) home
   */

   get_header();
?>
  
  <main id="main" class="site-main">
    <?php 
      
      if ( !is_paged() ) {
        get_template_part( 'template-parts/content', 'most-recent-post' );
      }
      
      get_template_part( 'template-parts/widgets/category', 'switcher' );

      if ( have_posts() ) :
    ?>

    <section class="posts__recent">
      <h3 class="object__fancy_heading">
        <?php if ( is_paged() ) { ?>  
          Articles
        <?php } else { ?>
          Recent Posts
        <?php } ?>
      </h3>
      <div class="posts__recent_contatainer">
        <?php 
          if ( have_posts() ) : 
          $i = 0;
          while ( have_posts() && $i < 8 ) :
          
          the_post();

          get_template_part( 'template-parts/content', 'post-card' );

          $i++;
        ?>

        <?php endwhile; endif; ?>
      </div>
    </section>
    
    <?php if ( !is_paged() ) : ?>
      <section class="posts__popular">
        <?php get_template_part( 'template-parts/content', 'most-popular-posts' ); ?>
      </section>
    <?php endif; ?>
    
    <?php if ( !is_paged() ) : ?>
      <section class="posts__view_all">
        <?php echo get_next_posts_link("View All Articles"); ?>
      </section>
    <?php endif; ?>

    <?php 
      if ( is_paged() ) {

        get_template_part( 'template-parts/widgets/posts', 'navigation' );

      }

      endif;

      if ( !have_posts() ) :
    ?>

    <section class="posts__empty">
      <h1>whoops!</h1>
      <h4>No posts added yet. Join our mailing list to keep up to date with us.</h4>
    </section>

    <?php endif; ?>
  </main>

<?php get_footer(); ?>