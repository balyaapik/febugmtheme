<?php

/**
 * Page builder template : Image Button
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
    $data_render = array(
        'title'         => '<h2>Girls Collections Set Watches and Shoes</h2>', // html
        'subtitle'      => '<h3>Girl Collection Summer</h3>', // html
        'image_id'      => 1723,
        'image_url'     => 'http://127.0.0.1/dev-mino/wp-content/uploads/2016/06/pexels-photo.jpg',
        'image_size'    => 'large', // thumbnail, medium, etc
        'button_text'   => 'Buy The Book Now',
        'button_link'   => 'http://tonjoo.com/how-to-cook',
        'align'         => 'left', // left, center, right
        'width'         => '1400px', // auto or number with px
        'height'        => '300px', // auto or number with px
        'link'          => 'http://tonjoostudio.com',
    );
 */

/* Set column width */
$width_class = '';
if ( ! empty( $data_column['width'] ) ) {
    $width_class = 'tpb-col-' . $data_column['width'];
}

$image = apply_filters( 'tpb_generated_form_image_button', $data_render );

/* Get data image */
$image_size = ( ! empty( $image['image_size'] ) ) ? sanitize_text_field( $image['image_size'] ) : 'thumbnail';
$image_url  = ( ! empty( $image['image_url'] ) ) ? $image['image_url'] : false;

$image_src = false;
if ( (int) $image['image_id'] == $image['image_id'] ) {
    $image_src  = wp_get_attachment_image_src ( $image['image_id'], $image_size );
}

/* Check image src */
$image_height = 'auto'; $image_width = '100%';
if ( (array) $image_src == $image_src ) {
    $image_url      = ! empty( $image_src[0] ) ? $image_src[0] : $image_url;
    $image_width    = ! empty( $image['width'] ) ? $image['width'] : $image_src[1];
    $image_height   = ! empty( $image['height'] ) ? $image['height'] : $image_src[2];
}

/* Set image and container align */
$style_content = $style_container = '';
$style_content = $style_container = '';
if ( ! empty( $image['align'] ) ) {
    $style_content  = 'style="text-align: ' . esc_attr( $image['align'] ) . ';"';
}

// Template styles
if ( ! empty( $image['template_style'] ) ) {
    if ( $image['template_style'] == 'image_button_full' ) {
        $image_width = '100%';
    } elseif ( $image['template_style'] == 'image_button_height_mobile' ) {
        $width_class .= ' image-same-height'; 
    }
}

$style_container    = 'style="width: ' . esc_attr( $image_width ) . ';height: auto;max-width: 100%;"';

/* Set image link */
$image_link = '';
if ( ! empty( $image['link'] ) ) {
    $image_link = 'href="' . esc_url( $image['link'] ) . '"';
}

?>

<div class="tpb-content-image <?php echo $width_class; ?>">
    <div class="tpb-container-image" <?php echo $style_container; ?>>
        <div class="tpb-image-btn-holder" <?php echo $style_content; ?>>

            <?php if ( ! empty( $image['title'] ) ) : ?>
            <a <?php echo $image_link; ?>>
                <div class="tpb-image-btn-title" <?php echo $style_content; ?>>
                    <?php echo $image['title']; ?>
                </div>
            </a>
            <?php endif; ?>

            <?php if ( ! empty( $image['subtitle'] ) ) : ?>
            <a <?php echo $image_link; ?>>
                <div class="tpb-image-btn-subtitle" <?php echo $style_content; ?>>
                    <div class="tpb-image-btn-subtitle-content">
                        <?php echo $image['subtitle']; ?>
                    </div>
                </div>
            </a>
            <?php endif; ?>

            <?php if ( ! empty( $image['button_text'] ) && ! empty( $image['button_link'] ) ) : ?>
                <a href="<?php echo esc_url( $image['button_link'] ); ?>" class="btn btn-empty btn-light">
                    <?php echo esc_attr( $image['button_text'] ); ?>
                </a>
            <?php endif; ?>

        </div>

        <a <?php echo $image_link; ?>>
            <img src="<?php echo esc_url( $image_url ); ?>" width="<?php echo esc_attr( $image_width ); ?>" style="height:<?php echo esc_attr( $image_height ); ?>;"/>
        </a>

    </div>
</div>