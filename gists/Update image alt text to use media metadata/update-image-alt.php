<?php

if ( $image_id ) {
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
    
    $icon_html = wp_get_attachment_image(
        $image_id,
        $atts['size'],
        false,
        array(
            'class'   => 'product-cat-icon',
            'loading' => 'lazy',
            'alt'     => esc_attr( $image_alt ?: $primary_term->name ),
        )
    );
}
?>