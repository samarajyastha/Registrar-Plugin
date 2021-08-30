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
      $this->users_template();
   }

   // Show all users in a card.
   function users_template() {
   ?>
      <div class="registrar-container">
         <div class="row">
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="sort-button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sort By
               </button>
               <ul class="dropdown-menu" aria-labelledby="sort-button">
                  <li><a class="dropdown-item" href="?sort=ID">ID</a></li>
                  <li><a class="dropdown-item" href="?sort=display_name">Name</a></li>
                  <li><a class="dropdown-item" href="?sort=meta_value&meta_key=rating">Rating</a></li>
               </ul>
            </div>
            <?php $this->users_grid(); ?>
         </div>
      </div>
      <?php
   }

   // Single user card with name, email, reviews and rating.
   function users_grid() {

      $sort = isset($_GET['sort'])?$_GET['sort']:'display_name';

      $args = array (
         'meta_key'  => 'rating',
         'orderby'   => $sort,
         'order'     => 'ASC',
      );
      
      // Get all users from wp_users() table.
      $userList = new WP_User_Query( $args );
      $users = $userList->get_results();

      foreach ($users as $user) {
      ?>

         <div class="col-md-4 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">

                  <h3 class="card-title"><?php echo $user->display_name; ?></h3>
                  <a href="mailto:<?php echo $user->user_email; ?>">
                     <h6 class="card-subtitle mb-2"><?php echo $user->user_email; ?></h6>
                  </a>
                  <p class="card-text"><?php echo get_user_meta($user->ID, 'description')[0] ? get_user_meta($user->ID, 'description')[0] : "No reviews."; ?></p>

                  <div class="reviews">
                     <?php
                     // Users rating
                     $rating = get_user_meta($user->ID, 'rating');
                     if (!empty($rating)) {
                        while ($rating[0] > 0) {
                           echo ' <i class="dashicons dashicons-star-filled"></i> ';
                           $rating[0]--;
                        }
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      <?php }
   }
}
