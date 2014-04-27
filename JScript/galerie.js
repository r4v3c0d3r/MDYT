/**
 * @author Thebys
 */
$(document).ready(function() {
	$(document.body).on('click', '.galeryoverlay', function() {
		$('.obrazek').fadeOut(1200, function() {
			$("#obsahgalerie").load("../php/galerie.php", function() {
				$('.obrazek').hide().fadeIn(1200);
			});
		});
	});
});
