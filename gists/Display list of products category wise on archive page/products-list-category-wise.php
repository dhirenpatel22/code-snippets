<?php
/**
 * Show products sorted by category
 */

$taxonomy       = 'product_cat';
$orderby        = 'menu_order';
$order          = 'ASC';
$show_count     = 1; // 1 for yes, 0 for no
$pad_counts     = 0; // 1 for yes, 0 for no
$hierarchical   = 1; // 1 for yes, 0 for no
$title          = '';
$empty          = 1; // 1 for hide, 0 for show

$args = array(
    'taxonomy'      => $taxonomy,
    'orderby'       => $orderby,
    'order'         => $order,
    'show_count'    => $show_count,
    'pad_counts'    => $pad_counts,
    'hierarchical'  => $hierarchical,
    'title_li'      => $title,
    'hide_empty'    => $empty,
);

$all_categories = get_categories( $args );

foreach ($all_categories as $cat) :

    $term_link = get_term_link( $cat );

    if( $cat->category_parent == 0 ) :

        $category_id    = $cat->term_id;
        $thumbnail_id   = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image          = wp_get_attachment_url( $thumbnail_id );

        echo '<div id="' . $cat->slug . '" class="category ' . $cat->slug . '"><h2 class="category-title"><a href="'. esc_url( $term_link ) .'">'.$cat->name.'</a></h2>';

        $args_for_product = array('type'=> 'product',
            'post_status'   => 'publish',
            'tax_query' => array(array('taxonomy' =>$taxonomy,'field' => 'slug','terms' =>$cat->slug)),
            'orderby'       => $orderby,
            'order'         => $order,
        );
            $loop = new WP_Query( $args_for_product );

            while ( $loop->have_posts() ) : $loop->the_post();

                global $product;

                wc_get_template_part( 'content', 'product' );

            endwhile; // end of the loop. ?>

            </div><!-- end .category -->

            <?php

            wp_reset_query();

        endif;

    endforeach;

    wp_reset_query();

    ?>