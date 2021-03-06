<?php

  /**
		 * Add custom post type
		 * Team Members
		 */

		 function create_team_members_post_type() {
					$supports = array(
							'revisions',
							'title'
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
							'not_found'         => __( 'No team members found.' )
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
			
			add_filter( 'manage_team_members_posts_columns', 'set_custom_edit_team_members_columns' );
			function set_custom_edit_team_members_columns($columns) {
					$columns['team_member_role'] = __( 'Role', 'textdomain' );
					return $columns;
			}

			add_filter('manage_posts_columns', 'column_order');
			function column_order($columns) {
				$n_columns = array();
				$move = 'team_member_role';
				$before = 'date';
				foreach($columns as $key => $value) {
					if ($key==$before){
						$n_columns[$move] = $move;
					}
						$n_columns[$key] = $value;
				}
				return $n_columns;
			}

			add_action( 'manage_team_members_posts_custom_column' , 'custom_team_members_column', 10, 2 );
			function custom_team_members_column( $column, $post_id ) {
					switch ( $column ) {
						case 'team_member_name' :
								echo get_field( 'team_member_name', $post_id );
								break;

						case 'team_member_role' :
								echo get_field( 'team_member_role', $post_id );
								break;
					}
			}

			add_filter('enter_title_here', 'team_members_title_placeholder' , 20 , 2 );
			function team_members_title_placeholder($title , $post){

					if( $post->post_type == 'team_members' ){
							$my_title = "Enter team member name here";
							return $my_title;
					}

					return $title;

			}
      
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
			
			add_filter( 'manage_testimonials_posts_columns', 'set_custom_edit_testimonials_columns' );
			function set_custom_edit_testimonials_columns($columns) {
					unset( $columns['title'] );
					$columns['testimonial_attestant'] = __( 'Attestant', 'textdomain' );
					$columns['testimonial_job_title'] = __( 'Job Title', 'textdomain' );
					$columns['testimonial_company'] = __( 'Company', 'textdomain' );

					return $columns;
			}

			add_action( 'manage_testimonials_posts_custom_column' , 'custom_testimonials_column', 10, 2 );
			function custom_testimonials_column( $column, $post_id ) {
					switch ( $column ) {
						case 'testimonial_attestant' :
								echo get_field( 'testimonial_attestant', $post_id );
								break;

						case 'testimonial_job_title' :
								echo get_field( 'testimonial_job_title', $post_id );
								break;
						
						case 'testimonial_company' :
								echo get_field( 'testimonial_company', $post_id );
								break;
					}
			}

      /**
			 * Update column headings for the team members post type
			 */

			 function create_asset_class_post_type() {
					$supports = array(
							'revisions',
							'title',
							'editor'
					);

					$labels = array(
							'name'              => _x( 'Asset Classes', 'plural' ),
							'singular_name'     => _x( 'Asset Class', 'singular' ),
							'menu_name'         => _x( 'Asset Classes', 'admin menu' ),
							'name_admin_bar'    => _x( 'Asset Classes', 'admin bar' ),
							'add_new'           => _x( 'Add New', 'add new' ),
							'add_new_item'      => __( 'Add New Asset Class' ),
							'new_item'          => __( 'New Asset Class' ),
							'edit_item'         => __( 'Edit Asset Class' ),
							'view_item'         => __( 'View Asset Classes' ),
							'all_items'         => __( 'All Asset Classes' ),
							'search_items'      => __( 'Search Asset Classes' ),
							'not_found'         => __( 'No asset classes found.' ),
					);

					$args = array(
							'supports'      => $supports,
							'labels'        => $labels,
							'public'        => true,
							'query_var'     => true,
							'has_archive'   => true,
							'hierarchical'  => false
					);

					register_post_type( 'asset_classes', $args );
			}
			add_action( 'init', 'create_asset_class_post_type' );
			
			// rewrite permalink rules to make custom archive pages by date work
			add_action('generate_rewrite_rules', 'my_date_archives_rewrite_rules');
			function my_date_archives_rewrite_rules($wp_rewrite) {
				$rules = my_generate_date_archives('asset_classes', $wp_rewrite);
				$wp_rewrite->rules = $rules + $wp_rewrite->rules;
				return $wp_rewrite;
			}

			function my_generate_date_archives($cpt, $wp_rewrite) {
				$rules = array();

				$post_type = get_post_type_object($cpt);
				$slug_archive = $post_type->has_archive;
				if ($slug_archive === false) return $rules;
				if ($slug_archive === true) {
					$slug_archive = isset($post_type->rewrite['slug']) ? $post_type->rewrite['slug'] : $post_type->name;
				}

				$dates = array(
					array(
						'rule' => "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})",
						'vars' => array('year', 'monthnum', 'day')),
					array(
						'rule' => "([0-9]{4})/([0-9]{1,2})",
						'vars' => array('year', 'monthnum')),
					array(
						'rule' => "([0-9]{4})",
						'vars' => array('year'))
				);

				foreach ($dates as $data) {
					$query = 'index.php?post_type='.$cpt;
					$rule = $slug_archive.'/'.$data['rule'];

					$i = 1;
					foreach ($data['vars'] as $var) {
						$query.= '&'.$var.'='.$wp_rewrite->preg_index($i);
						$i++;
					}

					$rules[$rule."/?$"] = $query;
					$rules[$rule."/feed/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
					$rules[$rule."/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
					$rules[$rule."/page/([0-9]{1,})/?$"] = $query."&paged=".$wp_rewrite->preg_index($i);
				}

				return $rules;
			}

			// track popular posts
			function cus_popular_posts($post_id) {
				$count_key = 'popular_posts';
				$count = get_post_meta($post_id, $count_key, true);
				if ($count == '') {
					$count = 0;
					delete_post_meta($post_id, $count_key);
					add_post_meta($post_id, $count_key, '0');
				} else {
					$count++;
					update_post_meta($post_id, $count_key, $count);
				}
			}
			function cus_track_posts($post_id) {
				if (!is_single()) return;
				if (empty($post_id)) {
					global $post;
					$post_id = $post->ID;
				}
				cus_popular_posts($post_id);
			}
			add_action('wp_head', 'cus_track_posts');

			function cus_increase_posts_per_page( $query ) {
			if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
							$query->set( 'posts_per_page', 20 );
					}
			}
			add_action( 'pre_get_posts', 'cus_increase_posts_per_page' );
?>