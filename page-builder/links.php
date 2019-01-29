<?php

/**
 * Page builder template : Links
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
   $links = array(
    'title' => '<h2>How To Cook</h2>', // html
    'links' => array(
        0 => array(
            'caption' => 'Google',
            'link' => 'http://google.com',
        ),
        1 => array(
            'caption' => 'Tonjoo',
            'link' => 'http://tonjoo.com',
        ),
        2 => array(
            'caption' => 'Yahoo',
            'link' => 'http://yahoo.com',
        )
    )
);
 */

$links = apply_filters( 'tpb_generated_form_links', $data_render ); ?>

<div class="row">
	
	<div class="col-md-12 widget-list tpb">
		<?php if ( ! empty( $links['title'] ) ) : ?>
			<div class="tpb-header"> 
				<div class="tpb-title">
					<?php echo $links['title']; ?>
				</div>
			</div>
		<?php endif; ?>
		<ul class="link-menu">
			<?php foreach ($links['links'] as $l) : ?>
				<li><a href="<?php echo $l['link'] ?>"><?php echo $l['caption'] ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

</div>