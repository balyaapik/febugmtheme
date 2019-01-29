<?php
global $tpb_components;
?>

<script type="text/javascript">
jQuery(function($){
    var data = <?php echo tpb_get_taxonomy() ?>;

    $('body').on('change', '.tpb_post_list_post_type', function(){
        var $container = $('body');
        var $terms = $container.find('.tpb_post_list_terms');
        var key = $(this).val();

        // destroy current select2
        $terms.select2('destroy').html('');

        var $terms = $container.find('.tpb_post_list_terms');

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
            if (key == 'event') {
                $('.tpb_post_list_order_by').prepend('<option value="event_date">Event Date</option>').prepend('<option value="upcoming_event">Upcoming Event</option>');
                $('.tpb_post_list_order_by').val('upcoming_event');
            } else {
                if ($('.tpb_post_list_order_by').val() == 'event_date' || $('.tpb_post_list_order_by').val() == 'upcoming_event') {
                    $('.tpb_post_list_order_by').val('date');
                }
                $('.tpb_post_list_order_by option[value="event_date"], .tpb_post_list_order_by option[value="upcoming_event"]').remove();
            }
        }

        $terms.trigger('change').select2();
    });
});
</script>

<div class="form-column">
    <!-- Title -->
    <label class="ace-editor-label"><?php _e('Component Title', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_form_ace_editor('tpb_post_list_title') ?>

    <!-- Advanced Query -->
    <label><?php _e('Advanced Query', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_advanced_query', tpb_select_boolean()); ?>

    <!-- Post Type -->
    <label><?php _e('Post Type', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_get_all_post_type('tpb_post_list_post_type'); ?>

    <!-- Categories or Tags -->
    <label class="advanced_query"><?php _e('Categories or Tags', TPB_TEXT_DOMAIN) ?></label>
    <div class="advanced_query tpb-select2">
        <select class="tpb_post_list_terms select2" name="tpb_post_list_terms" data-number="0" multiple="multiple" placeholder="Set to empty to select all categories"></select>
    </div>

    <!-- Display Child Taxonomy -->
    <label class="advanced_query"><?php _e('Display Child Taxonomy', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_display_child_taxonomy', tpb_select_boolean()); ?>

    <!-- Display View All -->
    <label><?php _e('Display "View All" link', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_view_all', tpb_select_boolean()); ?>

    <!-- View All Text -->
    <label><?php _e('"View All" Text', TPB_TEXT_DOMAIN) ?></label>
    <input type="text" name="tpb_post_list_view_all_text" value="View All">

    <!-- View All Text -->
    <label><?php _e('"View All" URL', TPB_TEXT_DOMAIN) ?></label>
    <input type="text" name="tpb_post_list_view_all_url">
    <p><?php _e('If URL is set to empty, it will use post type archive URL', TPB_TEXT_DOMAIN) ?></p>
</div>

<div class="form-column">

    <!-- Post Template Style -->
    <label><?php _e('Template Style', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('template_style', $tpb_components['post_list']['template_style'] ); ?>

    <!-- Post Number -->
    <label><?php _e('Post Number', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_post_number', tpb_select_display_post()); ?>

    <!-- Order By -->
    <label><?php _e('Order By', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_order_by', tpb_select_order_by()); ?>

    <!-- Order -->
    <label><?php _e('Order', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_order', tpb_select_order()); ?>

    <!-- Display Date -->
    <label><?php _e('Display Date', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_display_date', tpb_select_boolean()); ?>

    <!-- Custom Date Format -->
    <label><?php _e('Custom Date Format', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_is_custom_date_format', tpb_select_boolean()); ?>

    <!-- Date Format -->
    <label class="is_custom_date_format"><?php _e('Date Format', TPB_TEXT_DOMAIN) ?></label>
    <input type="text" name="tpb_post_list_custom_date_format">
    <label class="description is_custom_date_format">
        <?php
            printf(__('See the WordPress date format documentation %1$s here %2$s', TPB_TEXT_DOMAIN),
            '<a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">','</a>');
        ?>
    </label>

    <!-- Display Excerpt -->
    <label><?php _e('Display Excerpt', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_display_excerpt', tpb_select_boolean()); ?>

    <!-- Layout -->
    <label><?php _e('Layout', TPB_TEXT_DOMAIN) ?></label>
    <?php tpb_select_form('tpb_post_list_layout', tpb_select_layout()); ?>
</div>
