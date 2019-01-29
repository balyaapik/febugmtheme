<article class="single-post" <?php echo post_password_required() ? "protected" : "" ?>>
	<div class="post-heading">
		<?php
			the_title( '<h1 class="post-title">', '</h1>' );
		?>
		<ul class="entry-meta">
			<li class="post-date"><?php echo the_time('j F Y, H.i') ?></li>
			<li class="post-author"><?php echo is_english() ? 'By' : 'Oleh' ?>: <?php the_author() ?></li>
			<!-- <li class="post-reads">245</li> -->
			<?php if(get_comments_number()>0) : ?>
			<li class="post-comments"><?php echo get_comments_number() ?></li>
			<?php endif; ?>
		</ul>
	</div>
	<div class="post-content">
	<?php 
		if(post_password_required()){
			the_content();
		} else { ?>
			<?php $gallery = get_field('ugm_gallery', get_the_ID()); ?>
			<div class="slider-preview">
				<?php foreach ($gallery as $g) : ?>
					<figure class="gallery-item">
						<div class="gallery-img">
							<?php echo wp_get_attachment_image($g['image'], 'ugm-post-content'); ?>
						</div>
						<figcaption class="gallery-caption">
							<h4><?php echo $g['caption'] ?></h4>
							<p><?php echo $g['description'] ?></p>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
			<div class="slider-nav">
				<?php foreach ($gallery as $g) : ?>
					<figure class="gallery-item">
						<div class="gallery-img">
							<?php echo wp_get_attachment_image($g['image'], 'ugm-archive-thumbnail-small'); ?>
						</div>
						<figcaption class="gallery-caption">
							<p><?php echo $g['caption'] ?></p>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	<?php } ?>
</article>