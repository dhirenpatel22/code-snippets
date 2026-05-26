<?php
/**
 * Shortcode to display Yoast estimated reading time
 * Usage: [yoast_reading_time]
 */
function yoast_reading_time_shortcode() {
    // Check if the Yoast function exists to prevent fatal errors
    if ( function_exists( 'YoastSEO' ) ) {
        $reading_time = YoastSEO()->meta->for_current_page()->estimated_reading_time_minutes;
        
        if ( $reading_time ) {
            return '<span class="yoast-reading-time">' . $reading_time . ' min read</span>';
        }
    }
    return '';
}
add_shortcode( 'yoast_reading_time', 'yoast_reading_time_shortcode' );
