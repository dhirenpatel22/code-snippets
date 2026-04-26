<?php

// Disable automatic redirect for posts
add_filter('Yoast\WP\SEO\post_redirect_slug_change', '__return_true' );

// Disable automatic redirect for taxonomies
add_filter('Yoast\WP\SEO\term_redirect_slug_change', '__return_true' );

// Disable automatic redirect notifications for Posts or Pages moved to Trash or changed url
add_filter('Yoast\WP\SEO\enable_notification_post_trash', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_post_slug_change', '__return_false' );

// Disable automatic redirect notifications for Taxonomies moved to Trash or changed url
add_filter('Yoast\WP\SEO\enable_notification_term_delete', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_term_slug_change', '__return_false' );

// Disable automatic redirect notifications for Users moved to Trash or changed url
add_filter('Yoast\WP\SEO\enable_notification_user_delete', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_user_slug_change', '__return_false' );

// Disable automatic redirect notifications for Comments moved to Trash or changed url
add_filter('Yoast\WP\SEO\enable_notification_comment_delete', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_comment_edit', '__return_false' );
