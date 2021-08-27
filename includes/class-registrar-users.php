<?php
/**
 * Registrar Users Class
 * 
 * @package Registrar
 * @since 1.0.0
 */

 class RegistrarUsers {

    // Methods
    function __construct() {
      $users = get_users();
      foreach($users as $user) {
         // print_r($user);
      }
       $this->users_template();
    }

    function users_template() {
       $users = get_users();
       ?>
       <div class="registrar-container">
         <div class="row">
            <?php foreach( $users as $user ) { ?>
               <div class="col-md-4 col-sm-6 col-12">
                  <div class="card">
                     <div class="card-body">
                        <h3 class="card-title"><?php echo $user->display_name; ?></h3>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $user->user_email; ?></h6>
                        <p class="card-text"><?php echo get_user_meta( $user->ID, 'description' )[0] ? get_user_meta( $user->ID, 'description' )[0] : "No reviews."; ?></p>
                        <div class="reviews">
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
      </div>
      <?php
    }

 }
