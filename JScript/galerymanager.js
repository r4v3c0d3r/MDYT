$(document).ready(function() {

	$(':file').change(function() {
		/*
		var formData = new FormData($('form')[0]);

		var file = this.files[0];
		var name = file.name;
		var size = file.size;
		var type = file.type;*/
		//Your validation
	});
	//Now the Ajax submit with the button's click:

	$(':button').click(function() {
		var formData = new FormData($('form')[0]); //formulář, ne input!!!
		$.ajax({
			url : 'php/uploadimages.php', //Server script to process data
			type : 'POST',
			xhr : function() {// Custom XMLHttpRequest
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {// Check if upload property exists
					myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
					// For handling the progress of the upload
				}
				return myXhr;
			},
			//Ajax events
			beforeSend : beforeSendHandler,
			success : completeHandler,
			error : errorHandler,
			// Form data
			data : formData,
			//Options to tell jQuery not to process data or worry about content-type.
			cache : false,
			contentType : false,
			processData : false
		});
	});
	//Now if you want to handle the progress.
function beforeSendHandler(e){}
function completeHandler(e){
	alert(e);
}
function errorHandler(e){
	alert(e);
}
	function progressHandlingFunction(e) {
		if (e.lengthComputable) {
			$('progress').attr({
				value : e.loaded,
				max : e.total
			});
		}
	}

});
