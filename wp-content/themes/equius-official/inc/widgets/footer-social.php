<?php
/*
Plugin Name: Footer Social
Plugin URI: http://wordpress.org/extend/plugins/#
Description: Simple widget to add social icon to footer
Author: Orlando Watson
Version: 1.0
Author URI: http://www.orlandogwatson.com/
*/
?>

<?php
  class Footer_Social extends WP_Widget {
    // class constructor
    public function __construct() {
      $widget_ops = array( 
        'classname' => 'footer_social',
        'description' => 'A plugin to add a social icon to the footer.',
      );

      parent::__construct( 'footer_social', 'Footer Social', $widget_ops );
    }

    public function form( $instance ) {
      $link = ! empty( $instance['profile_link'] ) ? $instance['profile_link'] : ''; ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'profile_link' ); ?>">LinkedIn Profile:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'profile_link' ); ?>" value="<?php echo esc_attr( $link ); ?>" />
      </p><?php 
    }

    public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'profile_link' ] = strip_tags( $new_instance[ 'profile_link' ] );
      return $instance;
    }

    public function widget( $args, $instance ) {

      $link = $instance[ 'profile_link' ]; ?>

      <a href="<?php echo $link ?>" target="_blank">
        <i class="fab fa-linkedin-in"></i>
      </a>

      <?php
      echo $args['after_widget'];
    }
  }

  function register_footer_social() { 
    register_widget( 'Footer_Social' );
  }
  add_action( 'widgets_init', 'register_footer_social' );
?>  