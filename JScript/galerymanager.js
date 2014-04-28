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
}

function updateSave(that, obroid) {
	var nadpis = $(that).prev().prev().val();
	var podnadpis = $(that).prev().val();
	$.post("spravaGalerie.php", {
		oid : obroid,
		novyNadpis : nadpis,
		novyPodNadpis : podnadpis,
		operation : "UpdateCaps"
	}, function(data) {
		//affirmation close :)
		var dialog = $(that).parent().parent();
		if ($(dialog).css("visibility") == "visible") {
			$(".updatedialog:visible").css("visibility", "hidden");
			$(".yellow").css("background-color", "#000");
		}
		//data jsou to co vrátí script, užitečnej debug
		//alert("Uloženo. MSG: "+data);
	});
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
	$(document.body).on('click', "[name=updateSave]", function(event) {
		updateSave(this, $(this).attr('id'));

	});
	$(document.body).on('click', "[id^=DELETE]", function(event) {
		deletePhoto($(this).data('oid'));
	});

	$(document.body).on('change', ':file', function() {
		//Případná validace
	});
	$(document.body).on('click', '[name="uploadbutton"]', function() {//bude asi potřeba relativizovat selekci, aby fungoval uploader u každý galerie...

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
		refreshGaleryManager(e);
	}

	function errorHandler(e) {
		alert(e);
	}

	function deletePhoto(oid) {
		if (confirm('Opdravdu smazat fotku?')) {
			$.post("spravaGalerie.php", {
				oid : oid,
				operation : "delete"
			}, function(data) {
				refreshGaleryManager();
				//$('#spravagalerie').load("../spravaGalerie.php");
			});
		}
	}

	function refreshGaleryManager(that) {
		$(".newimage").each(function() {
			$(this).load("../php/addimage.php", {
				gid : $(this).parent().attr("id"),
				operace : "reloadform"
			});
		});
		setTimeout(function() {
			$(".thumbs").each(function() {
				$(this).load("../php/viewthumbs.php", {
					gid : $(this).attr("id"),
					operace : "reload"
				});
			});
			//DEPRECTED RELOAD WHOLE SECTION FUCKS UP TINYMCE ->UNINITABLE
			//$('#spravagalerie').load("../spravaGalerie.php");
		}, 1200);
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
