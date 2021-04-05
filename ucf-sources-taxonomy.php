<?php
/*
Plugin Name: UCF Source Taxonomy Plugin
Description: Plugin to create a WordPress Source Taxonomy.
Version: 1.1.0
Author: UCF Web Communications
License: GPL3
GitHub Plugin URI: UCF/UCF-Source-Taxonomy-Plugin
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'UCF_SOURCES__FILE', __FILE__ );

include_once 'includes/ucf-sources-taxonomy.php';

if ( ! function_exists( 'ucf_sources_activation' ) ) {
	function ucf_sources_activation() {
		UCF_Sources_Taxonomy::register();
		flush_rewrite_rules();
	}
	register_activation_hook( 'ucf_sources_activation', UCF_SOURCES__FILE );
}

if ( ! function_exists( 'ucf_sources_deactivation' ) ) {
	function ucf_sources_deactivation() {
		flush_rewrite_rules();
	}
	register_deactivation_hook( 'ucf_sources_deactivation', UCF_SOURCES__FILE );
}

// Run base actions inside of 'plugins_loaded' hook so we
// can check for the existence of other post_types and taxonomies
if ( ! function_exists( 'ucf_sources_init' ) ) {
	function ucf_sources_init() {
		// Register custom taxonomy
		add_action( 'init', array( 'UCF_Sources_Taxonomy', 'register' ), 10, 0 );

		// Register ACF fields for custom taxonomy
		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) || is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
			add_action( 'acf/init', array( 'UCF_Sources_Taxonomy', 'register_acf_fields' ), 10, 0 );
		}
	}
	add_action( 'plugins_loaded', 'ucf_sources_init' );
}
