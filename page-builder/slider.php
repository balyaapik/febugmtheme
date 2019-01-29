<?php

/**
 * Page builder template : Sangar Slider
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/* Check plugin activation */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( ! is_plugin_active( 'sangar-slider/sangar-slider.php' ) && ! is_plugin_active( 'sangar-slider-lite/sangar-slider-lite.php' ) ) {
    return;
}

/**
 * Data Sample
    $data_render = array(
        'shortcode' => '[sangar-slider id=1710]',
        'post_id'   => 1710
    );
 */

$sangar_slider = apply_filters( 'tpb_generated_form_sangar_slider', $data_render );

/* Check data exist or not */
if ( ! get_post( (int) $sangar_slider['post_id'] ) ) {
    return;
}

?>
<div class="row">
	
	<div class="col-md-12 widget-sangar-slider">
		<?php if ( ! empty( $sangar_slider['title'] ) ) : ?>
			<div class="tpb-header"> 
				<div class="tpb-title">
					<?php echo $sangar_slider['title']; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php echo do_shortcode( sanitize_text_field( $sangar_slider['shortcode'] ) ); ?>
	</div>

</div>