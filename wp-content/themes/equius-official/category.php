<?php
  /**
   * Template for displaying the knowledge base category results page
   */

   get_header();
?>

<?php $category = get_queried_object()->name; ?>
  
  <main class="category_search">
    <?php get_template_part( 'template-parts/widgets/category', 'switcher' ); ?>

    <header>
      <span>
        <h2>Results for<br/> <?php  echo $category ?></h2>
      </span>
      <h3>Sorted Category</h3>
    </header>
    
    <?php if ( have_posts() ) { ?>
    
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