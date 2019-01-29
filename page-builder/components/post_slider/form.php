<?php
global $tpb_components;
?>

<script type="text/javascript">
jQuery(function($){
    var data = <?php echo tpb_get_taxonomy() ?>;

    $('body').on('change', '.tpb_post_slider_post_type', function(){
        var $container = $('body');
        var $terms = $container.find('.tpb_post_slider_terms');
        var key = $(this).val();

        // destroy current select2
        $terms.select2('destroy').html('');

        var $terms = $container.find('.tpb_post_slider_terms');

        // if empty key
        if(key != '')
        {
            // init after destroy
            var selectData = data[key];

            if (selectData) {
                $.each(selectData,function(index,value){
                    $terms.append('<option value="' + selectData[index].taxonomy + '::' + selectData[index].id + '">'+selectData[index].text+'</option>');
                });
            }
        }

        $terms.trigger('change').select2();
    });

    // post advanced query
    var container = '#post_slider.component-data-form';
    $(container).on('change', 'select[name="tpb_post_slider_advanced_query"]',function(){
        var container = '#post_slider.component-data-form' + ' ';
        var value = $(this).val();

        if(value == '1') {
            $(container + '.advanced_query').show();
            $(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').show();
        }
        else {
            $(container + '.advanced_query').hide();
            $(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').hide();
        }
    });

});

</script>

<script src="<?php echo THEME_URI . '/page-builder/assets/js/component.js' ?>"></script>

<!-- Advanced Query -->
<label><?php _e('Advanced Query', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_advanced_query', tpb_select_boolean()); ?>

<!-- Post Type -->
<label><?php _e('Post Type', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_get_all_post_type('tpb_post_slider_post_type'); ?>

<!-- Categories or Tags -->
<label class="advanced_query"><?php _e('Categories or Tags', TPB_TEXT_DOMAIN) ?></label>
<div class="advanced_query tpb-select2">
    <select class="tpb_post_slider_terms select2" name="tpb_post_slider_terms" data-number="0" multiple="multiple" placeholder="Set to empty to select all categories"></select>
</div>

<!-- Display Child Taxonomy -->
<label class="advanced_query"><?php _e('Display Child Taxonomy', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_display_child_taxonomy', tpb_select_boolean()); ?>

<!-- Post Auto SLide -->
<label><?php _e('Auto Slide', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_auto_slide', tpb_select_boolean_auto_play()); ?>

<!-- Post Template Style -->
<label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('template_style', $tpb_components['post_slider']['template_style'] ); ?>

<!-- Post Number -->
<label><?php _e('Post Number', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_post_number', tpb_select_display_post()); ?>

<!-- Order By -->
<label><?php _e('Order By', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_order_by', tpb_select_order_by()); ?>

<!-- Order -->
<label><?php _e('Order', TPB_TEXT_DOMAIN) ?></label>
<?php tpb_select_form('tpb_post_slider_order', tpb_select_order()); ?>

<!-- Date Format -->
<label class="is_custom_date_format"><?php _e('Date Format', TPB_TEXT_DOMAIN) ?></label>
<input type="text" name="tpb_post_slider_custom_date_format">
<label class="description is_custom_date_format">
    <?php
        printf(__('See the WordPress date format documentation %1$s here %2$s', TPB_TEXT_DOMAIN),
        '<a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">','</a>');
    ?>
</label>