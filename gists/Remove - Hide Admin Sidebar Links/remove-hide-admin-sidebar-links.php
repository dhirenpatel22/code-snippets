<?php 
/**
 * Remove / Hide Admin Sidebar Links
 */

add_action( 'admin_menu', 'hide_admin_sidebar_links', 999 );
function hide_admin_sidebar_links() {
    // Hide top-level menu items
    remove_menu_page( 'index.php' );             // Dashboard
    remove_menu_page( 'edit.php' );              // Posts
    remove_menu_page( 'upload.php' );            // Media
    remove_menu_page( 'edit.php?post_type=page' ); // Pages
    remove_menu_page( 'edit-comments.php' );     // Comments
    remove_menu_page( 'themes.php' );            // Appearance
    remove_menu_page( 'plugins.php' );           // Plugins
    remove_menu_page( 'users.php' );             // Users
    remove_menu_page( 'tools.php' );             // Tools
    remove_menu_page( 'options-general.php' );   // Settings
    remove_menu_page( 'woocommerce' );           // WooCommerce (if installed)

    // Hide submenu items
    remove_submenu_page( 'themes.php', 'widgets.php' );       // Widgets
    remove_submenu_page( 'themes.php', 'nav-menus.php' );     // Menus
    remove_submenu_page( 'options-general.php', 'options-reading.php' ); // Reading Settings
}

/**
 * Hide only for non-admins
 */
add_action( 'admin_menu', 'hide_links_for_non_admins', 999 );
function hide_links_for_non_admins() {
    if ( ! current_user_can( 'manage_options' ) ) {
        remove_menu_page( 'plugins.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'options-general.php' );
    }
}

?>