;(function($) {
	// post list

	// Featured post list
	tpb_post_slider_open = function(data) {
	    var container = '#post_slider.component-data-form' + ' ';

	    // reset data if data is empty
	    if(jQuery.isEmptyObject(data.data)) {
	        jQuery(container + 'input[type="text"]').val("");
	        jQuery(container + '.tpb_post_slider_auto_slide').val("0");
	        jQuery(container + 'select').each(function(){
	            jQuery(this)[0].selectedIndex = 0;
	        });

	        // select2 set to empty
	        jQuery(container + 'select[name="tpb_post_slider_terms"]').val('').trigger('change');

	        // others
	        jQuery(container + 'select2').trigger('change');
	        // tpb_post_slider_title_ace_editor.getSession().setValue('', 1);
	        // tpb_post_slider_subtitle_ace_editor.getSession().setValue('', 1);
	    }
	    else {
	        var saveData = data.data;
	        // post type
	        jQuery(container + 'select[name="tpb_post_slider_post_type"]')
	            .val(saveData.post_type)
	            .trigger('change');;

	        // terms
	        jQuery(container + 'select[name="tpb_post_slider_terms"]')
	            .val(saveData.original.terms)
	            .trigger('change');

	        jQuery(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').val(saveData.display_child_taxonomy);
	        jQuery(container + 'select[name="tpb_post_slider_post_number"]').val(saveData.post_number);
	        jQuery(container + 'select[name="tpb_post_slider_auto_slide"]').val(saveData.auto_slide);
	        jQuery(container + 'select[name="tpb_post_slider_order_by"]').val(saveData.order_by);
	        jQuery(container + 'select[name="tpb_post_slider_order"]').val(saveData.order);
	        jQuery(container + 'input[name="tpb_post_slider_custom_date_format"]').val(saveData.custom_date_format);
	        jQuery(container + 'select[name="tpb_post_slider_advanced_query"]').val(saveData.advanced_query);
	        jQuery(container + 'select[name="template_style"]').val(saveData.template_style);

	        // others
	        // tpb_post_slider_title_ace_editor.getSession().setValue(saveData.original.title, 1);
	        // tpb_post_slider_subtitle_ace_editor.getSession().setValue(saveData.original.subtitle, 1);

	        // behaviours
	        if(saveData.advanced_query == 1) {
	            jQuery(container + '.advanced_query').show();
	            jQuery(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').show();
	        }
	        else {
	            jQuery(container + '.advanced_query').hide();
	            jQuery(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').hide();
	        }

	        if(saveData.original.is_custom_date_format == '1') {
	            jQuery(container + '.is_custom_date_format').show();
	            jQuery(container + 'input[name="tpb_post_slider_custom_date_format"]').show();
	        }
	        else {
	            jQuery(container + '.is_custom_date_format').hide();
	            jQuery(container + 'input[name="tpb_post_slider_custom_date_format"]').hide();
	        }
	    }
	}
	tpb_post_slider_save = function(data) {
	    var container = '#post_slider.component-data-form' + ' ';
	    var saveData = {};

	    var terms = jQuery(container + 'select[name="tpb_post_slider_terms"]').val();
	    var advanced_query = jQuery(container + 'select[name="tpb_post_slider_advanced_query"]').val();
	        advanced_query = parseInt(advanced_query);

	    if(advanced_query == 1 && !jQuery.isEmptyObject(terms)) {
	        var taxonomy = {};

	        for (var i = terms.length - 1; i >= 0; i--) {
	            var arr_split = terms[i].split("::");

	            if(typeof(taxonomy[arr_split[0]]) === 'undefined') {
	                taxonomy[arr_split[0]] = [arr_split[1]];
	            }
	            else {
	                taxonomy[arr_split[0]].push(arr_split[1]);
	            }
	        }
	    }
	    else {
	        terms = [];
	        taxonomy = {};
	    }

	    // saveData
	    saveData.title = jQuery(container + 'textarea[name="tpb_post_slider_title"]').val();
	    saveData.subtitle = jQuery(container + 'textarea[name="tpb_post_slider_subtitle"]').val();
	    saveData.advanced_query = advanced_query;
	    saveData.post_type = jQuery(container + 'select[name="tpb_post_slider_post_type"]').val();
	    saveData.taxonomy = taxonomy;
	    saveData.display_child_taxonomy = jQuery(container + 'select[name="tpb_post_slider_display_child_taxonomy"]').val();
	    saveData.post_number = jQuery(container + 'select[name="tpb_post_slider_post_number"]').val();
	    saveData.auto_slide = jQuery(container + 'select[name="tpb_post_slider_auto_slide"]').val();
	    saveData.order_by = jQuery(container + 'select[name="tpb_post_slider_order_by"]').val();
	    saveData.order = jQuery(container + 'select[name="tpb_post_slider_order"]').val();
	    saveData.custom_date_format = jQuery(container + 'input[name="tpb_post_slider_custom_date_format"]').val();
	    saveData.template_style = jQuery(container + 'select[name="template_style"]').val();

	    // the original
	    saveData.original = {};
	    saveData.original.title = saveData.title;
	    saveData.original.subtitle = saveData.subtitle;
	    saveData.original.terms = terms;

	    // manipulating
	    saveData.title = isHTML_m(saveData.title) ? saveData.title : wrap_m(saveData.title, 'h2');
	    saveData.subtitle = isHTML_m(saveData.subtitle) ? saveData.subtitle : wrap_m(saveData.subtitle, 'p', 'tpb-subtitle');
	    saveData.display_child_taxonomy = parseInt(saveData.display_child_taxonomy);

	    if(saveData.original.is_custom_date_format == '0') {
	        saveData.custom_date_format = '';
	    }

	    // console.log(saveData);

	    data.data = saveData;
	}

	// RSS feed
	tpb_rss_feed_open = function(data) {
	    var container = '#rss_feed.component-data-form' + ' ';

	    // reset data if data is empty
	    if(jQuery.isEmptyObject(data.data)) {
	        jQuery(container + 'input[type="text"]').val("");
	        jQuery(container + 'input[name="tpb_rss_feed_title"]').val("RSS Feed");
	        jQuery(container + 'select[name="tpb_rss_feed_count"]').val(4);
	    }
	    else {
	        var saveData = data.data;
	        jQuery(container + 'input[name="tpb_rss_feed_title"]').val(saveData.title);
	        jQuery(container + 'input[name="tpb_rss_feed_url"]').val(saveData.rss_feed_url);
	        jQuery(container + 'select[name="tpb_rss_feed_count"]').val(saveData.rss_feed_count);
	    }
	}
	tpb_rss_feed_save = function(data) {
	    var container = '#rss_feed.component-data-form' + ' ';
	    var saveData = {};

	    // saveData
	    saveData.title = jQuery(container + 'input[name="tpb_rss_feed_title"]').val();
	    saveData.rss_feed_url = jQuery(container + 'input[name="tpb_rss_feed_url"]').val();
	    saveData.rss_feed_count = jQuery(container + 'select[name="tpb_rss_feed_count"]').val();

	    // console.log(saveData);

	    data.data = saveData;
	}

	// check isHTML_m
	function isHTML_m(str) {
	    var a = document.createElement('div');
	    a.innerHTML = str;
	    for (var c = a.childNodes, i = c.length; i--; ) {
	        if (c[i].nodeType == 1) return true;
	    }
	    return false;
	}

	// wrap html
	function wrap_m(string, tag, classAttr) {
	    var addClassAttr = '';

	    if(classAttr) {
	        addClassAttr = " class='" + classAttr + "'";
	    }

	    if(string == '')
	        return '';
	    else
	        return '<' + tag + addClassAttr + '>' + string + '</' + tag + '>';
	}

	// check isHTML
	function isHTML(str) {
	    var a = document.createElement('div');
	    a.innerHTML = str;
	    for (var c = a.childNodes, i = c.length; i--; ) {
	        if (c[i].nodeType == 1) return true;
	    }
	    return false;
	}

	// wrap html
	function wrap(string, tag, classAttr) {
		var addClassAttr = '';

		if(classAttr) {
			addClassAttr = " class='" + classAttr + "'";
		}

		if(string == '')
			return '';
		else
			return '<' + tag + addClassAttr + '>' + string + '</' + tag + '>';
	}

	tpb_icon_open = function(data){
	    var container = '#icon.component-data-form' + ' ';

	    // reset data if data is empty
	    if($.isEmptyObject(data.data)) {
	        $(container + 'select').each(function(){
	            $(this)[0].selectedIndex = 0;
	        });

	        // others
	        tpb_icon_title_ace_editor.getSession().setValue('', 1);
	        tpb_icon_content_ace_editor.getSession().setValue('', 1);

	        $(container + '.tpb_icon_icon').select2("val", 'glyphicon glyphicon-asterisk');
	    }
	    else {
	        var saveData = data.data;

	        $(container + 'select[name="tpb_icon_icon"]').val(saveData.icon);

	        // others
	        tpb_icon_title_ace_editor.getSession().setValue(saveData.original.title, 1);
	        tpb_icon_content_ace_editor.getSession().setValue(saveData.content, 1);

	        $(container + '.tpb_icon_icon').select2("val", saveData.icon);
	        $(container + 'select[name="template_style"]').val(saveData.template_style);
	        $(container + 'input[name="tpb_icon_url"]').val(saveData.url);
	        $(container + 'input[name="tpb_icon_button"]').val(saveData.button);
	    }
	}
	tpb_icon_save = function(data){
	    var container = '#icon.component-data-form' + ' ';
	    var saveData = {};

	    saveData.title = $(container + 'textarea[name="tpb_icon_title"]').val();
	    saveData.content = $(container + 'textarea[name="tpb_icon_content"]').val();
	    saveData.url = $(container + 'input[name="tpb_icon_url"]').val();
	    saveData.button = $(container + 'input[name="tpb_icon_button"]').val();
	    saveData.icon = $(container + 'select[name="tpb_icon_icon"]').val();
	    saveData.template_style = $(container + 'select[name="template_style"]').val();

	    // the original
	    saveData.original = {};
	    saveData.original.title = saveData.title;

	    // manipulating
	    saveData.title = isHTML(saveData.title) ? saveData.title : wrap(saveData.title, 'h2');

	    data.data = saveData;
	}

	// icon font awesome
	tpb_icon_fa_open = function(data){
		var container = '#icon_fa.component-data-form' + ' ';

		// reset data if data is empty
		if($.isEmptyObject(data.data)) {
			$(container + 'select').each(function(){
				$(this)[0].selectedIndex = 0;
			});

			// others
			tpb_icon_fa_title_ace_editor.getSession().setValue('', 1);
			tpb_icon_fa_content_ace_editor.getSession().setValue('', 1);

			$(container + '.tpb_icon_fa_icon').select2("val", 'fa fa-500px');
		}
		else {
			var saveData = data.data;

			$(container + 'select[name="tpb_icon_fa_icon"]').val(saveData.icon);

			// others
			tpb_icon_fa_title_ace_editor.getSession().setValue(saveData.original.title, 1);
			tpb_icon_fa_content_ace_editor.getSession().setValue(saveData.content, 1);

			$(container + '.tpb_icon_fa_icon').select2("val", saveData.icon);
			$(container + 'select[name="template_style"]').val(saveData.template_style);
			$(container + 'input[name="tpb_icon_fa_url"]').val(saveData.url);
			$(container + 'input[name="tpb_icon_fa_button"]').val(saveData.button);
		}
	}
	tpb_icon_fa_save = function(data){
		var container = '#icon_fa.component-data-form' + ' ';
		var saveData = {};

		saveData.title = $(container + 'textarea[name="tpb_icon_fa_title"]').val();
		saveData.content = $(container + 'textarea[name="tpb_icon_fa_content"]').val();
		saveData.icon = $(container + 'select[name="tpb_icon_fa_icon"]').val();
		saveData.template_style = $(container + 'select[name="template_style"]').val();
		saveData.url = $(container + 'input[name="tpb_icon_fa_url"]').val();
		saveData.button = $(container + 'input[name="tpb_icon_fa_button"]').val();

		// the original
		saveData.original = {};
		saveData.original.title = saveData.title;

		// manipulating
		saveData.title = isHTML(saveData.title) ? saveData.title : wrap(saveData.title, 'h2');

		data.data = saveData;
	}

	// image icon
	tpb_image_icon_open = function(data) {
		var container = '#image_icon.component-data-form' + ' ';

		// reset data if data is empty
		if($.isEmptyObject(data.data)) {
			$(container + 'input[type="text"]').val("");
			$(container + 'input[type="number"]').val("");
			$(container + 'input[type="hidden"]').val("");
			$(container + 'select').each(function(){
				$(this)[0].selectedIndex = 0;
			});
			$('.image-preview').html('');

			// others
			tpb_image_icon_title_ace_editor.getSession().setValue('', 1);
			tpb_image_icon_subtitle_ace_editor.getSession().setValue('', 1);
			tpb_image_icon_content_ace_editor.getSession().setValue('', 1);
			$(container + '.tpb-image-lib-container').removeClass('has-image');
		}
		else {
			var saveData = data.data;

			$(container + 'input[name="tpb_image_icon_image"]').val(saveData.image_id);
			$(container + 'input[name="tpb_image_icon_url"]').val(saveData.url);
			$(container + 'select[name="template_style"]').val(saveData.template_style);

			// image preview
			if(saveData.image_id != '' && saveData.image_id != null && !isNaN(saveData.image_id)) {
				$(container + '.tpb-image-lib-container').addClass('has-image');
			}
			else {
				$(container + '.tpb-image-lib-container').removeClass('has-image');
			}

			// others
			tpb_image_icon_title_ace_editor.getSession().setValue(saveData.original.title, 1);
			tpb_image_icon_content_ace_editor.getSession().setValue(saveData.content, 1);
			$(container + ' .tpb_image_icon_image_preview').html(saveData.original.image_html)
		}
	}
	tpb_image_icon_save = function(data) {
		var container = '#image_icon.component-data-form' + ' ';
		var saveData = {};

		saveData.title = $(container + 'textarea[name="tpb_image_icon_title"]').val();
		saveData.content = $(container + 'textarea[name="tpb_image_icon_content"]').val();
		saveData.image_id = $(container + 'input[name="tpb_image_icon_image"]').val();
		saveData.url = $(container + 'input[name="tpb_image_icon_url"]').val();
		saveData.template_style = $(container + 'select[name="template_style"]').val();

		// the original
		saveData.original = {};
		saveData.original.title = saveData.title;
		saveData.original.image_html = $(container + ' .tpb_image_icon_image_preview').html()

		// manipulating
		saveData.image_id = parseInt(saveData.image_id);
		saveData.title = isHTML(saveData.title) ? saveData.title : wrap(saveData.title, 'h2');
		saveData.image_url = '';

		if(! isNaN(saveData.image_id) && saveData.image_id > 0) {
			var ajax_data = {
				action: 'tpb_get_image_size',
				id: saveData.image_id,
				size: saveData.image_size
			}

			$.post(ajaxurl, ajax_data, function(response){
				saveData.image_url = response;

				// manual update data because of ajax delay
				data.data = saveData;
				updateTpbData();
			});
		}

		data.data = saveData;
	}

})(jQuery);