/**
 * @author Thebys
 */
tinymce.init({
	selector : "div.editable",
	language : "cs",
	theme : "modern",
	force_br_newlines : false,
	force_p_newlines : false,
	forced_root_block : '',
	plugins : 'link save',
	add_unload_trigger : false,
	schema : "html5",
	inline : true,
	menubar : false,
	toolbar : "undo redo | link unlink | save",
	statusbar : false,
	save_onsavecallback : function() {
		$.ajax({
			type : "POST",
			url : "saveData.php",
			data : {
				oidname : this.id,
				content : this.getContent()
			}
		}).done(function(msg) {
			//alert("Data Saved: " + msg);
		});
	}
});