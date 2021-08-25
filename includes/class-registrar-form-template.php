<?php
/**
 * Registrar form template
 * 
 * @package Registrar
 * @since 1.0.0
 */

 class RegistrarFormTemplate {

    // Methods
    function __construct() {
        // Load CSS
        wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__). '../assets/css/bootstrap.min.css', [], 1.0);
        wp_enqueue_style('style', plugin_dir_url(__FILE__). '../assets/css/style.css', [], 1.0);
    
        // Invoke form_template()
        $this->form_template();
    }

    function form_template() {
        ?>
            <div class="registrar-container">
                <form class="row g-3 registrar-form">
                    <h2>Registrar Form</h2>

                    <div class="col-12">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname">
                    </div>

                    <div class="col-12">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="col-12">
                        <label for="password"  class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="col-12">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="range" class="form-range" min="0" max="5" step="1" id="rating" name="rating">
                    </div>

                    <div class="col-12">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" rows="3" name="review"></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        <?php
    }

 }

 if( class_exists( 'RegistrarFormTemplate' ) ) {
     $registrarFormTemplate = new RegistrarFormTemplate();
 }
 