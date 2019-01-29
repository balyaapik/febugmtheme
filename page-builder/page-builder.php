<?php
require_once( THEME_DIR . '/page-builder/inc/helper.php' );

/**
 * Replace post_list templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_post_list_template' ) ) {
    function ugm_theme_tpb_post_list_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_post_list_file', THEME_DIR . '/page-builder/post_list.php' );
    }
    add_filter( 'tpb_replace_component_post_list', 'ugm_theme_tpb_post_list_template', 10, 1 );
}

/**
 * Replace product_list templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_product_list_template' ) ) {
    function ugm_theme_tpb_product_list_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_product_list_file', THEME_DIR . '/page-builder/product_list.php' );
    }
    add_filter( 'tpb_replace_component_product_list', 'ugm_theme_tpb_product_list_template', 10, 1 );
}

/**
 * Replace image templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_image_template' ) ) {
    function ugm_theme_tpb_image_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_image_file', THEME_DIR . '/page-builder/image.php' );
    }
    add_filter( 'tpb_replace_component_image', 'ugm_theme_tpb_image_template', 10, 1 );
}

/**
 * Replace image_button templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_image_button_template' ) ) {
    function ugm_theme_tpb_image_button_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_image_button_file', THEME_DIR . '/page-builder/image_button.php' );
    }
    add_filter( 'tpb_replace_component_image_button', 'ugm_theme_tpb_image_button_template', 10, 1 );
}

/**
 * Replace slider templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_slider_template' ) ) {
    function ugm_theme_tpb_slider_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_slider_file', THEME_DIR . '/page-builder/slider.php' );
    }
    add_filter( 'tpb_replace_component_slider', 'ugm_theme_tpb_slider_template', 10, 1 );
}

/**
 * Replace icon templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_icon_template' ) ) {
    function ugm_theme_tpb_icon_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_icon_file', THEME_DIR . '/page-builder/icon.php' );
    }
    add_filter( 'tpb_replace_component_icon', 'ugm_theme_tpb_icon_template', 10, 1 );
}

/**
 * Replace icon templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_icon_fa_template' ) ) {
    function ugm_theme_tpb_icon_fa_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_icon_file', THEME_DIR . '/page-builder/icon.php' );
    }
    add_filter( 'tpb_replace_component_icon_fa', 'ugm_theme_tpb_icon_fa_template', 10, 1 );
}

/**
 * Replace image_icon templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_image_icon_template' ) ) {
    function ugm_theme_tpb_image_icon_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_image_icon_file', THEME_DIR . '/page-builder/image_icon.php' );
    }
    add_filter( 'tpb_replace_component_image_icon', 'ugm_theme_tpb_image_icon_template', 10, 1 );
}

/**
 * Replace html templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_html_template' ) ) {
    function ugm_theme_tpb_html_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_html_file', THEME_DIR . '/page-builder/html.php' );
    }
    add_filter( 'tpb_replace_component_html', 'ugm_theme_tpb_html_template', 10, 1 );
}

/**
 * Replace text templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_text_template' ) ) {
    function ugm_theme_tpb_text_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_text_file', THEME_DIR . '/page-builder/text.php' );
    }
    add_filter( 'tpb_replace_component_text', 'ugm_theme_tpb_text_template', 10, 1 );
}

/**
 * Replace section_title templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_section_title_template' ) ) {
    function ugm_theme_tpb_section_title_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_section_title_file', THEME_DIR . '/page-builder/section_title.php' );
    }
    add_filter( 'tpb_replace_component_section_title', 'ugm_theme_tpb_section_title_template', 10, 1 );
}

/**
 * Replace links templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_links_template' ) ) {
    function ugm_theme_tpb_links_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_links_file', THEME_DIR . '/page-builder/links.php' );
    }
    add_filter( 'tpb_replace_component_links', 'ugm_theme_tpb_links_template', 10, 1 );
}

/**
 * Replace sidebar templates
 * @param  string $original Current template
 * @return string           New templates
 */
if ( ! function_exists( 'ugm_theme_tpb_sidebar_template' ) ) {
    function ugm_theme_tpb_sidebar_template( $original ) {
        return apply_filters( 'ugm_theme_tpb_sidebar_file', THEME_DIR . '/page-builder/sidebar.php' );
    }
    add_filter( 'tpb_replace_component_sidebar', 'ugm_theme_tpb_sidebar_template', 10, 1 );
}

// Add specific component stylesheets
if ( function_exists( 'tpb_add_component_stylesheet' ) ) {
    tpb_add_component_stylesheet( array( 'image_button', 'image' ), THEME_URI . '/page-builder/assets/css/image.css' );
    tpb_add_component_stylesheet( array( 'image_icon', 'icon', 'icon_fa' ), THEME_URI . '/page-builder/assets/css/icon.css' );
    tpb_add_component_stylesheet( array( 'text', 'html' ), THEME_URI . '/page-builder/assets/css/text.css' );
    tpb_add_component_stylesheet( array( 'post_list' ), THEME_URI . '/page-builder/assets/css/post.css' );
    tpb_add_component_stylesheet( array( 'product_list' ), THEME_URI . '/page-builder/assets/css/product.css' );
}

if ( ! function_exists( 'ugm_theme_tpb_add_template_image' ) ) {

    /**
     * Add image full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_image( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'image_full', 'label' => 'Image for full width and auto height' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_image', 'ugm_theme_tpb_add_template_image', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_icon' ) ) {

    /**
     * Add icon full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_icon( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'boxed', 'label' => 'Boxed' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_icon', 'ugm_theme_tpb_add_template_icon', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_icon_fa' ) ) {

    /**
     * Add icon full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_icon_fa( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'boxed', 'label' => 'Boxed' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_icon_fa', 'ugm_theme_tpb_add_template_icon_fa', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_image_icon' ) ) {

    /**
     * Add image_icon full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_image_icon( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'boxed', 'label' => 'Boxed' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_image_icon', 'ugm_theme_tpb_add_template_image_icon', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_post_list' ) ) {

    /**
     * Add post_list full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_post_list( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'horizontal', 'label' => 'Horizontal' ) );
        array_push( $template_styles, array( 'value' => 'no_image', 'label' => 'Tanpa Gambar' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_post_list', 'ugm_theme_tpb_add_template_post_list', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_post_slider' ) ) {

    /**
     * Add post_slider full template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_post_slider( $template_styles ) {
        $template_styles = array();
        array_push( $template_styles, array( 'value' => 'post_list_slider_1', 'label' => 'Slider Biru Solid' ) );
        array_push( $template_styles, array( 'value' => 'post_list_slider_3', 'label' => 'Slider Biru Transparan' ) );
        array_push( $template_styles, array( 'value' => 'post_list_slider_4', 'label' => 'Slider Kuning Solid' ) );
        array_push( $template_styles, array( 'value' => 'post_list_slider_2', 'label' => 'Slider Kuning Transparan' ) );
        array_push( $template_styles, array( 'value' => 'post_list_slider_5', 'label' => 'Slider Tanpa Teks' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_post_slider', 'ugm_theme_tpb_add_template_post_slider', 10, 1 );

if ( ! function_exists( 'ugm_theme_tpb_add_template_image_button' ) ) {

    /**
     * Add image_button same height template
     * @param  array $template_styles Old template file list
     * @return array                  New template file list
     */
    function ugm_theme_tpb_add_template_image_button( $template_styles ) {
        array_push( $template_styles, array( 'value' => 'image_button_height_mobile', 'label' => 'Same height in mobile' ) );
        array_push( $template_styles, array( 'value' => 'image_button_full', 'label' => 'Full width' ) );
        return $template_styles;
    }

}
add_filter( 'tpb_add_template_style_image_button', 'ugm_theme_tpb_add_template_image_button', 10, 1 );

if ( ! function_exists( 'ugm_theme_update_components' ) ) {

    /**
     * Update component
     * @param  array $components Old component list
     * @return array             New component list
     */
    function ugm_theme_update_components( $components ) {

        /* create new component */
        $components['post_slider'] = array(
            'openCallback'              => 'tpb_post_slider_open', // called on open save form
            'saveCallback'              => 'tpb_post_slider_save', // called on open edit form
            'title'                     => __( 'Post Slider', TPB_TEXT_DOMAIN ),
            'image'                     => TPB_DIR_URL . 'components/slider/image.svg',
            'admin_template_location'   => THEME_DIR . '/page-builder/components/post_slider/form.php',
            'front_template_location'   => THEME_DIR . '/page-builder/post_slider.php',
        );
        $components['rss_feed'] = array(
            'openCallback'              => 'tpb_rss_feed_open', // called on open save form
            'saveCallback'              => 'tpb_rss_feed_save', // called on open edit form
            'title'                     => __( 'RSS Feed', TPB_TEXT_DOMAIN ),
            'image'                     => TPB_DIR_URL . 'components/post_list/image.svg',
            'admin_template_location'   => THEME_DIR . '/page-builder/components/rss_feed/form.php',
            'front_template_location'   => THEME_DIR . '/page-builder/rss_feed.php',
        );

        /* update form */
        $components['icon']['admin_template_location'] = THEME_DIR . '/page-builder/components/icon/form.php';
        $components['icon_fa']['admin_template_location'] = THEME_DIR . '/page-builder/components/icon_fa/form.php';
        $components['image_icon']['admin_template_location'] = THEME_DIR . '/page-builder/components/image_icon/form.php';
        $components['image']['admin_template_location'] = THEME_DIR . '/page-builder/components/image/form.php';
        $components['post_list']['admin_template_location'] = THEME_DIR . '/page-builder/components/post_list/form.php';
        $components['section_title']['admin_template_location'] = THEME_DIR . '/page-builder/components/section_title/form.php';

        /* remove default component */
        unset($components['image_button']);
        unset($components['product_list']);
        unset($components['featured_post_list']);

        return $components;

    }

}

add_filter( 'tpb_add_new_component', 'ugm_theme_update_components', 10, 1 );