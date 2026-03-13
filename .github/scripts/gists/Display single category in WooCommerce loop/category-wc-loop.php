<?php /**
 * Display single category in WooCommerce loop
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

// Remove 'woocommerce_template_loop_product_title' action for shop item title 
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

// Function to custom shop item title
function loop_title() { 
    global $post; ?>
    <div class="col-xl-3 col-md-3 col-sm-3">
        <h3><a href="<?php the_permalink(); ?>" class="feed-item-baslik"><?php the_title(); ?></a></h3>
        <?php 
        $terms = get_the_terms( $post->ID, 'product_cat' );
        if ( $terms && ! is_wp_error( $terms ) ) :
            if ( ! empty( $terms ) ) {
                echo $terms[0]->name;
            }?>
        <?php endif;?>
    </div>
<?php }
add_action('woocommerce_shop_loop_item_title', 'loop_title', 10); ?>