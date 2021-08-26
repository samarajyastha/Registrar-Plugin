<?php
/**
 * Registrar form template
 * 
 * @package Registrar
 * @since 1.0.0
 */

 include_once 'class-registrar-validation.php';
 include_once 'class-registrar-submit-form.php';

 class RegistrarFormTemplate {

    // Methods
    function __construct() {

        // Load CSS
        wp_enqueue_style( 'bootstrap', plugin_dir_url(__FILE__). '../assets/css/bootstrap.min.css', [], 1.0 );
        wp_enqueue_style( 'style', plugin_dir_url(__FILE__). '../assets/css/style.css', [], 1.0 );
    
        // Invoke form_template()
        $this->form_template();       

    }

    function form_template() {
  
        if ( ! empty( $_POST ) ) {
            // Instantiating RegistrarValidation Class
            $registrarValidation = new RegistrarValidation( $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'] );
           
            // Check if error exists
            if(! $registrarValidation->is_error){
                new RegistrarSubmitForm();
            }
        }

        echo '
            <div class="registrar-container">
                <form class="row g-3 registrar-form" action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                    <h2>Registrar Form</h2>

                    <p class="text-danger">'.apply_filters( 'registrar_errors', false ).'</p>

                    <div class="col-12">
                        <label for="fname" class="form-label">First Name *</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="'. ( isset( $_POST['fname']) ? $_POST['fname'] : null ) .'" required>
                    </div>

                    <div class="col-12">
                        <label for="lname" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="'. ( isset( $_POST['lname']) ? $_POST['lname'] : null ) .'" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" value="'. ( isset( $_POST['email']) ? $_POST['email'] : null ) .'" required>
                    </div>

                    <div class="col-12">
                        <label for="password"  class="form-label">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="'. ( isset( $_POST['password']) ? $_POST['password'] : null ) .'" required>
                    </div>

                    <div class="col-12">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="range" class="form-range" min="0" max="5" step="1" id="rating" value="'. ( isset( $_POST['rating']) ? $_POST['rating'] : 0 ) .'" name="rating" >
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
                        <textarea class="form-control" id="review" rows="3" name="review" value="'. ( isset( $_POST['review']) ? $_POST['review'] : null ) .'"></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        ';

    }

 }

 if( class_exists( 'RegistrarFormTemplate' ) ) {
     $registrarFormTemplate = new RegistrarFormTemplate();
 }
