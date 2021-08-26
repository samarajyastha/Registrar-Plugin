<?php
/**
 * Registrar Submit Form Class
 * 
 * @package Registrar
 * @since 1.0.0
 */

 class RegistrarSubmitForm {

    // Methods
    function __construct() {
        $userdata = array (
            'user_login'    =>  $_POST['email'],
            'first_name'    =>  $_POST['fname'],
            'last_name'     =>  $_POST['lname'],
            'user_email'    =>  $_POST['email'],
            'user_pass'     =>  $_POST['password'],
            'description'   =>  $_POST['review'],
        );

        add_action( 'user_register', 'add_rating', 10, 1 );

        function add_rating($user_id ){
            // Adding rating as a custom user meta
           add_user_meta( $user_id, 'rating', $_POST['rating'], false );
        }
        
        wp_insert_user( $userdata );
        
    }
 }