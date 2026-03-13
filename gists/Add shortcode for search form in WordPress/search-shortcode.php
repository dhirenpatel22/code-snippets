<?php
/*
 * Add a shortcode for search form in WordPress
 * @url 
 */
 
function search_form_shortcode( ) {
    get_search_form( );
}
add_shortcode('search_form', 'search_form_shortcode');