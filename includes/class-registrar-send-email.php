<?php
/**
 * Registrar send email class
 * 
 * @package Registrar
 * @since 1.0.0
 */

 class RegistrarSendEmail {

    // Methods 
    function __construct() {

        add_action( 'plugins_loaded', 'renderHTML' );
       
        function renderHTML() {

            $to = 'xtremepapersnepal@gmail.com';
            $subject = 'The subject';
            $body = 'The email body content';
            $headers[] = 'From: My Name <samarajyastha@gmail.com>' . "\r\n";
            $headers[]='';
            $mailsent = wp_mail( $to, $subject, $body, $headers );

            if( $mailsent ) {
                echo $to;
            } else {
                echo 'error';
            }
           
        }
    
    }
 }