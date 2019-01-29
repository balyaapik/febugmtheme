<?php

/**
 * Page builder template : Icon
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.2
 */

/**
 * Data Sample
	$data_render = array(
		'title' => '<h2>How To Cook</h2>', // html
		'subtitle' => '<h3>Because everybody love to eat</h3>', // html
		'content' => 'This will show you, how to cook a fried rice', // html
		'image_id' => 24,
		'image_url' => 'http://example.com/wp-content/uploads/2015/02/image_large.jpg',
		'image_size' => 'large', // thumbnail, medium, etc
		'align' => 'center', // left, center, right
		'width' => '800px', // auto or number with px
		'height' => 'auto', // auto or number with px
	);
 */


$icon = apply_filters( 'tpb_generated_form_image_icon', $data_render );

/* Get data image */
$image_size = ( ! empty( $icon['image_size'] ) ) ? sanitize_text_field( $icon['image_size'] ) : 'thumbnail';
$image_url  = ( ! empty( $icon['image_url'] ) ) ? $icon['image_url'] : false;

$image_src = false;
if ( (int) $icon['image_id'] == $icon['image_id'] ) {
	$image_src  = wp_get_attachment_image_src ( $icon['image_id'], $image_size );
}
?>

<?php if ( $icon['template_style'] == 'boxed' ) : ?>
    <div class="content-boxed">
<?php endif; ?>

<?php if ( ! empty( $image_src ) ) : ?>
<div class="col-md-12 tpb-icon-container">
    <img src="<?php echo $image_src[0] ?>" class="tpb-icon-item" alt="#">
</div>
<?php endif; ?>

<?php if ( ! empty( $icon['title'] ) ) : ?>
<div class="col-md-12 tpb-icon-title">
    <h2>
        <?php if (!empty($icon['url'])) { ?><a href="<?php echo $icon['url'] ?>"><?php } ?>
        <?php echo strip_tags($icon['title']); ?>
        <?php if (!empty($icon['url'])) { ?></a><?php } ?>
    </h2>
</div>
<?php endif; ?>

<?php if ( ! empty( $icon['content'] ) ) : ?>
<div class="col-md-12 tpb-icon-content">
    <p><?php echo esc_html( $icon['content'] ); ?></p>
</div>
<?php endif; ?>

<?php if ( $icon['template_style'] == 'boxed' ) : ?>
    </div>
<?php endif; ?>