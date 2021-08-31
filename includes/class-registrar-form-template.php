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

        // Invoke form_template()
        $this->form_template();      

    }

    function form_template() {
  
        if ( ! empty( $_POST ) ) {
            // Instantiating RegistrarValidation Class
            $registrarValidation = new RegistrarValidation( $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['rating'], $_POST['review'] );
           
            // Check if error exists
            if( ! $registrarValidation->is_error ){

                // Sanitize fields before saving
                $first_name =   sanitize_text_field( $_POST['fname'] );
                $last_name  =   sanitize_text_field( $_POST['lname'] );
                $email      =   sanitize_email( $_POST['email'] );
                $password   =   esc_attr( $_POST['password'] );
                $review     =   esc_textarea( $_POST['review'] );  

                // Invoke Registrar Submit form class
                new RegistrarSubmitForm( $first_name, $last_name, $email, $password, $review );
            }

        }
        ?>

        <div class="registrar-container">
            <form class="row g-3 registrar-form <?php if( !is_page() && !is_archive() ) echo 'w-50'; ?>" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <h2>Registrar Form</h2>
        <?php
            // Create nonce
            wp_nonce_field( 'registrar_nonce_action', 'registrar_nonce' );
            
            echo '
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
                    <textarea class="form-control" id="review" rows="3" name="review" >'. ( isset( $_POST['review']) ? $_POST['review'] : null ) .'</textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            ';
            if ( is_page() || is_archive() ){
                echo '<p>If you are already registered, Please '.'<a href="?">Login</a><p>';
            }
            ?>
            
            </form>
        </div>
        <?php
    }
    
 }
