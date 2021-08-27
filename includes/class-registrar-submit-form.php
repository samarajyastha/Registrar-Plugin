<?php
/**
 * Registrar Submit Form Class
 * 
 * @package Registrar
 * @since 1.0.0
 */

 class RegistrarSubmitForm {

    // Methods
    function __construct( $first_name, $last_name, $email, $password, $review ) {

        // Verify nonce
        if ( ! isset( $_POST['registrar_nonce'] ) || ! wp_verify_nonce( $_POST['registrar_nonce'], 'registrar_nonce_action' ) ) {
            return;
        }
       
        $userdata = array (
            'user_login'    =>  $email,  
            'first_name'    =>  $first_name,
            'last_name'     =>  $last_name,
            'user_email'    =>  $email,
            'user_pass'     =>  $password,
            'description'   =>  $review,
        );

        add_action( 'user_register', 'add_rating', 10, 1 );

        function add_rating($user_id ){
            // Adding rating as a custom user meta
           add_user_meta( $user_id, 'rating', $_POST['rating'], false );
        }
        
        wp_insert_user( $userdata );
        
    }
    
 }
