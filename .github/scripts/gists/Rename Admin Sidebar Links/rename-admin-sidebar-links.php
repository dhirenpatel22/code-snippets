<?php
/**
 * Rename Admin Sidebar Links
 **/
add_action( 'admin_menu', 'rename_admin_sidebar_links', 999 );
function rename_admin_sidebar_links() {
    global $menu, $submenu;

    // Rename top-level items
    // $menu[5][0] = 'Articles';    // Rename "Posts" → "Articles"
    // $menu[20][0] = 'Files';      // Rename "Pages" → "Files"

    // Better approach using array search
    foreach ( $menu as $key => $item ) {
        if ( $item[2] === 'edit.php' ) {
            $menu[$key][0] = 'Articles'; // Rename Posts
        }
        if ( $item[2] === 'edit.php?post_type=page' ) {
            $menu[$key][0] = 'Web Pages'; // Rename Pages
        }
    }

    // Rename submenu items
    if ( isset( $submenu['options-general.php'] ) ) {
        foreach ( $submenu['options-general.php'] as $key => $item ) {
            if ( $item[2] === 'options-general.php' ) {
                $submenu['options-general.php'][$key][0] = 'General Config';
            }
        }
    }
}
?>