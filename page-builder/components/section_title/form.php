<?php
global $tpb_components;
?>
<div class="form-column form-full-width">
	<!-- Title -->
	<label><?php _e('Section Title', TPB_TEXT_DOMAIN) ?></label>
	<input type='text' name='tpb_section_title_title'>
	<input type="hidden" name="tpb_section_title_title_type" value="h2">

	<!-- Section Title Template Style -->
	<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_select_form('template_style', $tpb_components['section_title']['template_style'] ); ?>
</div>
