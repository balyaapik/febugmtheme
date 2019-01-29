<?php

/**
 * Page builder template : Image
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
	$data_render = array(
		'title'         => '<h2>New Women Collections</h2>', // html
		'subtitle'      => '<h3>New Arrival</h3>', // html
		'image_id'      => 1691,
		'image_url'     => 'http://127.0.0.1/dev-mino/wp-content/uploads/2014/01/dsc20050315_145007_132-1.jpg',
		'image_size'    => 'large', // thumbnail, medium, etc
		'align'         => 'left', // left, center, right
		'width'         => '400px', // auto or number with px
		'height'        => 'auto', // auto or number with px
		'link'          => 'http://tonjoostudio.com',
	);
 */

$image = apply_filters( 'tpb_generated_form_image', $data_render );

/* Set column width */
$width_class = '';
if ( ! empty( $data_column['width'] ) ) {
	$width_class = 'tpb-col-' . $data_column['width'];
}

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

// Templates options
if ( ! empty( $image['template_style'] ) ) {

	if ( $image['template_style'] == 'image_full' ) {
		$image_width  = '100%';
		$image_height = 'auto';
	}

}

/* Set image and container align */
$style_content = $style_container = '';
if ( ! empty( $image['align'] ) ) {
	$style_content      = 'style="text-align: ' . esc_attr( $image['align'] ) . ';"';
}
$style_container    = 'style="width: ' . esc_attr( $image_width ) . ';height: ' . esc_attr( $image_height ) . ';max-width: 100%;text-align: ' . esc_attr( $image['align'] ) . ';"';

/* Set image link */
$image_link = '';
if ( ! empty( $image['link'] ) ) {
	$image_link = 'href="' . esc_url( $image['link'] ) . '"';
}

?>

<?php if ($image_url) : ?>
<div class="row">
	
	<div class="col-md-12 widget-image">
		<div class="tpb-content-image <?php echo $width_class; ?>" <?php echo $style_container; ?>>
			<?php if ( ! empty( $image['title'] ) ) : ?>
				<div class="tpb-header"> 
					<div class="tpb-title">
						<?php echo $image['title']; ?>
					</div>
				</div>
			<?php endif; ?>
			<a <?php echo $style_content; ?> <?php echo $image_link; ?>>
				<img src="<?php echo esc_url( $image_url ); ?>" style="width:<?php echo esc_attr( $image_width ); ?>;height:<?php echo esc_attr( $image_height ); ?>"/>
			</a>
		</div>
	</div>

</div>
<?php endif; ?>