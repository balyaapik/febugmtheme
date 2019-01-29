<?php

/**
 * Page builder template : Sidebar widget list
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.3
 */

/**
 * Data Sample
    $sidebar_widget_list = array(
        'sidebar_id' => 'sidebar-widget'    // Sidebar ID
    );
 */

$sidebar_widget_list = apply_filters( 'tpb_generated_form_sidebar_widget_list', $data_render ); ?>

<div class="sidebar">
    <div class="widget-area">
        <div class="row">

            <?php
                if ( is_active_sidebar( $sidebar_widget_list['sidebar_id'] ) ) {
                    dynamic_sidebar( $sidebar_widget_list['sidebar_id'] );
                }
            ?>

        </div>
    </div> <!-- widget-area -->
</div> <!-- side-bar -->