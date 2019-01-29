<?php
global $tpb_components;
?>
<style type="text/css">
	.select2-results .fa {
	  float: right;
	  position: relative;
	  line-height: 20px;
	}
	.select2-chosen .fa {
	  float: right;
	  position: relative;
	  line-height: 23px;
	}
</style>

<script type="text/javascript">
	jQuery(function($){
		function formatFontawesome(icon) {
		    var originalOption = icon.element;
		    return '<li class="' + $(originalOption).attr('value') + '"></li> ' + icon.text;
		}
		$('.tpb_icon_fa_icon').select2({
		    width: "100%",
		    formatResult: formatFontawesome,
		    formatSelection: formatFontawesome
		});
	});
</script>

<div class="form-column">
	<!-- Title -->
	<label class="ace-editor-label"><?php _e('Component Title', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_ace_editor('tpb_icon_fa_title') ?>

	<!-- Content -->
	<div class="editor-height-medium">
		<label class="ace-editor-label"><?php _e('Content', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_form_ace_editor('tpb_icon_fa_content') ?>
	</div>
</div>

<div class="form-column">

	<!-- Icon Template Style -->
	<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_select_form('template_style', $tpb_components['icon_fa']['template_style'] ); ?>

	<label><?php _e('URL', TPB_TEXT_DOMAIN) ?></label>
	<input type="text" name="tpb_icon_fa_url">

	<label><?php _e('Button text', TPB_TEXT_DOMAIN) ?></label>
	<input type="text" name="tpb_icon_fa_button">

	<!-- Icon -->
	<div class="form-inline">
		<label><?php _e('Icon', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_select_form('tpb_icon_fa_icon', tpb_fontawesome()); ?>
	</div>
</div>
