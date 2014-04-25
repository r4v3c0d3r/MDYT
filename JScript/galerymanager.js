function uploadFiles() {
	var xhr = new XMLHttpRequest();
	function progressListener(e) {
		console.log("progressListener: ", e);
		if (e.lengthComputable) {
			var percentage = Math.round((e.loaded * 100) / e.total);
			progressBar(percentage);
			console.log("Percentage loaded: ", percentage);
		}
	};
	function finishUpload(e) {
		progressBar(100);
		console.log("Finished Percentage loaded: 100");
	};
	// XHR2 has an upload property with a 'progress' event
	xhr.upload.addEventListener("progress", progressListener, false);
	// XHR2 has an upload property with a 'load' event
	xhr.upload.addEventListener("load", finishUpload, false);
	// Begin uploading of file
	xhr.open("POST", "upload.php");
	xhr.onreadystatechange = function() {
		console.info("readyState: ", this.readyState);
		if (this.readyState == 4) {
			if ((this.status >= 200 && this.status < 300) || this.status == 304) {
				if (this.responseText != "") {
					alert(xhr.responseText);
				}
			}
		}
	};
	xhr.send(formdata);
}


$(document).ready(function() {
	$(':file').change(function() {
		//Případná validace
	});
	$(':button').click(function() {//bude asi potřeba relativizovat selekci, aby fungoval uploader u každý galerie...
		var xhr = new XMLHttpRequest();
		xhr.upload.addEventListener("progress", progressHandlingFunction, false);
		xhr.upload.addEventListener("load", completeHandler, false);

		var formData = new FormData();
		formData.append('gid', $("input[name='gid']").val());
		//může být nutná lepší selekce

		var files = $("#fileinput")[0].files;
		//možná budeme muset lépe selektovat soubory...
		$(files).each(function() {
			formData.append('files[]', this);
			//files[] zařizuje, že to bude pole
		});
		xhr.open("POST", "php/uploadimages.php");
		//URL skriptu
		xhr.onreadystatechange = function() {
			console.info("readyState: ", this.readyState);
			if (this.readyState == 4) {
				if ((this.status >= 200 && this.status < 300) || this.status == 304) {
					if (this.responseText != "") {
						alert(xhr.responseText);
					}
				}
			}
		};
		xhr.send(formData);
	});
	//Now if you want to handle the progress.
	function beforeSendHandler(xhr) {
		xhr.setRequestHeader('Content-Type', 'multipart/form-data');
	}

	function completeHandler(e) {
		alert("upload succes, update");
		$('#spravagalerie').load("../spravaGalerie.php");
	}

	function errorHandler(e) {
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
