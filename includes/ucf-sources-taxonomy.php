<?php
/**
 * Responsible for registering the taxonomy
 **/
if ( ! class_exists( 'UCF_Sources_Taxonomy' ) ) {
	class UCF_Sources_Taxonomy {
		/**
		 * Registers the Sources custom taxonomy
		 * @author RJ Bruneel
		 * @since 1.0.0
		 **/
		public static function register() {
			$labels = apply_filters(
				'ucf_sources_labels',
				array(
					'singular' => 'Source',
					'plural'   => 'Sources',
					'slug'     => 'sources'
				)
			);

			$post_types = array( 'ucf_resource_link' );

			register_taxonomy( 'sources', $post_types, self::args( $labels ) );
		}

		/**
		 * Returns an array of labels for the custom taxonomy.
		 * @author RJ Bruneel
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function labels( $singular, $plural ) {
			return array(
				'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_sources' ),
				'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_sources' ),
				'menu_name'                  => __( $plural, 'ucf_sources' ),
				'all_items'                  => __( 'All ' . $plural, 'ucf_sources' ),
				'parent_item'                => __( 'Parent ' . $singular, 'ucf_sources' ),
				'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_sources' ),
				'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_sources' ),
				'add_new_item'               => __( 'Add New ' . $singular, 'ucf_sources' ),
				'edit_item'                  => __( 'Edit ' . $singular, 'ucf_sources' ),
				'update_item'                => __( 'Update ' . $singular, 'ucf_sources' ),
				'view_item'                  => __( 'View ' . $singular, 'ucf_sources' ),
				'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_sources' ),
				'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_sources' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_sources' ),
				'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_sources' ),
				'search_items'               => __( 'Search ' . $plural, 'ucf_sources' ),
				'not_found'                  => __( 'Not Found', 'ucf_sources' ),
				'no_terms'                   => __( 'No items', 'ucf_sources' ),
				'items_list'                 => __( $plural . ' list', 'ucf_sources' ),
				'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_sources' ),
			);
		}

		public static function args( $labels ) {
			$singular = $labels['singular'];
			$plural   = $labels['plural'];
			$slug     = $labels['slug'];

			$args = array(
				'labels'                     => self::labels( $singular, $plural ),
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => array(
					'slug'         => $slug,
					'hierarchical' => true,
					'ep_mask'      => EP_PERMALINK | EP_PAGES
				)
			);

			$args = apply_filters( 'ucf_sources_args', $args );

			return $args;
		}
	}
}
