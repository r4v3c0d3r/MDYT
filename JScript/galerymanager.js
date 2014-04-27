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

function deletePhoto(oid) {
	if (confirm('Opdravdu smazat fotku?')) {
		$.post("spravaGalerie.php", {
			oid : oid,
			operation : "delete"
		}, function(data) {
			$('#spravagalerie').load("../spravaGalerie.php");
		});
	}
}

function updatePhoto(that, oid) {
	var dialog = $(that).next().next();
	if ($(dialog).css("visibility") == "hidden") {
		$(".updatedialog:visible").css("visibility", "hidden");
		$(".updatedialog:visible").prev().prev().css("background-color", "#000");
		dialog.css("visibility", "visible");
		$(that).css("background-color", "#0c0");
	} else {
		dialog.css("visibility", "hidden");
		$(that).css("background-color", "#000");
	}

	/*if (confirm('Opdravdu upravit?')) {
	 $.post("spravaGalerie.php", {
	 oid : oid,
	 operation : "update"
	 }, function(data) {
	 alert(data);
	 });
	 }*/
}

function getFormIndex(that) {
	//přemapuje gid na fid :)
	//hledá do kterýho divu správaalba tohle talčítko patří, protože je to důležitý.
	return $(that).parent().parent().parent().index();
}


$(document).ready(function() {
	$(document.body).on('click', "[id^=EDIT]", function(event) {
		updatePhoto(this, $(this).data('oid'));

	});
	$(document.body).on('click', "[id^=DELETE]", function(event) {
		deletePhoto($(this).data('oid'));
	});

	$(document.body).on('change', ':file', function() {
		//Případná validace
	});
	$(document.body).on('click', ':button', function() {//bude asi potřeba relativizovat selekci, aby fungoval uploader u každý galerie...

		var xhr = new XMLHttpRequest();
		xhr.upload.addEventListener("progress", progressHandlingFunction, false);
		xhr.upload.addEventListener("load", completeHandler, false);
		var activeFormIndex = getFormIndex(this) - 1;
		var gid = $(this).attr("id");
		var formData = new FormData();
		formData.append('gid', gid);
		//alert("AFI: "+activeFormIndex+" --- GID: "+gid);
		//může být nutná lepší selekce - $(this).attr('gid')

		var files = $(".fileinput")[activeFormIndex].files;
		//možná budeme muset lépe selektovat soubory... z jiných formulářů... tohle by mohlo zabrat
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
		//upload success
		//refresh galery manager maybe album would be sufficient? :P
		alert("Upload dokončen.");
		setTimeout(function() {
			$('#spravagalerie').load("../spravaGalerie.php");
		}, 200);
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
