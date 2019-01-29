<?php

/**
 * Page builder template : Icon
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.2
 */

/**
 * Data Sample
    $data_render = array(
        'title'     => '<h2>How To Cook</h2>',
        'subtitle'  => '<h3>Because everybody love to eat</h3>',
        'content'   => 'This will show you, how to cook a fried rice',
        'icon'      => 'icon-dribbble',
    );
 */

$icon = apply_filters( 'tpb_generated_form_icon', $data_render );?>

<?php if ( $icon['template_style'] == 'boxed' ) : ?>
    <div class="content-boxed">
<?php endif; ?>

<?php if ( ! empty( $icon['icon'] ) ) : ?>
    <div class="col-md-12 tpb-icon-container">
        <i class="<?php echo esc_attr( $icon['icon'] ); ?> tpb-icon-item"></i>
    </div>
<?php endif; ?>

<?php if ( ! empty( $icon['title'] ) ) : ?>
    <div class="col-md-12 tpb-icon-title">
        <h2>
            <?php if (!empty($icon['url']) && $icon['template_style'] != 'boxed') { ?><a href="<?php echo $icon['url'] ?>"><?php } ?>
            <?php echo strip_tags($icon['title']); ?>
            <?php if (!empty($icon['url']) && $icon['template_style'] != 'boxed') { ?></a><?php } ?>
        </h2>
    </div>
<?php endif; ?>

<?php if ( ! empty( $icon['content'] ) ) : ?>
    <div class="col-md-12 tpb-icon-content">
        <p><?php echo esc_html( $icon['content'] ); ?></p>
        <?php if ( $icon['template_style'] == 'boxed' && !empty($icon['url']) && !empty($icon['button'])) : ?>
            <a href="<?php echo $icon['url'] ?>" class="btn btn-outline"><?php echo $icon['button'] ?></a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ( $icon['template_style'] == 'boxed' ) : ?>
    </div>
<?php endif; ?>