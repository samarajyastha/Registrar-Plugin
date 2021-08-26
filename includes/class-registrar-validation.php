<?php 
/**
 * Registrar Validation Class
 * 
 * @package Registrar
 * @since 1.0.0
 */


 class RegistrarValidation {

    public $is_error = false;

    // Methods
    function __construct( $fname='', $lname='', $email='', $password='' ) {  
        
        // Check if required fields are empty.
        if( empty( $fname ) || empty( $lname ) || empty( $email )  || empty( $password ) ) {
            add_filter( 'registrar_errors', function() {
                return 'Required form field is missing.';
            } );
            $this->is_error = true;
        }

        // Check if email already exists.
        if ( email_exists( $email ) ) {
            add_filter( 'registrar_errors', function() {
                return 'Email already exists.';
            } );
            $this->is_error = true;
        }

        // Check if email is valid.
        if ( ! is_email( $email ) ) {
            add_filter( 'registrar_errors', function() {
                return 'Invalid email address.';
            } );
            $this->is_error = true;
        }

        // Check if password length is not less than 6 characters.
        if ( 6 > strlen( $password ) ) {
            add_filter( 'registrar_errors', function() {
                return 'Password length must be more than 6 characters.';
            } );
            $this->is_error = true;
        }

    }
    
 }


