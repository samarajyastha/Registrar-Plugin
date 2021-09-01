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
        if( class_exists( 'RegistrarUsers' )  ) {
            if( is_user_logged_in() ) {
                new RegistrarUsers();
            } else {             
                if( isset( $_GET['register'] ) && $_GET['register'] == true ) {
                    $this->registrar_form_template();
                } else {
                    echo '
                        <div class="row">
                        <div class="col-6 card p-5">
                        <h6 class="my-3">You are not authorized to view this page. Please login to continue.</h6>
                    ';

                    wp_login_form( array(
                        'echo'           => true,
                        // Default 'redirect' value takes the user back to the request URI.
                        'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username or Email Address' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => true,
                        'value_username' => '',
                        // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
                        'value_remember' => false,
                    ) );

                    echo 'Or register to continue. <a href="?register=true">Register</a>';
                    
                    echo '
                        </div>
                    </div>
                    ';
                }
            }
        }
    }

    // Sub-menu callback function
    function registrar_form_template() {
        if( class_exists( 'RegistrarFormTemplate' ) ) {
            new RegistrarFormTemplate();
        }
    }
    
 }
?>
