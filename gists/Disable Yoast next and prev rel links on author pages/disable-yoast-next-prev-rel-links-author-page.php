<?php
/**
 * Disable Yoast next and prev rel links on author pages.
 */

function curotec_disable_yoast_next_rel_link_on_author_pages($link) {
    if (is_author()) {
        return '';
    }
    return $link;
}
add_filter('wpseo_next_rel_link', 'curotec_disable_yoast_next_rel_link_on_author_pages');

function curotec_disable_yoast_prev_rel_link_on_author_pages($link) {
    if (is_author()) {
        return '';
    }
    return $link;
}
add_filter('wpseo_prev_rel_link', 'curotec_disable_yoast_prev_rel_link_on_author_pages');
