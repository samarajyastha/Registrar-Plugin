<?php 
/**
 * Registrar Validation Class
 * 
 * @package Registrar
 * @since 1.0.0
 */


 class RegistrarValidation {

    public $reg_errors;

    // // Methods
    function __construct( $fname='', $lname='', $email='', $password='' ) {  
        
        // Check if required fields are empty.
        if( empty( $fname ) || empty( $lname ) || empty( $email )  || empty( $password ) ) {
            add_filter( 'registrar_errors', function(){
                return 'Required form field is missing.';
            } );
        }

        // Check if email already exists.
    //     if ( email_exists( $email ) ) {
    //         $this->reg_errors->add( 'username_exists', 'Sorry, that email already exists!' );
    //     }

    //     // Check if email is valid.
    //     if ( ! is_email( $email ) ) {
    //         $this->reg_errors->add( 'email_invalid', 'Invalid email address.' );
    //     }

    //     // Check if password length is not less than 6 characters.
    //     if ( 6 > strlen( $password ) ) {
    //         $this->reg_errors->add( 'password_length', 'Password length must be greater than 6.' );
    //     }

    //     $this->show_errors();

    // }

    // // Show errors if exists.
    // function show_errors() {
    //     if ( is_wp_error($this->reg_errors) ) {
    //         foreach ( $this->reg_errors->get_error_message() as $error ) {
    //             echo '
    //                 <div>
    //                     <strong>ERROR</strong>
    //                     '.$error.'<br>
    //                 </div>
    //             ';
    //         }
    //     }
    }

 }


