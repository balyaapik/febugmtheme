<?php
$rss_feed = apply_filters( 'tpb_generated_form_rss_feed', $data_render );
$args = array(
	'items'	=> $rss_feed["rss_feed_count"],
	'show_author' => 1,
	'show_date' => 1,
);

$rss = fetch_feed($rss_feed["rss_feed_url"]);

?>
<div class="row">
	<div class="col-md-12 tpb-header">
		<div class="tpb-title">
			<h2>
				<i class="fa fa-rss-square"></i>
				<a href="<?php echo $rss_feed["rss_feed_url"] ?>" target="_blank"><?php echo $rss_feed['title'] != "" ? $rss_feed['title'] : "RSS Feed"; ?></a>
			</h2>
		</div>
	</div>
	<div class="col-md-12 widget widget_rss">
		<?php
		if ( ! is_wp_error( $rss ) ) {
			wp_widget_rss_output($rss, $args);
		} else {
			echo "<p>RSS Feed tidak ditemukan.</p>";
		}
		?>
	</div>
</div>