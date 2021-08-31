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

        add_action( 'user_register', array( $this, 'add_rating' ), 10, 1 );
        
        wp_insert_user( $userdata ) or die();

        $this->user_registered_modal();

        // Send Email to registered user
        new RegistrarSendEmail( $email );
    }

    // Adding rating as a custom user meta
    function add_rating( $user_id ) {
       add_user_meta( $user_id, 'rating', $_POST['rating'], false );
    }

    // Show pop up modal if user register is successful
    function user_registered_modal() {
    ?>
        <div class="registrar-container">
            <div class="alert alert-success alert-dismissible w-50" role="alert" id="liveAlert">
                <strong>User Registration Successful!</strong>
                <button type="button" id="alert-close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <script>
            var liveAlert = document.getElementById("liveAlert");
            var alertClose = document.getElementById("alert-close");

            // Close alert box
            alertClose.addEventListener("click", function () {
                liveAlert.remove();
            });

            // Close alert box after 5 seconds
            setTimeout(() => {
                liveAlert.remove();
            }, 5000);

        </script>
    <?php
    }
    
 }
