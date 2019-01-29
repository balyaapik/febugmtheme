<?php

/**
 * Page builder template : Product List
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.2
 */

/**
 * Data Sample
    $data_render = array(
        'title'                     => '<h2>How To Cook</h2>',          // HTML
        'subtitle'                  => 'Because everybody love to eat', // HTML
        'advanced_query'            => 0,
        'taxonomy'                  => array(
            'product_cat'  => array( 103, 115, 206 )                       // Taxonomy and array terms id
        ),
        'display_child_taxonomy'    => 1,                               // Boolean 1 or 0
        'post_number'               => 4,                              // 1 to 12
        'order_by'                  => 'modified',
        'order'                     => 'DESC',                          // ASC or DESC
        'layout'                    => '4-post-per-row',                // 4 to 1
    );
 */

$args = array();
$product_list = false;
$product_list_data = false;
$setup = false;
$product_list = apply_filters( 'tpb_generated_form_product_list', $data_render );
$additional_class = '';
$additional_inner_class = 'row';

/* Check Layout */
if ( ! empty( $product_list['layout'] ) && $product_list['layout'] == 'auto' ) {
    if ( $data_column['width'] <= 3 ) {
        $product_list['layout'] = '1-post-per-row';
    } elseif ( $data_column['width'] > 3 && $data_column['width'] < 6 ) {
        $product_list['layout'] = '2-post-per-row';
    } elseif ( $data_column['width'] == 6 ) {
        $additional_class       = 'tpb-all-mob';
        $product_list['layout'] = '3-post-per-row';
        $additional_inner_class = 'col-md-12 tpb-all-mob-container';
    } elseif ( $data_column['width'] > 6 && $data_column['width'] <= 9 ) {
        $product_list['layout'] = '3-post-per-row';
    } else {
        $product_list['layout'] = '4-post-per-row';
    }
} else if ( $product_list['layout'] == '3-post-per-row' || $product_list['layout'] == '4-post-per-row' ) {
    // Override width < 8 and post-row 3 atau 4
    if ( $data_column['width'] < 8 ) {
        $additional_class       = 'tpb-all-mob';
        $additional_inner_class = 'col-md-12 tpb-all-mob-container';
    }
}

/* Post Type */
$args['post_type']  = 'product';

/* Taxonomy */
if ( $product_list['advanced_query'] ) {
    if ( (array) $product_list['taxonomy'] == $product_list['taxonomy'] && ! empty( $product_list['taxonomy'] ) ) {
        if ( (array) $product_list['taxonomy']['product_cat'] == $product_list['taxonomy']['product_cat'] && ! empty( $product_list['taxonomy']['product_cat'] ) ) {

            $args['tax_query'][] = array(
                'taxonomy'          => 'product_cat',
                'field'             => 'term_id',
                'terms'             => array_map( 'absint', $product_list['taxonomy']['product_cat'] ),
                'include_children'  => ( isset( $product_list['display_child_taxonomy'] ) ) ? $product_list['display_child_taxonomy'] : 1
            );

        }
    }
}

/* Product Number, Orderby, Order */
$args['posts_per_page'] = ( ! empty( $product_list['post_number'] ) ) ? (int) $product_list['post_number'] : 3;
$args['order_by']       = ( ! empty( $product_list['order_by'] ) ) ? sanitize_text_field( $product_list['order_by'] ) : 'post_date';
$args['order']          = ( ! empty( $product_list['order'] ) ) ? sanitize_text_field( $product_list['order'] ) : 'DESC';

/* Get data */
$args = apply_filters( 'tpb_generated_args_product_list', $args );
$product_list_data = new WP_Query( $args );

/* Container setup */
$container_class = tpb_items_per_column_product( sanitize_text_field( $product_list['layout'] ) );
$setup  = array(
    'container_class'   => 'product-package-home ' . $container_class . ' nopad-onmob',
    'template_slug'     => 'content',
    'template_name'     => 'product_thumb',
);

if ( $product_list['layout'] == '1-post-per-row' ) {
    $setup['template_name']     = 'product_landscape';
    $setup['container_class']   .= ' tpb-landscape';
}


$setup   = apply_filters( 'tpb_generated_setup_product_list', $setup );

?>

<?php if ( ! empty( $product_list['title'] ) ) : ?>
<div class="col-md-12 tpb-header">
    <div class="row">
        <div class="tpb-title"><?php echo $product_list['title']; ?></div>
        <?php if ( ! empty( $product_list['subtitle'] ) ) : ?>
        <div class="tpb-subtitle"><?php echo $product_list['subtitle']; ?></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<div class="col-md-12 woocommerce <?php echo $additional_class; ?>">
    <div class="<?php echo $additional_inner_class; ?>">
        <?php if ( $product_list_data->have_posts() ) : ?>
            <?php while ( $product_list_data->have_posts() ) : $product_list_data->the_post(); ?>

            <div id="product-<?php the_ID(); ?>" <?php post_class( $setup['container_class'] ); ?>>
                <?php
                    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                        wc_get_template_part( $setup['template_slug'], $setup['template_name'] );
                    }
                ?>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>
