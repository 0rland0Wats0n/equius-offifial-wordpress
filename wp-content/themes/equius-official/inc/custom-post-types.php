<?php

  /**
		 * Add custom post type
		 * Team Members
		 */

		 function create_team_members_post_type() {
					$supports = array(
							'revisions'
					);

					$labels = array(
							'name'              => _x( 'All Team Members', 'plural' ),
							'singular_name'     => _x( 'Team Member', 'singular' ),
							'menu_name'         => _x( 'Team Members', 'admin menu' ),
							'name_admin_bar'    => _x( 'Team Members', 'admin bar' ),
							'add_new'           => _x( 'Add New', 'add new' ),
							'add_new_item'      => __( 'Add New Team Member' ),
							'new_item'          => __( 'New Team Member' ),
							'edit_item'         => __( 'Edit Team Member' ),
							'view_item'         => __( 'View Team Members' ),
							'all_items'         => __( 'All Team Members' ),
							'search_items'      => __( 'Search Team Members' ),
							'not_found'         => __( 'No team members found.' ),
					);

					$args = array(
							'supports'      => $supports,
							'labels'        => $labels,
							'public'        => true,
							'query_var'     => true,
							'has_archive'   => false,
							'hierarchical'  => false
					);

					register_post_type( 'team_members', $args );
			}
      add_action( 'init', 'create_team_members_post_type' );
      
      /**
		 * Add custom post type
		 * Team Members
		 */

		 function create_testimonial_post_type() {
					$supports = array(
              'revisions'
					);

					$labels = array(
							'name'              => _x( 'All Testimonials', 'plural' ),
							'singular_name'     => _x( 'Testimonial', 'singular' ),
							'menu_name'         => _x( 'Testimonials', 'admin menu' ),
							'name_admin_bar'    => _x( 'Testimonials', 'admin bar' ),
							'add_new'           => _x( 'Add New', 'add new' ),
							'add_new_item'      => __( 'Add New Testimonial' ),
							'new_item'          => __( 'New Testimonial' ),
							'edit_item'         => __( 'Edit Testimonial' ),
							'view_item'         => __( 'View Testimonials' ),
							'all_items'         => __( 'All Testimonials' ),
							'search_items'      => __( 'Search Testimonials' ),
							'not_found'         => __( 'No Testimonials found.' ),
					);

					$args = array(
							'supports'      => $supports,
							'labels'        => $labels,
							'public'        => true,
							'query_var'     => true,
							'has_archive'   => false,
							'hierarchical'  => false
					);

					register_post_type( 'testimonials', $args );
			}
      add_action( 'init', 'create_testimonial_post_type' );

      /**
			 * Update column headings for the team members post type
			 */

?>