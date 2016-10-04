<?php 
/**
 * Template Name: Custom Login Page Template
 *
 * Login Page Template.
 *
 * @author Shantanu Vishwanadha
 * @since 1.0.0
 */

get_header(); ?>

	<!-- section -->
    <section class="sv_loginForm">
        <?php 
            global $user_login;

            // In case of a login error.
            if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
    	            <div class="sv_error">
    		            <p><?php _e( 'FAILED: Try again!', 'sv' ); ?></p>
    	            </div>
            <?php 
                endif;

            // If user is already logged in.
            if ( is_user_logged_in() ) : ?>

                <div class="sv_logout"> 
                    
                    <?php 
                        _e( 'Hello', 'sv' ); 
                        echo $user_login; 
                    ?>
                    
                    </br>
                    
                    <?php _e( 'You are already logged in.', 'sv' ); ?>

                </div>

                <a id="wp-submit" href="<?php echo wp_logout_url(); ?>" title="Logout">
                    <?php _e( 'Logout', 'sv' ); ?>
                </a>

            <?php 
                // If user is not logged in.
                else: 
                
                    // Login form arguments.
                    $args = array(
                        'echo'           => true,
                        'redirect'       => home_url( '/wp-admin/' ), 
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => true,
                        'value_username' => NULL,
                        'value_remember' => true
                    ); 
                    
                    // Calling the login form.
                    wp_login_form( $args );

                endif;
        ?> 

	</section>
	<!-- /section -->

<?php get_footer(); ?>