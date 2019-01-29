<?php if ( ! empty( $data['icon'] ) ) : ?>
<div class="col-md-12 tpb-icon-container">
    <i class="<?php echo esc_attr( $data['icon'] ); ?> tpb-icon-item"></i>
</div>
<?php endif; ?>

<?php if ( ! empty( $data['title'] ) ) : ?>
<div class="col-md-12 tpb-icon-title">
    <?php echo $data['title']; ?>
</div>
<?php endif; ?>

<?php if ( ! empty( $data['subtitle'] ) ) : ?>
<div class="col-md-12 tpb-icon-subtitle">
    <?php echo $data['subtitle']; ?>
</div>
<?php endif; ?>

<?php if ( ! empty( $data['content'] ) ) : ?>
<div class="col-md-12 tpb-icon-content">
    <div class="tpb-icon-divider divider-<?php echo esc_attr( $data['align'] ); ?>"></div>
    <p><?php echo esc_html( $data['content'] ); ?></p>
</div>
<?php endif; ?>