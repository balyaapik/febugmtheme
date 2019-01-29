<?php

/**
 * Page builder template : Section Title
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.0
 */

/**
 * Data Sample
    $data_render = array(
        'title'      => 'How To Cook',
        'title_type' => 'H2'
        'subtitle'   => 'Lalalala'
    );
 */

$section_title = apply_filters( 'tpb_generated_form_section_title', $data_render );

?>

<?php if ( !empty($section_title['title']) ) : ?>
    <div class="row">
        <div class="col-md-12 tpb-header">
            <div class="tpb-title" style="margin-bottom:0;"><h2><?php echo $section_title['title'] ?></h2></div>
        </div>
    </div>
<?php endif; ?>