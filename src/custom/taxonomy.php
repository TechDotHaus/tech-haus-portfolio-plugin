<?php
/**
 * Custom Taxonomies
 *
 * @package TechHaus\Portfolio\Custom
 * @since   1.0.0
 * @author  bobby.tv
 * @link    https://tech.haus
 * @license GPL-2.0+
 */

namespace TechHaus\Portfolio\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );
/**
 * Register the taxonomy.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomy () {

	$labels = array(
		'name'              => _x( 'Types', 'taxonomy general name', 'thportfolio' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'thportfolio' ),
		'search_items'      => __( 'Search Types', 'thportfolio' ),
		'all_items'         => __( 'All Types', 'thportfolio' ),
		'parent_item'       => __( 'Parent Type', 'thportfolio' ),
		'parent_item_colon' => __( 'Parent Type:', 'thportfolio' ),
		'edit_item'         => __( 'Edit Type', 'thportfolio' ),
		'view_item'         => __( 'View Type', 'thportfolio' ),
		'update_item'       => __( 'Update Type', 'thportfolio' ),
		'add_new_item'      => __( 'Add New Type', 'thportfolio' ),
		'new_item_name'     => __( 'New Type Name', 'thportfolio' ),
		'menu_name'         => __( 'Type', 'thportfolio' ),
	);

	$args = array(
		'label'        => __( 'Project Type', 'thportfolio' ),
		'labels'       => $labels,
		'hierarchical' => true,

	);

	register_taxonomy( 'project_type', 'projects', $args );
}

