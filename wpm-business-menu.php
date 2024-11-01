<?php

/**
 *
 * @link              //wpmaster.com
 * @since             1.0.0
 * @package           Wpm_Business_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       WP Master Business Menu
 * Plugin URI:        //wpmaster.com/plugins/wp-master-business-menu
 * Description:       Simple and easy way to create a business menu. Whether you are developing a restaurant website or professional service website, use this plugin to create menu in minutes.
 * Version:           1.0.1
 * Author:            WP Master
 * Author URI:        //wpmaster.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpm-business-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpm-business-menu-activator.php
 */
function activate_wpm_business_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpm-business-menu-activator.php';
	Wpm_Business_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpm-business-menu-deactivator.php
 */
function deactivate_wpm_business_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpm-business-menu-deactivator.php';
	Wpm_Business_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpm_business_menu' );
register_deactivation_hook( __FILE__, 'deactivate_wpm_business_menu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpm-business-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpm_business_menu() {

	$plugin = new Wpm_Business_Menu();
	$plugin->run();

}
run_wpm_business_menu();
