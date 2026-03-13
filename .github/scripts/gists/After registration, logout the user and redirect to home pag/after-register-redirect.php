function custom_registration_redirect() {
    wp_logout();
    return home_url('/');
}
add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);