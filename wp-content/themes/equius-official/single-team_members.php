<?php
/**
 * The template for displaying single a single team member
 *
 *
 * @package equiusofficial
 */

get_header();
?>

  <div id="primary" class="content-area">
		<main id="main" class="site-main team_members__single">

      <h1>Wisdom never gets old.</h1>
      <section class="team_members__single_content">
        <?php
          while ( have_posts() ) :
            the_post();
            
            $headshot =   get_field( 'team_member_photo' );
            $linkedin =   get_field( 'team_member_linkedin' );
            $phone =      get_field( 'team_member_phone' );
            $email =      get_field( 'team_member_email' );
        ?>
            <img src="<?php echo $headshot ?>" alt="" />
            <div>
              <h3><?php echo get_the_title() ?></h3>
              <h4><?php echo get_field( 'team_member_role' ) ?></h4>
              <?php echo get_field( 'team_member_bio' ) ?>
              <span>
                <?php if ( $linkedin ) : ?>
                  <a href="<?php echo $linkedin ?>">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                <?php endif; ?>
                <?php if ( $phone ) : ?>
                  <p>
                    <span class="ss-icon">phone</span>
                    <span><?php echo $phone ?></span>
                  </p>
                <?php endif; ?>
                <?php if ( $email ) : ?>
                  <p>
                    <span class="ss-icon">email</span>
                    <span><?php echo $email ?></span>
                  </p>
                <?php endif; ?>
              </span>
            </div>
        <?php endwhile; ?>
      </section>
      <section class="team_members__single_carousel">
        <?php get_template_part( 'template-parts/content', 'team' ); ?>
      </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>