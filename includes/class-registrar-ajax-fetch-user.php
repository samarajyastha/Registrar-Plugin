<?php
/**
 * Ajax Fetch User class
 *
 * @package registrar
 * @since 1.0.0
 */

class AjaxFetchUser {
	function __construct() {
		// Invoke load_users() when load_more_users get fired.
		add_action( 'wp_ajax_nopriv_load_more_users', array( $this, 'load_users' ) );
		add_action( 'wp_ajax_load_more_users', array( $this, 'load_users' ) );
	}

	function load_users() {

		$sort     = isset( $_POST['sort'] ) ? $_POST['sort'] : 'display_name';
		$meta_key = isset( $_POST['meta_key'] ) ? $_POST['meta_key'] : '';
		$paged    = $_POST['page'];

		$query = new WP_User_Query(
			array(
				'meta_key' => $meta_key,
				'orderby'  => $sort,
				'order'    => 'ASC',
				'paged'    => $paged,
				'number'   => 3,
			)
		);

		// Get all users value.
		$users = $query->get_results();

		if ( $users ) :

			foreach ( $users as $user ) {
				?>
				<div class="col-md-4 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">

							<h3 class="card-title"><?php echo $user->display_name; ?></h3>
							<a href="mailto:<?php echo $user->user_email; ?>">
								<h6 class="card-subtitle mb-2"><?php echo $user->user_email; ?></h6>
							</a>
							<p class="card-text"><?php echo get_user_meta( $user->ID, 'description' )[0] ? get_user_meta( $user->ID, 'description' )[0] : 'No reviews.'; ?></p>

							<div class="reviews">
								<?php
								// Users rating
								$rating = get_user_meta( $user->ID, 'rating' );
								if ( ! empty( $rating ) ) {
									while ( $rating[0] > 0 ) {
										echo ' <i class="dashicons dashicons-star-filled"></i> ';
										$rating[0]--;
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		else :
			echo '<h4 class="text-center mt-5">No more users.</h4>';
			echo '<script>$(".load-btn").addClass("d-none");</script>';
		endif;
		die();
	}
}

new AjaxFetchUser();
