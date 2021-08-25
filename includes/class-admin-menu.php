<?php 
/**
 * Registrar admin menu
 * 
 * @package Registrar
 * @since 1.0.0
 * 
 */

 class RegistrarAdminMenu {

    // Methods
    /**
     * Create admin menu
     */
    function create_admin_menu() {
        add_menu_page(
            __( 'Registrar', 'registrar' ),
            __( 'Registrar', 'registrar' ),
            'manage_options',
            'registrar',
            array( $this, 'registrar_page' ),
            'dashicons-editor-table',
            5
        );
    }

    function registrar_page() {
       include_once ( __DIR__ ). '/class-registrar-form-template.php';
    }
 }

 if( class_exists( 'RegistrarAdminMenu' ) ) {
     $registrarAdminMenu = new RegistrarAdminMenu();
 }

 add_action( 'admin_menu', array( $registrarAdminMenu, 'create_admin_menu' ) );