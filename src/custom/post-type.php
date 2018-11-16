<?php
/**
 * Custom Post Type functionality
 *
 * @package     TechHaus\Portfolio\Custom
 * @since       1.0.0
 * @author      bobby.tv
 * @link        https://tech.haus
 * @license     GNU General Public License 2.0+
 */
namespace TechHaus\Portfolio\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_post_type' );
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_post_type() {

	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'thportfolio' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'thportfolio' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'thportfolio' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'thportfolio' ),
		'add_new'            => _x( 'Add New', 'project', 'thportfolio' ),
		'add_new_item'       => __( 'Add New Project', 'thportfolio' ),
		'new_item'           => __( 'New Project', 'thportfolio' ),
		'edit_item'          => __( 'Edit Project', 'thportfolio' ),
		'view_item'          => __( 'View Project', 'thportfolio' ),
		'all_items'          => __( 'All Projects', 'thportfolio' ),
		'search_items'       => __( 'Search Projects', 'thportfolio' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'thportfolio' ),
		'not_found'          => __( 'No projects found.', 'thportfolio' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'thportfolio' ),

		'featured_image'        => __( 'Project Image', 'thportfolio' ),
		'set_featured_image'    => __( 'Set Project Image', 'thportfolio' ),
		'remove_featured_image' => __( 'Remove Project Image', 'thportfolio' ),
		'use_featured_image'    => __( 'Use Project Image', 'thportfolio' ),
	);

	$features = get_all_post_type_features( 'post', array(
		'excerpt',
		'comments',
		'trackbacks',
		'custom-fields',
	));

	$args = array(
		'label'  => __( 'Portfolio Projects', 'thportfolio' ),
		'labels' => $labels,
		'public' => true,
		'supports' => $features,
	);

	register_post_type( 'projects', $args );
}

/**
 * Get all of the post type features for the given post type.
 *
 * @since 1.0.0
 *
 * @param string $post_type Given post type.
 *
 * @return array
 */
function get_all_post_type_features( $post_type = 'post', $exclude_features = array() ) {
	$configured_features = get_all_post_type_supports( $post_type );

	if ( ! $exclude_features ) {
		return array_keys( $configured_features );
	}

	$features = array();

	foreach( $configured_features as $feature => $value ) {
		if (in_array($feature, $exclude_features )) {
			continue;
		}

		$features[] = $feature;
	}
	return $features;
}