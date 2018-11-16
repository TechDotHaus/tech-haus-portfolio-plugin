<?php
/**
 * Tech.Haus Portfolio Plugin
 *
 * @package     TechHaus\Portfolio
 * @author      bobby.tv
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Tech.Haus Portfolio Plugin
 * Plugin URI:  https://tech.haus
 * Description: Basic Portfolio CPT and Tax Setup
 * Version:     1.0.0
 * Author:      bobby.tv
 * Author URI:  https://bobby.tv
 * Text Domain: thportfolio
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace TechHaus\Portfolio;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'THPORTFOLIO_URL', $plugin_url );
	define( 'THPORTFOLIO_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Initialize the plugin hooks
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
	register_uninstall_hook( __File__, __NAMESPACE__ . '\uninstall_plugin');
}

/**
 * Plugin activation handler.
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_plugin() {
	init_autoloader();

	Custom\register_custom_post_type();
	Custom\register_custom_taxonomy();

	flush_rewrite_rules();
}

/**
 * The plugin is deactivating.  Delete out the rewrite rules option.
 *
 * @since 1.0.1
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}

/**
 * Uninstall plugin handler
 *
 * @since 1.0.1
 *
 * @return void
 */
function uninstall_plugin() {
	delete_option( 'rewrite_rules' );
}

/**
 * Kick off the plugin by initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_autoloader() {
	require_once( 'src/support/autoloader.php' );

	Support\autoload_files( __DIR__ . '/src/' );
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_autoloader();
}

init_constants();
init_hooks();
launch();
