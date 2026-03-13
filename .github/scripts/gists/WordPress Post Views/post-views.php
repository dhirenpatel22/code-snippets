<?php
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
 if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

// Function to change order of Post
function wpdocs_five_posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set('meta_key', 'post_views_count');
		$query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'wpdocs_five_posts_on_homepage' );


/**
 *  Use below code in single.php to count post views.
 */
setPostViews(get_the_ID());


/**
 *  Use below code to display post views
 */
echo getPostViews(get_the_ID());