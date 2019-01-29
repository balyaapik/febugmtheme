<?php

/**
 * Page builder template : HTML
 *
 * @package UGM Theme
 * @since UGM Theme 1.3.3
 */

if ( ! function_exists( 'tpb_heading_list' ) ) :

    /**
     * Set heading tag
     * @return array
     */
    function tpb_heading_list( $key = false ) {

        $data = array(
            'H1' => array( 'before' => '<h1>', 'after' => '</h1>' ),
            'H2' => array( 'before' => '<h2>', 'after' => '</h2>' ),
            'H3' => array( 'before' => '<h3>', 'after' => '</h3>' ),
            'H4' => array( 'before' => '<h4>', 'after' => '</h4>' ),
            'H5' => array( 'before' => '<h5>', 'after' => '</h5>' )
        );
        $data = apply_filters( 'tbp_heading_tag_list', $data );

        if ( $key && false != array_key_exists( $key, $data ) ) {
            return $data[ $key ];
        }

        return $data;

    }

endif;

if ( ! function_exists( 'tpb_items_per_column' ) ) :

    /**
     * Set column container class
     * @return array
     */
    function tpb_items_per_column( $key = false, $responsive = false ) {

        // Desktop class
        $data_desktop = array(
            '4-post-per-row' => 'col-md-3',
            '3-post-per-row' => 'col-md-4',
            '2-post-per-row' => 'col-md-6',
            '1-post-per-row' => 'col-md-12'
        );
        $data_desktop = apply_filters( 'tbp_container_class_column', $data_desktop );

        if ( $key && false != array_key_exists( $key, $data_desktop ) ) {
            $setup_class_ds = $data_desktop[ $key ];
        }

        // Tablet class
        $setup_class_tb = ' col-sm-12';
        if ( $responsive ) {

            $data_tablet = 8;
            if ( ! empty( $responsive['sm'] ) ) {
                $data_tablet   = str_replace( 'col-sm-', '', $responsive['sm'] );
            }
            
            // Minimun tablet column width
            $data_tablet_min = apply_filters( 'tbp_container_class_tablet_min', 8 );
            if ( $data_tablet >= $data_tablet_min ) {
                $setup_class_tb = ' col-sm-6';
            }

        }

        return $setup_class_ds . ' ' . $setup_class_tb;

    }

endif;

if ( ! function_exists( 'tpb_items_per_column_product' ) ) :

    /**
     * Set column container class
     * @return array
     */
    function tpb_items_per_column_product( $key = false ) {

        $data = array(
            '4-post-per-row' => 'col-md-3 col-sm-6 col-xs-6',
            '3-post-per-row' => 'col-md-4 col-sm-6 col-xs-6',
            '2-post-per-row' => 'col-md-6 col-sm-6 col-xs-6',
            '1-post-per-row' => 'col-md-12 col-sm-6 col-xs-6'
        );
        $data = apply_filters( 'tbp_container_class_column_product', $data );

        if ( $key && false != array_key_exists( $key, $data ) ) {
            return $data[ $key ];
        }

        return $data;

    }

endif;