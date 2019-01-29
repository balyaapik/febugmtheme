<?php
global $tpb_components;
?>

<label class="ace-editor-label"><?php _e('Component Title', TPB_TEXT_DOMAIN) ?></label>
<input type="text" name="tpb_rss_feed_title">

<label><?php _e('RSS Feed URL', TPB_TEXT_DOMAIN) ?></label>
<input type="text" name="tpb_rss_feed_url">

<label><?php _e('Jumlah Pos yang Ditampilkan', TPB_TEXT_DOMAIN) ?></label>
<select name="tpb_rss_feed_count">
	<?php for ($x = 1; $x <= 20; $x++) { ?>
		<option value="<?php echo $x ?>"><?php echo $x ?></option>
	<?php } ?>
</select>
