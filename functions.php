<?php

/* definer */
require_once( 'inc/functions/define.php' );

/* Load libs */
require_once( 'inc/libs/wp_bootstrap_navwalker.php' );
require_once( 'inc/libs/advanced-custom-fields-pro/acf.php' );
require_once( 'inc/libs/acf-code-field/acf-code-field.php' );
require_once( 'inc/libs/acf-cf7/acf-cf7.php' );
require_once( 'inc/libs/tgm-plugin-activation/class-tgm-plugin-activation.php' );

/* Load functions */
require_once( 'inc/functions/setup.php' );
require_once( 'inc/functions/scripts.php' );
require_once( 'inc/functions/helpers.php' );
require_once( 'inc/functions/widgets.php' );
require_once( 'inc/functions/filters.php' );
require_once( 'inc/functions/custom_fields.php' );
require_once( 'inc/functions/plugins.php' );
require_once( 'inc/functions/custom_color.php' );
require_once( 'inc/functions/auto_update.php' );
require_once( 'inc/functions/write_htaccess.php' );

// Load TPB files
if ( ! function_exists( 'tpb_plugins_loaded' ) ) {
    require_once( 'inc/libs/tonjoo-page-builder/tonjoo-page-builder.php' );
    require_once( 'page-builder/page-builder.php' );
}

function add_translation_ugm() {
    load_theme_textdomain( 'ugm-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_translation_ugm' );




