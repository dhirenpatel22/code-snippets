<?php

// Step 1: Enable custom menu order
add_filter( 'custom_menu_order', '__return_true' );

// Step 2: Define your custom order
add_filter( 'menu_order', 'custom_admin_menu_order' );

function custom_admin_menu_order( $menu_order ) {
    return array(
        'index.php',                         // Dashboard (first)
        'edit.php?post_type=page',           // Pages
        'edit.php',                          // Posts
        'upload.php',                        // Media
        'edit-comments.php',                 // Comments
        'separator1',                        // -- Separator --
        'themes.php',                        // Appearance
        'plugins.php',                       // Plugins
        'users.php',                         // Users
        'options-general.php',               // Settings
        'tools.php',                         // Tools
        'separator-last',                    // -- Last Separator --
    );
}

?>