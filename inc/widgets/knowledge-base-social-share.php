<?php
/*
Plugin Name: Knowledge Base Social Share
Plugin URI: http://wordpress.org/extend/plugins/#
Description: Simple widget to add social share nav bar to single posts pages
Author: Orlando Watson
Version: 1.0
Author URI: http://www.orlandogwatson.com/
*/

  class KB_Social_share extends WP_Widget {
    // class constructor
    public function __construct() {
      $widget_ops = array( 
        'classname' => 'kb_social_share',
        'description' => 'Simple widget to add social share nav bar to single posts pages.',
      );

      parent::__construct( 'kb_social_share', 'Knowledge Base Social Share', $widget_ops );
    }

    public function form( $instance ) {
      ?>
      <p>
        Nice! You're displaying the social share widget on single post pages.
      </p><?php 
    }

    public function widget( $args, $instance ) {
      global $post;

      $url = urlencode( get_the_permalink() );
      $title = htmlspecialchars( urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' );
      
      $twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url;
      $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
      $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;

      ?>

      <nav class="widget__kb_social_share">
        <?php if (function_exists('pf_show_link')) { ?>
          <li>
            <?php echo pf_show_link(); ?>
          </li>
        <?php } ?>
        <li>
          <a href="<?php echo $facebookURL?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="<?php echo $linkedInURL?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </li>
        <li>
          <a href="<?php echo $twitterURL?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
      </nav>

      <?php
      echo $args['after_widget'];
    }
  }

  function register_kb_social_share() { 
    register_widget( 'KB_Social_share' );
  }
  add_action( 'widgets_init', 'register_kb_social_share' );

  ?>
