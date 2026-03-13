<?php
    $parentid = get_queried_object_id();
    $args = array(
        'parent' => $parentid
    );
    $categories = get_terms(
        'product_cat', $args
    );
    if ( $categories ) :
        foreach ( $categories as $category ) :
            echo esc_html($category->name);
            $products = new WP_Query( array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $category->slug,
                    ),
                ) 
            ) );
            if ( $products->have_posts() ) :
            ?>
                <ul>
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                        <li><?php the_title(); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php
                wp_reset_postdata();
            endif;
        endforeach;
    endif;
?>