<?php
/**
 * Registrar form template
 * 
 * @package Registrar
 * @since 1.0.0
 */

 include_once 'class-registrar-validation.php';

 class RegistrarFormTemplate {

    // Methods
    function __construct() {

        // Load CSS
        wp_enqueue_style( 'bootstrap', plugin_dir_url(__FILE__). '../assets/css/bootstrap.min.css', [], 1.0 );
        wp_enqueue_style( 'style', plugin_dir_url(__FILE__). '../assets/css/style.css', [], 1.0 );
    
        // Invoke form_template()
        $this->form_template();

        // Submit Form Data to User table.
        if ( ! empty( $_POST ) ) {
            $this->submit_form_data();
        }
    }

    function form_template() {

        echo '
            <div class="registrar-container">
                <form class="row g-3 registrar-form" action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                    <h2>Registrar Form</h2>

                    <div class="col-12">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>

                    <div class="col-12">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-12">
                        <label for="password"  class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="col-12">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="range" class="form-range" min="0" max="5" step="1" id="rating" name="rating" value="0">
                        <div class="rating-value">
                            <span>0</span>
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" rows="3" name="review" value=""></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        ';

    }

    function submit_form_data() {
        $userdata = array (
            'user_login'    =>  $_POST['email'],
            'first_name'    =>  $_POST['fname'],
            'last_name'     =>  $_POST['lname'],
            'user_email'    =>  $_POST['email'],
            'user_pass'     =>  $_POST['password'],
            'rating'      =>  $_POST['rating'],
            'description'   =>  $_POST['review'],
        );
        print_r($userdata);
        wp_insert_user( $userdata );
    }

 }

 if( class_exists( 'RegistrarFormTemplate' ) ) {
     $registrarFormTemplate = new RegistrarFormTemplate();
 }
