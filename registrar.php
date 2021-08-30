<?php
/**
 * @package Registrar
 * @author Samarajya Shrestha
 * @copyright 2021 Samarajya Shrestha
 * 
 * @wordpress-plugin
 * Plugin Name: Registrar
 * Description: Simple user registration form to save list of users who can review a product. List the users on the basis of ratings or data reviewed.
 * Author: Samarajya Shrestha
 * Version: 1.0.0
 * Author URI: https://samarajyastha.com.np
 * License: GPLv3 or later
 * Text Domain: registrar
 * Requires at Least: 5.4
 * Requires PHP: 7.2
 */

/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
 // Exit if accessed directly.
defined( 'ABSPATH' ) or die( 'You cannot access this file.' );

// Include classes
include_once ( __DIR__ ). '/includes/class-registrar-admin-menu.php';
include_once ( __DIR__ ). '/includes/class-registrar-form-template.php';
include_once ( __DIR__ ). '/includes/class-registrar-send-email.php';
include_once ( __DIR__ ). '/includes/class-registrar-submit-form.php';
include_once ( __DIR__ ). '/includes/class-registrar-users.php';
include_once ( __DIR__ ). '/includes/class-registrar-validation.php';

class Registrar {

    // Methods
    function __construct() {

        // Load CSS
        wp_enqueue_style( 'bootstrap', plugin_dir_url(__FILE__). 'assets/css/bootstrap.min.css', [], 1.0 );
        wp_enqueue_style( 'style', plugin_dir_url(__FILE__). 'assets/css/style.css', [], 1.0 ); 

        // Load JS
        wp_enqueue_script( 'bootstrap-bundle', plugin_dir_url(__FILE__). 'assets/js/bootstrap.bundle.min.js', [], 1.0, true );
        wp_enqueue_script( 'main', plugin_dir_url(__FILE__). 'assets/js/main.js', [], 1.0, true );
        
        if( class_exists( 'RegistrarAdminMenu' ) ) {
            $registrarAdminMenu = new RegistrarAdminMenu();
            add_action( 'admin_menu', array( $registrarAdminMenu, 'create_admin_menu' ) );
        }
    }

    function activate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall() {
        // Will add something in the future.
    }
    
}

if( class_exists( 'Registrar' ) ) {
   $registrar = new Registrar();
}

// Plugin activation
register_activation_hook( __FILE__, array( $registrar, 'activate' ) );

// Plugin deactivation
register_deactivation_hook( __FILE__, array( $registrar, 'deactivate' ) );

// Uninstall Plugin
register_uninstall_hook( __FILE__, array( $registrar, 'uninstall' ) );
