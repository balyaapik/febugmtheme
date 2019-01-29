<?php

/**
 * Page builder template : Post List
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.3
 */

/**
 * Data Sample
 * 	$data_render = array(
 * 		'template_style' => 'default' 												// defaultnya default
 * 	    'title' => '<h2>How To Cook</h2>', 											// html
 * 	    'subtitle' => '<p class="tpb-subtitle">Because everybody love to eat</p>', 	// html
 * 	    'advanced_query' => false, 													// boolean 1 or 0
 * 	    'post_type' => 'posts',
 * 	    'taxonomy' => array(
 * 	        'category' => array(103, 115, 206) 										// taxonomy and array terms id
 * 	        ...
 * 	    ),
 * 	    'display_child_taxonomy' => true, 											// boolean 1 or 0
 * 	    'display_excerpt' => true, 													// boolean 1 or 0
 * 	    'post_number' => '10', 														// 1 to 12
 * 	    'order_by' => 'modified',
 * 	    'order' => 'DESC', 															// ASC and DESC
 * 	    'display_date' => true, 													// boolean 1 or 0
 * 	    'custom_date_format' => 'l, F j, Y', 										// if empty inherit to wp core
 * 	    'layout' => '4-post-per-row', 												// 4 to 1
 * 	);
 */

$post_list = apply_filters( 'tpb_generated_form_post_list', $data_render );

/* Check Layout */
$post_auto_class = '';
if ( ! empty( $post_list['layout'] ) && $post_list['layout'] == 'auto' ) {
	if ( $data_column['width'] <= 4 ) {
		$post_list['layout'] = '1-post-per-row';
		$post_auto_class     = ' post-auto-1';
	} elseif ( $data_column['width'] > 4 && $data_column['width'] <= 8 ) {
		$post_list['layout'] = '2-post-per-row';
		$post_auto_class     = ' post-auto-2';
	} else {
		$post_list['layout'] = '3-post-per-row';
		$post_auto_class     = ' post-auto-3';
	}
} else {
	if ( $post_list['layout'] == '1-post-per-row' ) {
		$post_auto_class     = ' post-auto-1';
	} elseif ( $post_list['layout'] == '2-post-per-row' ) {
		$post_auto_class     = ' post-auto-2';
	} elseif ( $post_list['layout'] == '3-post-per-row' ) {
		$post_auto_class     = ' post-auto-3';
	} elseif ( $post_list['layout'] == '4-post-per-row' ) {
		$post_auto_class     = ' post-auto-4';        
	}
}

$args = array( 'ignore_sticky_posts' => true );

/* Post Type */
$args['post_type']  = sanitize_text_field( $post_list['post_type'] );

/* Taxonomy */
if ( $post_list['advanced_query'] ) {
	if ( ! empty( $post_list['taxonomy'] ) && (array) $post_list['taxonomy'] == $post_list['taxonomy'] ) {
		foreach ($post_list['taxonomy'] as $tax => $t) {
			if ( ! empty( $t ) && (array) $t == $t ) {

				$args['tax_query'][] = array(
					'taxonomy'          => $tax,
					'field'             => 'term_id',
					'terms'             => array_map( 'absint', $t ),
					'include_children'  => ( isset( $post_list['display_child_taxonomy'] ) ) ? $post_list['display_child_taxonomy'] : 1
				);

			}
		}
	}
}

/* Post Number, Orderby, Order */
$args['posts_per_page'] = ( ! empty( $post_list['post_number'] ) ) ? sanitize_text_field( $post_list['post_number'] ) : '3';
if ($args['post_type'] == 'event' && !empty( $post_list['order_by'] ) && $post_list['order_by'] == 'event_date') {
	$args['meta_key'] 		= 'ugm_event_date';
	$args['orderby']		= array('meta_value_num' => 'DESC');
} else if ($args['post_type'] == 'event' && !empty( $post_list['order_by'] ) && $post_list['order_by'] == 'upcoming_event') {
	$args['meta_key'] 		= 'ugm_event_date';
	$args['orderby']		= array('meta_value_num' => 'ASC');
	$args['meta_query']		= array(
		array(
			'key'		=> 'ugm_event_date',
			'value'		=> (int)date('Ymd'),
			'compare'	=> '>='
		)
	);
} else {
	$args['orderby']       = ( ! empty( $post_list['order_by'] ) ) ? sanitize_text_field( $post_list['order_by'] ) : 'post_date';
	$args['order']          = ( ! empty( $post_list['order'] ) ) ? sanitize_text_field( $post_list['order'] ) : 'DESC';
}

/* Get data */
$args = apply_filters( 'tpb_generated_args_post_list', $args );
$post_list_data = new WP_Query( $args );

// Template style
$post_container_class   = '';
$template_name          = 'recent';
$before_container       = '';
$after_container        = '';
$data_responsive        = ( isset( $data_column['config']['responsive'] ) ) ? $data_column['config']['responsive'] : false;
$container_class        = tpb_items_per_column( sanitize_text_field( $post_list['layout'] ), $data_responsive );
if ( ! empty( $post_list['template_style'] ) ) {
	if ( $post_list['post_type'] == 'event' ) {
		$post_container_class   = ' post-event';
		$template_name          = 'event';
		$before_container       = '';
		$after_container        = '';
		$post_auto_class        = '';
	} else if ( $post_list['post_type'] == 'gallery' ) {
		$post_container_class   = '';
		$template_name          = 'gallery';
		$before_container       = '<div class="gallery">';
		$after_container        = '</div>';
		$container_class        = 'gallery col-md-12';
		$post_auto_class        = '';
	} else if ( $post_list['template_style'] == 'horizontal' ) {
		$post_container_class   = '';
		$template_name          = 'horizontal';
		$before_container       = '';
		$after_container        = '';
		$container_class        = 'col-md-12';
		$post_auto_class        = '';
	} else if ( $post_list['template_style'] == 'no_image' ) {
		$post_container_class   = ' no-image';
		$template_name          = 'no_image';
		$before_container       = '';
		$after_container        = '';
		$post_auto_class        = '';
	}
}

/* Container setup */
$setup  = array(
	'container_class'   => 'post ' . $container_class . $post_auto_class . $post_container_class,
	'template_slug'     => 'parts/content',
	'template_name'     => $template_name,
);
$setup   = apply_filters( 'tpb_generated_setup_post_list', $setup );

if (!empty($post_list['custom_date_format'])) {
	$date_format = $post_list['custom_date_format'];
} else {
	$date_format = 'd F Y';
}

if (!function_exists("loop_wrap")) {
	function loop_wrap($current_pos, $pos = "start", $post_list_data, $post_list) {
		$total = $post_list_data->post_count;

		if ($current_pos == 0 && $post_list['layout'] != '1-post-per-row' && $pos == "start") {
			echo "<div class='col-md-12 multi-column'>";
		}

		if (
			$post_list['layout'] == '2-post-per-row' && ($current_pos % 2 == 0) ||
			$post_list['layout'] == '3-post-per-row' && ($current_pos % 3 == 0) ||
			$post_list['layout'] == '4-post-per-row' && ($current_pos % 4 == 0)
		) {
			if ($pos == "start") {
				if ($current_pos > 0) {
					echo "</div>";
				}
				echo "<div class='row post-row'>";
			}
		}

		if ($current_pos == ($total-1) && $post_list['layout'] != '1-post-per-row' && $pos == "end") {
			echo "</div>";
			echo "</div>";
		}
		// TODOs
	}
}

if (!function_exists('tpb_manual_excerpt')) {
	function tpb_manual_excerpt($content, $limit = 40) {
		$excerpt = wp_trim_words(strip_tags($content), $limit, ' ...');
		return $excerpt;
	}
}

?>

<div class="row">

	<?php if ( ! empty( $post_list['title'] ) ) : ?>
	<div class="col-md-12 tpb-header">
		<div class="tpb-title"><?php echo $post_list['title']; ?></div>
	</div>
	<?php endif; ?>

	<?php echo $before_container; ?>
	<?php if ( $post_list_data->have_posts() ) : ?>
		<?php $loop = 0; ?>
		<?php while ( $post_list_data->have_posts() ) : $post_list_data->the_post(); ?>

			<?php if ($post_list['post_type'] == 'gallery') : ?>
				
				<?php
					if ($post_list['layout'] == '3-post-per-row') {
						$gallery_class = 'col-md-4';
					} else if ($post_list['layout'] == '4-post-per-row') {
						$gallery_class = 'col-md-3';
					} else if ($post_list['layout'] == '2-post-per-row') {
						$gallery_class = 'col-md-6';
					} else {
						$gallery_class = 'col-md-12';
					}
				?>

				<figure class="gallery-item <?php echo $gallery_class ?>">
					<div class="gallery-img">
						<a href="<?php the_permalink() ?>">

							<?php
							$gallery = get_field('ugm_gallery', get_the_ID());
							if (!empty($gallery[0]) && !empty($gallery[0]['image'])) {
								if ($post_list['layout'] == '4-post-per-row') :
									$size = 'ugm-archive-thumbnail-small';
								else :
									$size = 'ugm-archive-thumbnail-medium';
								endif;
								echo wp_get_attachment_image($gallery[0]['image'], $size);
							}
							?>
						</a>
					</div>
					<figcaption class="gallery-caption"><?php the_title(); ?></figcaption>
				</figure>

			<?php else : ?>
				
				<?php loop_wrap($loop, "start", $post_list_data, $post_list); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( $setup['container_class'] ); ?>>

					<?php if ($post_list['post_type'] == 'event') : ?>

						<?php $date = get_field('ugm_event_date', get_the_ID()); ?>
						<div class="row">
							<div class="col-md-3 event-date col-sm-3 col-xs-3">
								<span><?php echo date_i18n('d', strtotime($date)); ?> <strong><?php echo date_i18n('M', strtotime($date)); ?></strong></span>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-9 post-content">
								<div class="post-title">
									<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
								</div>
								<?php if ($post_list['display_excerpt']) : ?>
									<div class="entry-content">
										<?php $excerpt = get_field('ugm_event_short_description', get_the_ID()); ?>
										<?php if(!empty($excerpt)) : ?>
											<p><?php the_field('ugm_event_short_description', get_the_ID()); ?></p>
										<?php else: ?>
											<?php echo tpb_manual_excerpt(get_the_content()); ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>

					<?php elseif ($post_list['template_style'] == 'no_image') : ?>

						<div class="row">
							<div class="col-md-12 post-content">
								<div class="post-title">
									<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<?php if ($post_list['display_date']): ?>
										<span class="post-date"><?php the_time($date_format); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>

					<?php else: ?>

						<div class="row">
							<div class="<?php echo $post_list['layout'] == '1-post-per-row' || $post_list['template_style'] == 'horizontal' ? 'col-md-4' : 'col-md-12' ?> col-sm-4 post-img">
								<a href="<?php the_permalink(); ?>">
									<?php
										if ($post_list['layout'] == '1-post-per-row' || $post_list['template_style'] == 'horizontal') :
											$size = 'ugm-archive-thumbnail-large';
										elseif ($post_list['layout'] == '2-post-per-row') :
											$size = 'ugm-archive-thumbnail-large';
										elseif ($post_list['layout'] == '3-post-per-row') :
											$size = 'ugm-archive-thumbnail-medium';
										elseif ($post_list['layout'] == '4-post-per-row') :
											$size = 'ugm-archive-thumbnail-small';
										endif;
									?>
									<?php if ( has_post_thumbnail( get_the_ID() ) ) the_post_thumbnail( $size, array( 'class' => 'img-responsive' ) ); ?>
								</a>
							</div>
							<div class="<?php echo $post_list['layout'] == '1-post-per-row' || $post_list['template_style'] == 'horizontal' ? 'col-md-8' : 'col-md-12' ?> col-sm-8 post-content">
								<div class="post-title">
									<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
									<?php if ($post_list['display_date']): ?>
										<span class="post-date"><?php the_time($date_format); ?></span>
									<?php endif; ?>
								</div>
								<?php if ($post_list['display_excerpt']) : ?>
									<div class="entry-content">
										<?php echo tpb_manual_excerpt(get_the_content()); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>

					<?php endif; ?>

				</article>
				
				<?php loop_wrap($loop, "end", $post_list_data, $post_list); ?>

			<?php endif; ?>

		<?php $loop++; endwhile; ?>

		<?php if (isset($post_list['view_all']) && $post_list['view_all']) : ?>
			<?php
				$archive_url = get_post_type_archive_link( $post_list['post_type'] );
				if (!empty($post_list['view_all_url'])) {
					$archive_url = $post_list['view_all_url'];
				} else {
					if ($post_list['post_type'] == 'post') {
						$posts_page = get_option('page_for_posts');
						if($posts_page) {
							$archive_url = get_permalink($posts_page);
						}
						if (!empty($post_list['taxonomy']['category'])) {
							$archive_url = get_category_link($post_list['taxonomy']['category'][0]);
						} else if (!empty($post_list['taxonomy']['post_tag'])) {
							$archive_url = get_tag_link($post_list['taxonomy']['post_tag'][0]);
						}
					} else {
						if (sizeof($post_list['taxonomy']) == 1) {
							foreach ($post_list['taxonomy'] as $t) {
								$taxonomy = $t;
							}
							$term_url = get_term_link((int)$taxonomy[0]);
							if (!is_wp_error($term_url)) {
								$archive_url = $term_url;
							}
						}
					}
				}
			?>
			<div class="btn-box col-md-12"><a href="<?php echo $archive_url; ?>" class="btn btn-more"><?php echo $post_list['view_all_text'] ?></a></div>
		<?php endif; ?>

	<?php endif; ?>
	<?php echo $after_container; ?>

</div>

<?php wp_reset_postdata(); ?>