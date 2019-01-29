<article class="no-results">
	<div class="page-content">
		<?php if ( is_search() ) : ?>

			<p><?php echo is_english() ? 'Nothing found for keyword' : 'Tidak ada hasil untuk pencarian dengan kata kunci' ?> <strong><?php echo get_search_query() ?></strong>.<br><?php echo is_english() ? 'Please try again with another keyword.' : 'Silakan coba lagi dengan kata kunci yang berbeda.' ?></p>
			<div class="input-group btn-group">
				<form action="<?php echo home_url() ?>">
					<input type="text" name="s" class="form-control" placeholder="<?php echo is_english() ? 'Keyword...' : 'Masukkan kata kunci ...' ?>" required>
					<button type="submit" class="btn"><i class="fa fa-search"></i></button>
				</form>
			</div>

		<?php elseif ( is_post_type_archive( "event" ) ) : ?>

			<p><?php echo is_english() ? 'Event not found.' : 'Event tidak ditemukan.' ?></p>

		<?php else : ?>

			<p><?php echo is_english() ? 'Article not found.' : 'Artikel tidak ditemukan.' ?></p>

		<?php endif; ?>
	</div>
</article>