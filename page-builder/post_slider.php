<?php

/**
 * Page builder template : Post Slider
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.3
 */

/**
 * Data Sample
    $data_render = array(
        'advanced_query'            => 1,
        'post_type'                 => 'post',
        'taxonomy'                  => array(
            'category'  => array( 103, 115, 206 )                       // Taxonomy and array terms id
        ),
        'display_child_taxonomy'    => 1,                               // Boolean 1 or 0
        'order_by'                  => 'modified',
        'order'                     => 'DESC',                          // ASC or DESC
        'display_date'              => 1,                               // Boolean 1 or 0
        'custom_date_format'        => 'l, F j, Y',                     // If empty, inherit to default
    );
 */

$post_slider = apply_filters( 'tpb_generated_form_post_slider', $data_render );

$args = array( 'ignore_sticky_posts' => true );

/* Post Type */
$args['post_type']  = sanitize_text_field( $post_slider['post_type'] );

/* Taxonomy */
if ( $post_slider['advanced_query'] ) {
    if ( ! empty( $post_slider['taxonomy'] ) && (array) $post_slider['taxonomy'] == $post_slider['taxonomy'] ) {
        foreach ($post_slider['taxonomy'] as $tax => $t) {
            if ( ! empty( $t ) && (array) $t == $t ) {

                $args['tax_query'][] = array(
                    'taxonomy'          => $tax,
                    'field'             => 'term_id',
                    'terms'             => array_map( 'absint', $t ),
                    'include_children'  => ( isset( $post_list['display_child_taxonomy'] ) ) ? $post_list['display_child_taxonomy'] : 1
                );

            }
        }
    }
}

// Template style
$template_style = '';
$post_number = ( ! empty( $post_slider['post_number'] ) ) ? sanitize_text_field( $post_slider['post_number'] ) : '3';
$post_autoslide = $post_slider['auto_slide'];

if ($post_autoslide =="yes") {
    wp_enqueue_script( 'autoslidejs', THEME_URI_ASSETS . '/js/autoslide.js', array( 'jquery' ), null, true );
 
} else{
    wp_enqueue_script( 'autoslidenojs', THEME_URI_ASSETS . '/js/autoslide_no.js', array( 'jquery' ), null, true );
}



/* Post Number, Orderby, Order */
$args['posts_per_page'] = $post_number;
$args['order_by']       = ( ! empty( $post_slider['order_by'] ) ) ? sanitize_text_field( $post_slider['order_by'] ) : 'post_date';
$args['order']          = ( ! empty( $post_slider['order'] ) ) ? sanitize_text_field( $post_slider['order'] ) : 'DESC';

/* Get data */
$args = apply_filters( 'tpb_generated_args_post_slider', $args );
$post_slider_data = new WP_Query( $args );

/* Container setup */
$data_responsive = ( isset( $data_column['config']['responsive'] ) ) ? $data_column['config']['responsive'] : false;
$setup  = array(
    'container_class'   => 'post post-thumb-list ' . $template_style,
    'template_slug'     => 'parts/content',
    'template_name'     => 'featured',
);
$setup   = apply_filters( 'tpb_generated_setup_post_slider', $setup );

// post_list_slider_1 : 'Slider Biru Solid'
// post_list_slider_3 : 'Slider Biru Transparan'
// post_list_slider_4 : 'Slider Kuning Solid'
// post_list_slider_2 : 'Slider Kuning Transparan'
// post_list_slider_5 : 'Slider Tanpa Teks'
switch ($post_slider['template_style']) {
    case 'post_list_slider_1':
        $post_slider_class = "brand-primary";
        break;
    case 'post_list_slider_2':
        $post_slider_class = "brand-yellow content-overlay";
        break;
    case 'post_list_slider_3':
        $post_slider_class = "brand-primary content-overlay";
        break;
    case 'post_list_slider_4':
        $post_slider_class = "brand-yellow";
        break;
    case 'post_list_slider_5':
        $post_slider_class = "image-only content-overlay";
        break;
    default:
        $post_slider_class = "";
        break;
}

if (!function_exists('tpb_manual_excerpt')) {
    function tpb_manual_excerpt($content, $limit = 30) {
        $excerpt = wp_trim_words(strip_tags($content), $limit, ' ...');
        return $excerpt;
    }
}

?>
  
<?php
if ( $post_slider_data->have_posts() ) :
?> 
<div class="row">
    <div class="post-slider <?php echo $post_slider_class; ?>">
<?php
    while ( $post_slider_data->have_posts() ) : $post_slider_data->the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( $setup['container_class'] ); ?>>
            <?php if ($post_slider['template_style'] == 'post_list_slider_1' || $post_slider['template_style'] == 'post_list_slider_4') : ?>

                <div class="row">
                    <div class="post-img col-lg-6 col-md-6">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail( get_the_ID() ) ) the_post_thumbnail( 'ugm-archive-thumbnail-large', array( 'class' => 'img-responsive' ) ); ?>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="post-content">
                            <div class="post-title">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="entry-content">
                                <?php echo tpb_manual_excerpt(get_the_content()); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-more"><?php echo is_english() ? 'Read More' : 'Baca Selengkapnya' ?></a>
                        </div>
                    </div>
                </div>

            <?php elseif ($post_slider['template_style'] == 'post_list_slider_2' || $post_slider['template_style'] == 'post_list_slider_3') : ?>

                <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content">
                    <div class="post-title">
                        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="entry-content">
                        <?php echo tpb_manual_excerpt(get_the_content()); ?>
                    </div>
                    <a href="<?php the_permalink() ?>" class="btn btn-more"><?php echo is_english() ? 'Read More' : 'Baca Selengkapnya' ?></a>
                </div>

            <?php else: ?>

                <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'ugm-post-slider-wide', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                <?php endif; ?>

            <?php endif; ?>
        </article>

    <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>