<?php
//Hide categories from WordPress category widget
function exclude_widget_categories($args){
    $exclude = "1,4,8,57,80";
    $args["exclude"] = $exclude;
    return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");
?>