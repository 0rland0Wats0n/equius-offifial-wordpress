<?php
  /**
   * Template for displaying posts by an author
   */

   get_header();
?>

<?php $author = get_queried_object()->ID; ?>

  <main class="author">
    <header>
      <div>
        <h1>
          <?php echo get_the_author_meta( "user_firstname" ) ?> 
          <br />
          <?php echo get_the_author_meta( "user_lastname" ); ?>
        </h1>
        <h3><?php echo get_the_author_meta( "description" ); ?></h3>
        <span>
          <i class="fas fa-envelope"></i>
          <a href="mailto:<?php echo get_the_author_meta( "user_email" ); ?>"><?php echo get_the_author_meta( "user_email" ); ?></a>
        </span>
        <span>
          <i class="fab fa-linkedin"></i>
          <a href="<?php echo get_the_author_meta( "user_url" ); ?>">View LinkedIn Profile</a>
        </span>
      </div>
    </header>

    <section>
      <h3 class="object__fancy_heading">
        <?php if ( is_paged() ) { ?>  
          More Posts by <?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" ) ?> 
        <?php } else { ?>
          Recent Posts by <?php echo get_the_author_meta( "user_firstname" ) . " " . get_the_author_meta( "user_lastname" ) ?>
        <?php } ?>
      </h3>
      <div class="author__posts">
        <?php 
          if ( have_posts() ) : 

          while ( have_posts() ) :
          
          the_post();

          get_template_part( 'template-parts/content', 'post-card' );

        ?>

        <?php endwhile; endif; ?>
      </div>
    </section>

    <?php get_template_part( 'template-parts/widgets/category', 'posts-navigation' ); ?>
  </main>

<?php get_footer(); ?>