<?php
global $tpb_components;
?>
<style type="text/css">
	.select2-results .glyphicon {
	  float: right;
	  position: relative;
	  line-height: 20px;
	}
	.select2-chosen .glyphicon {
	  float: right;
	  position: relative;
	  line-height: 23px;
	}
</style>

<script type="text/javascript">
	jQuery(function($){
		function formatGlyphicon(icon) {
		    var originalOption = icon.element;
		    return '<span class="' + $(originalOption).attr('value') + '" aria-hidden="true"></span> ' + icon.text;
		}
		$('.tpb_icon_icon').select2({
		    width: "100%",
		    formatResult: formatGlyphicon,
		    formatSelection: formatGlyphicon
		});
	});
</script>

<div class="form-column">
	<!-- Title -->
	<label class="ace-editor-label"><?php _e('Component Title', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_form_ace_editor('tpb_icon_title') ?>

	<!-- Content -->
	<div class="editor-height-medium">
		<label class="ace-editor-label"><?php _e('Content', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_form_ace_editor('tpb_icon_content') ?>
	</div>
</div>

<div class="form-column">

	<!-- Icon Template Style -->
	<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
	<?php tpb_select_form('template_style', $tpb_components['icon']['template_style'] ); ?>

	<label><?php _e('URL', TPB_TEXT_DOMAIN) ?></label>
	<input type="text" name="tpb_icon_url">

	<label><?php _e('Button text', TPB_TEXT_DOMAIN) ?></label>
	<input type="text" name="tpb_icon_button">

	<!-- Icon -->
	<div class="form-inline">
		<label><?php _e('Icon', TPB_TEXT_DOMAIN) ?></label>
		<?php tpb_select_form('tpb_icon_icon', tpb_glyphicon()); ?>
	</div>
</div>
