<?php

/**
 * Page builder template : Text
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
	$text = array(
		'text' => 'This will show you, how to cook a fried rice'
	);
 */

$text = apply_filters( 'tpb_generated_form_text', $data_render ); ?>

<div class="row">
	
	<div class="col-md-12 widget-text">
		<?php if ( ! empty( $text['title'] ) ) : ?>
			<div class="tpb-header"> 
				<div class="tpb-title">
					<?php echo $text['title']; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php
			if ( ! empty( $text['text'] ) )
				echo $text['text'];
		?>
	</div>

</div>