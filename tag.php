<?php
  /**
   * Template for displaying the knowledge base tag results page
   */

   get_header();
?>

<?php $tag = get_queried_object()->name; ?>
  
  <main class="category_search">
    <?php get_template_part( 'template-parts/widgets/category', 'switcher' ); ?>

    <header>
      <span>
        <h2>Results for<br/> <?php  echo $tag ?></h2>
        <?php get_template_part( 'template-parts/widgets/posts', 'sort' ); ?>
      </span>
      <h3 class="object__fancy_heading">Sorted Category</h3>
    </header>
    <?php if ( have_posts() ) { ?>
      <section class="category_search__results">
      <?php
        while ( have_posts() ) :
          the_post();
          get_template_part( 'template-parts/content', 'post-card' );
        endwhile;

        get_template_part( 'template-parts/widgets/category', 'posts-navigation' ); ?> 
      </section>
    <?php } else { ?>
      <section class="category_search__empty">
        <h1>whoops!</h1>
        <h4>Looks like there are no posts in the category you selected. Try another category.</h4>
      </section>
      <section class="category_search__back_to_posts">
        <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">
          <h3>Return to Knowledge Base</h3>
        </a>
      </section>
    <?php } ?>

  </main>

<?php get_footer(); ?>