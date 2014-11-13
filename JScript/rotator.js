/**
 * @author Thebys
 */
/**
 * Trigery a ovládání content rotátoru, nezávislý na počtu prvků ;)
 * DŮLEŽITÝ JE VĚDĚT, že jeden slajd jsou dva indexy, protože radiobutton+labbel jsou dva objekty DOM
 * TODO: vyfiltrovat pouze typ input name slide a odstranit debilní dvojky.
 */

function prevSlide() {
	var selected = $('input[name=slide]:checked').index();
	var indexToSelect = parseFloat(selected) - 2;
	if (indexToSelect == -2) {
		var lastRB = $('input[name=slide]').last().index();
		$("#sliderControl :eq(" + lastRB + ")").prop("checked", true);
	} else {
		$("#sliderControl :eq(" + indexToSelect + ")").prop("checked", true);
	}
}

function nextSlide() {
	var selected = $('input[name=slide]:checked').index();
	var indexToSelect = parseFloat(selected) + 2;
	var SlideCount = $('input[name=slide]').length;
	/*musí zjistit kolik je slajdů, aby to vyhodnotilo, jestli už je to na konci*/
	if (indexToSelect == SlideCount * 2) {
		var firstRB = $('input[name=slide]').first().index();
		$("#sliderControl :eq(" + firstRB + ")").prop("checked", true);
	} else {
		$("#sliderControl :eq(" + indexToSelect + ")").prop("checked", true);
	}
}

$(document).ready(function() {
var intervalID = setInterval(function(){nextSlide();}, 10000);
	$("#leftarrow").click(function() {
		/*šipka doleva, buď posune doleva, nebo ze začátku na konec*/
		prevSlide();
	});

	$("#rightarrow").click(function() {
		/*šiúka doprava, buď posune doprava, nebo z konce na začátek*/
		nextSlide();
	});
});

