<?php

/**
 * Page builder template : HTML
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
    $data_render = array(
        'html' => '<p>This will show you, how to cook a fried rice</p>'
    );
 */

$html = apply_filters( 'tpb_generated_form_html', $data_render ); ?>
<div class="row">
	
	<div class="col-md-12 widget-html">
		<?php if ( ! empty( $html['title'] ) ) : ?>
			<div class="tpb-header"> 
				<div class="tpb-title">
					<?php echo $html['title']; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php
			if ( ! empty( $html['html'] ) )
		        echo $html['html'];
		?>
	</div>

</div>