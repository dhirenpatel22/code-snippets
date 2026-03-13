<?php

/**
 * Redirect user to different page based on userrole after password reset from backend screen
 * @param $user
 */
function custom_redirect_retail_page_based_on_role($user) {
    $user_roles = (array) $user->roles;
    if ( in_array('userrole1', $user_roles) ) {
        wp_redirect( 'Custom Page Link' );
    } elseif (in_array('userrole2', $user_roles) ) {
        wp_redirect( 'Custom Page Link' );
    } else{
        wp_redirect( home_url() );
    }
}
add_action('after_password_reset', 'custom_redirect_retail_page_based_on_role', 10, 1 );

??>