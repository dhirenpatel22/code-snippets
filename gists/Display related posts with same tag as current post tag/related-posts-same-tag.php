<?php
// Get tags of current post
$tag_objs = wp_get_post_tags($post->ID);
$tags = array();
foreach ($tag_objs as $tag_obj) {
    $tags[] = $tag_obj->term_id;
}

// Get Posts
$myposts = get_posts(array(
    'numberposts' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'field'    => 'term_id',
            'terms'    => $tags,
        ),
     ),
    'post_status'=>'publish',
));?>