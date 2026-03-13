function filter_attributes_dropdown_pages_args($dropdown_args) {
    $dropdown_args['post_status'] = array('publish','draft', 'private');
    return $dropdown_args;
}

add_filter('page_attributes_dropdown_pages_args', __NAMESPACE__ . '\\filter_attributes_dropdown_pages_args', 100, 1);
add_filter( 'quick_edit_dropdown_pages_args', __NAMESPACE__ . '\\filter_attributes_dropdown_pages_args', 100, 1);