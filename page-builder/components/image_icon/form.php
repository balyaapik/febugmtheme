<?php
global $tpb_components;
?>
<div class="form-column">
	<!-- Title -->
	<label class="ace-editor-label"><?php _e('Component Title', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_ace_editor('tpb_image_icon_title') ?>

	<!-- Content -->
	<div class="editor-height-medium">
		<label class="ace-editor-label"><?php _e('Content', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_form_ace_editor('tpb_image_icon_content') ?>
	</div>
</div>
<div class="form-column">
	<!-- Image icon Template Style -->
	<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_select_form('template_style', $tpb_components['image_icon']['template_style'] ); ?>

	<label><?php _e('URL', TPB_TEXT_DOMAIN) ?></label>
	<input type="text" name="tpb_image_icon_url">
	
	<!-- Image -->
	<label class="image-label"><?php _e('Image', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_media_upload('tpb_image_icon_image'); ?>
</div>