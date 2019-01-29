<article class="post">
	<div class="row">
		<div class="col-md-4 col-sm-4 post-img">
			<a href="<?php the_permalink() ?>">
				<?php if (has_post_thumbnail()) : the_post_thumbnail('ugm-archive-thumbnail-small'); endif; ?>
			</a>
		</div>
		<div class="col-md-8 col-sm-8 post-content">
			<div class="post-title">
				<h3>
					<a href="<?php the_permalink() ?>">
						<?php
							if (null == get_the_title()) :
								echo "Lihat Artikel";
							else :
								the_title();
							endif;
						?>
					</a>
				</h3>
				<p class="post-meta">
					<?php $cats = get_the_category(); ?>
					<?php if (!empty($cats)) : ?>
						<span class="post-category">
							<?php
							foreach ($cats as $c) :
								?><a href="<?php echo home_url() ?>/category/<?php echo $c->slug ?>"><?php echo $c->name ?></a><?php
							endforeach; 
							?>
						</span>
					<?php endif; ?>
					<span class="post-date"><?php the_time('l, j F Y') ?></span>
				</p>
			</div>
			<div class="entry-content">
				<?php
					if (in_array('easy-custom-auto-excerpt/easy-custom-auto-excerpt.php',get_option('active_plugins'))) {
						the_content();
					} else {
						the_excerpt();
					}
				?>
			</div>
		</div>
	</div>
</article>