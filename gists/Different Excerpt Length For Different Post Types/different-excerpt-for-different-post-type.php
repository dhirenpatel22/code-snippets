<?php /**
 * Different Excerpt Length For Different Post Types
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/excerpt-length-d…erent-post-types/
 */ 
 
function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
        return 32;
    else if ($post->post_type == 'products')
        return 65;
    else if ($post->post_type == 'testimonial')
        return 75;
    else
        return 80;
}
add_filter('excerpt_length', 'custom_excerpt_length');