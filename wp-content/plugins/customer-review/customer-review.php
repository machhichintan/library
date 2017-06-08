<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              chintanmachhi.multidots@gmail.com
 * @since             1.0.0
 * @package           Customer_Review
 *
 * @wordpress-plugin
 * Plugin Name:       Customer Reivew
 * Plugin URI:        store.multidots.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Chintan
 * Author URI:        chintanmachhi.multidots@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       customer-review
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-customer-review-activator.php
 */
function activate_customer_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customer-review-activator.php';
	Customer_Review_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-customer-review-deactivator.php
 */
function deactivate_customer_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customer-review-deactivator.php';
	Customer_Review_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_customer_review' );
register_deactivation_hook( __FILE__, 'deactivate_customer_review' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-customer-review.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_customer_review() {

	$plugin = new Customer_Review();
	$plugin->run();

}
run_customer_review();

function frontend_display_page()
{
    if(is_page('reviews')){   
        $dir = plugin_dir_path( __FILE__ );
        include($dir."frontend-form.php");
        die();
    }
}
add_action( 'wp', 'frontend_display_page' );

