<?php
  /**
   * Template part displaying mailing list with links widget
   * 
   * @package equius-official
   */
?>

<section class="widget__mailing_list">
    <ul class="widget__mailing_list_content">
      <li>
        <a href="#">
          <span>
            <h4>Knowledge Base</h4>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </span>
          <p>Explore our collection of investment research, articles, videos and commentary from independent sources.</p>
        </a>
      </li>
      <li>
        <a href="<?php  echo get_post_type_archive_link( 'asset_classes' ); ?>">
          <span>
            <h4>Asset Class</h4>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </span>
          <p>Don’t miss our monthly newsletter providing in-depth views of our investing philosophy and approach.</p>
        </a>
      </li>
      <li>
        <p>Join our mailinglist to receive updates on Equius.</p>
        <form action="">
          <input type="email" name="email" placeholder="Enter your email address here" />
          <button type="button">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow_right.png'?>" alt="">
          </button>
        </form>
      </li>
    </ul>
  </section>