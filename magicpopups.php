<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.vozax.com/magic-popups/
 * @since             1.0.0
 * @package           Magic_Popups
 *
 * @wordpress-plugin
 * Plugin Name:       Magic Popups
 * Plugin URI:        https://www.vozax.com/magic-popups/
 * Description:       The most complete popup plugin. Create Magic Popups with multiple selections & styles to show up on the front end.
 * Version:           1.0.0
 * Author:            Vozax
 * Author URI:        http://www.vozax.com/
 * Text Domain:       Vozax.com
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_vozax_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-magic-popups-activator.php';
	Vozax_Popup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_vozax_popup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-magic-popups-deactivator.php';
	Vozax_Popup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vozax_popup' );
register_deactivation_hook( __FILE__, 'deactivate_vozax_popup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-magic-popups.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vozax_popup() {

	$plugin = new vozaxPopup();
	$plugin->run();
}
run_vozax_popup();
