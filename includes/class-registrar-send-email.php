<?php
/**
 * Registrar send email class
 *
 * @package Registrar
 * @since 1.0.0
 */

class RegistrarSendEmail {

	// Methods
	function __construct( $mail_to ) {

		$subject   = 'Registration Successful';
		$body      = 'Your account ' . $mail_to . ' has been registered successfully. Thank you!';
		$headers[] = 'From: My Name <samarajyastha@gmail.com>' . "\r\n";
		$headers[] = '';
		wp_mail( $mail_to, $subject, $body, $headers );

	}

}
