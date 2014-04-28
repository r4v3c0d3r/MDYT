/**
 * @author Thebys
 */
function refreshGalery() {
	$('.obrazek').fadeOut(1200, function() {
		$("#obsahgalerie").load("../php/galerie.php", function() {
			$('.obrazek').hide().fadeIn(1200);
		});
	});

}


$(document).ready(function() {
	/*$("#obsahgalerie").on('click', '.obrazek', function() {
	 loadShadowBox();
	 alert("Update fire");
	 });
	 $(document.body).on('click', '.galeryoverlay', function() {
	 refreshGalery();
	 });*/
});
