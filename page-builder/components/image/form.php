<?php
global $tpb_components;
?>
<div class="form-column">
	<!-- Image icon Template Style -->
	<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_select_form('template_style', $tpb_components['image']['template_style'] ); ?>
	<!-- Image -->
	<label class="image-label"><?php _e('Image', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_media_upload('tpb_image_image'); ?>
	<!-- Image Size -->
	<div class="form-inline clearfix">
		<label class="image-label"><?php _e('Image Size', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_form_image_sizes("tpb_image_image_size"); ?>
	</div>
	<!-- Link -->
	<div class="form-inline clearfix">
		<label><?php _e('Link', TPB_TEXT_DOMAIN) ?></label>
		<input type="text" name="tpb_image_link">
	</div>
</div>
<div class="form-column">
	<!-- Title -->
	<label class="ace-editor-label"><?php _e('Image Title', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_ace_editor('tpb_image_title') ?>

	<!-- Align -->
	<div class="form-inline clearfix">
		<label><?php _e('Align', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_select_form('tpb_image_align', tpb_align_array()); ?>
	</div>

	<!-- Width -->
	<div class="form-inline clearfix">
		<label><?php _e('Width', TPB_TEXT_DOMAIN) ?></label>
		<input type="number" name="tpb_image_width" placeholder="auto">
	</div>

	<!-- Height -->
	<div class="form-inline clearfix">
		<label><?php _e('Height', TPB_TEXT_DOMAIN) ?></label>
		<input type="number" name="tpb_image_height" placeholder="auto">
	</div>
</div>
