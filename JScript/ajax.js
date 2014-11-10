function loadTinyMCE() {
	window.tinymce.dom.Event.domLoaded = true;
	tinymce.init({
		selector : ".editable",
		language : "cs",
		theme : "modern",
		force_br_newlines : false,
		force_p_newlines : false,
		forced_root_block : '',
		plugins : 'link save code',
		add_unload_trigger : false,
		schema : "html5",
		inline : true,
		menubar : false,
		toolbar : "undo redo | styleselect | link unlink | code | save",
		statusbar : true,
		content_css : "CSS/mdyt.css",
		style_formats : [{
			title : 'Normální text',
			block : 'p'
		}, {
			title : 'Tučný text',
			inline : 'b',
		}, {
			title : 'Nadpis 1',
			block : 'h1'
		}, {
			title : 'Nadpis 2',
			block : 'h2'
		}, {
			title : 'Nadpis 3',
			block : 'h3'
		}],
		save_onsavecallback : function() {
			$.ajax({
				type : "POST",
				url : "saveData.php",
				data : {
					oidname : this.id,
					content : this.getContent()
				}
			}).done(function(msg) {
				//REINIT IMPOSIBRU
				//alert("Data Saved: " + msg);
			});
		}
	});
}


$(document).ready(function() {
	loadTinyMCE();
});
