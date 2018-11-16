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

	$labels = array(
		'name'                       => _x( 'Skills', 'taxonomy general name', 'thportfolio' ),
		'singular_name'              => _x( 'Skill', 'taxonomy singular name', 'thportfolio' ),
		'search_items'               => __( 'Search Skills', 'thportfolio' ),
		'popular_items'              => __( 'Popular Skills', 'thportfolio' ),
		'all_items'                  => __( 'All Skills', 'thportfolio' ),
		'parent_item'                => __( 'Parent Skill', 'thportfolio' ),
		'parent_item_colon'          => __( 'Parent Skill:', 'thportfolio' ),
		'edit_item'                  => __( 'Edit Skill', 'thportfolio' ),
		'view_item'                  => __( 'View Skill', 'thportfolio' ),
		'update_item'                => __( 'Update Skill', 'thportfolio' ),
		'add_new_item'               => __( 'Add New Skill', 'thportfolio' ),
		'new_item_name'              => __( 'New Skill Name', 'thportfolio' ),
		'separate_items_with_commas' => __( 'Separate Skills with commas', 'thportfolio' ),
		'add_or_remove_items'        => __( 'Add or remove Skills', 'thportfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used Skills', 'thportfolio' ),
		'not_found'                  => __( 'No Skills found.', 'thportfolio' ),
		'menu_name'                  => __( 'Skills', 'thportfolio' ),
	);

	$args = array(
		'label'        => __( 'Skills', 'thportfolio' ),
		'labels'       => $labels,
		'hierarchical' => false,
	);

	register_taxonomy( 'skills', 'projects', $args );
}

