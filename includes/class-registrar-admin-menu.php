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
        // Main menu
        add_menu_page(
            __( 'Registrar', 'registrar' ),
            __( 'Registrar', 'registrar' ),
            'manage_options',
            'registrar',
            array( $this, 'registrar_page' ),
            'dashicons-editor-table',
            5
        );

        // Sub-menu
        add_submenu_page(
            'registrar',
            __( 'Registrar Form', 'registrar-form' ),
            __( 'Registrar Form', 'registrar-form' ),
            'manage_options',
            'registrar-form',
            array( $this, 'registrar_form_template' ),
        );

    }

    // Main menu callback function
    function registrar_page() {
        if( class_exists( 'RegistrarUsers' ) ) {
            new RegistrarUsers();
        }
    }

    // Sub-menu callback function
    function registrar_form_template() {
        if( class_exists( 'RegistrarFormTemplate' ) ) {
            new RegistrarFormTemplate();
        }
    }
    
 }
