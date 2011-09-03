jQuery().ready(function($){
	
	//var WebRoot = gdn.definition('WebRoot');
	var handle;
	var tmce = {
		script_url : '/plugins/TinyMCE/vendors/tinymce/tiny_mce.js',
		mode : "none",
		content_css: '/plugins/TinyMCE/desing/content.css',
		convert_urls : false,
		dialog_type : "modal",
		theme : "advanced",
		//plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		plugins : 'preview,fullscreen,table,style,contextmenu,paste,inlinepopups,advimage,advlink',
		theme_advanced_styles : "Information=Info,Paragraph=P",
		theme_advanced_source_editor_wrap : false,
		theme_advanced_buttons1 : "bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,bullist,numlist,blockquote,link,unlink,image,charmap",
		theme_advanced_buttons2 : "code,fullscreen,pastetext,pasteword,tablecontrols,visualaid,styleprops,attribs,cleanup,removeformat,turnoff",
		theme_advanced_buttons3 : '',
		theme_advanced_buttons4 : '',
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		setup: function(ed) {
			ed.addButton('turnoff', {
				title: 'Disable WYSIWYG',
				onclick: ed.hide
			});
		}
	};

	var tooltip = function() {
		if (!handle) handle = $('<div id="hoverbox" style="position:absolute"></div>').appendTo(document.body).hide();
		return handle;
	}
	
	var handlerfadeOut = function() {
		handle.fadeOut('fast');
	}

	var handlerIn = function(e) {
		var self = this;
		var position = $(this).offset();
		var btn = $('<span>WYSIWYG</span>').click(function(){
			var hidden = $(self).attr('aria-hidden');
			if (!hidden) $(self).tinymce(tmce);
			if (hidden == 'true') {
				tinymce.execCommand('mceToggleEditor', false, self.id);
			}
		});
		tooltip().html(btn);
		tooltip().css({
			top: (position.top - tooltip().height() - 10) + "px",
			left: (position.left + $(this).width() - tooltip().width()) + "px"
		});
		tooltip().fadeIn('fast');
	}
	
	var handlerOut = function(e) {
		var h = (typeof(tinymce) == 'undefined' || $(this).tinymce().isHidden());
		if (h) setTimeout(handlerfadeOut, 800);
	}
	
	$('textarea.TextBox').hover(handlerIn, handlerOut);

});

