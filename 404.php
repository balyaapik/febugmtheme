<?php
get_header();
?>

<div id="body">
	<div class="container">

		<div id="content" class="error-page">
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="error-header">
						<h1 class="error-title">404</h1>
						<p><?php echo is_english() ? 'Page not found' : 'Laman tidak ditemukan' ?></p>
					</div>
					<div class="error-message">
						<?php if(is_english()) : ?>
							<p>Wanna try our search?</p>
						<?php else: ?>
							<p>Maaf, laman yang Anda minta tidak dapat ditemukan. <br>Anda mungkin ingin mencoba pencarian situs:</p>
						<?php endif; ?>
						<div class="input-group btn-group">
							<form action="<?php echo site_url() ?>">
								<input type="text" class="form-control" name="s" placeholder="<?php echo is_english() ? 'Keyword...' : 'Masukkan kata kunci ...' ?>">
								<button type="submit" class="btn"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>

<?php
get_footer();
?>