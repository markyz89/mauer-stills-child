(function ($) {


"use strict";


function mauerStillsSchemesPreloader() {

	var themeUrl = mauerAdminScriptsTranslationObject.themeUrl;

	$.getJSON(themeUrl + "/js/precookedColorAndFontSchemes.json", function(data) {
		var schemes = data;

		// Fonts schemes preloader

		$(".mauer-load-typography-scheme").on("click", function() {
			if (!confirm(mauerAdminScriptsTranslationObject.message1)) {
				return;
			} else {

				if ($(this).hasClass('scheme-1')) {var schemeToUse = schemes.font_scheme_1;}
				else if ($(this).hasClass('scheme-2')) {var schemeToUse = schemes.font_scheme_2;}
				else if ($(this).hasClass('scheme-3')) {var schemeToUse = schemes.font_scheme_3;}
				else if ($(this).hasClass('scheme-4')) {var schemeToUse = schemes.font_scheme_4;}

				for (var inputFieldName in schemeToUse) {
					if (schemeToUse.hasOwnProperty(inputFieldName)) {
						if ($('[data-name="' + inputFieldName + '"] select').length) {
							$('[data-name="' + inputFieldName + '"] select').val(schemeToUse[inputFieldName]).trigger('change');
						}
						else if ($('[data-name="' + inputFieldName + '"] input').length) {
							$('[data-name="' + inputFieldName + '"] input').val(schemeToUse[inputFieldName]);
						}
					}
				}

			}
		});


		// Color schemes preloader

		$(".mauer-load-color-scheme").on("click", function() {
			if (!confirm(mauerAdminScriptsTranslationObject.message2)) {
				return;
			} else {

			if ($(this).hasClass('scheme-1')) {var schemeToUse = schemes.color_scheme_1;}
			else if ($(this).hasClass('scheme-2')) {var schemeToUse = schemes.color_scheme_2;}
			else if ($(this).hasClass('scheme-3')) {var schemeToUse = schemes.color_scheme_3;}

				for (var inputFieldName in schemeToUse) {
					if (schemeToUse.hasOwnProperty(inputFieldName)) {
						if ($('[data-name="' + inputFieldName + '"] select').length) {
							$('[data-name="' + inputFieldName + '"] select').val(schemeToUse[inputFieldName]).trigger('change');
						}
						else if ($('[data-name="' + inputFieldName + '"] input').length) {
							$('[data-name="' + inputFieldName + '"] input[type="text"]').val(schemeToUse[inputFieldName]).trigger('change');
							if (schemeToUse[inputFieldName] == '1') {
								$('[data-name="' + inputFieldName + '"] input[type="checkbox"]').prop('checked', true).trigger('change');
							}
							else if (schemeToUse[inputFieldName] == '0') {
								$('[data-name="' + inputFieldName + '"] input[type="checkbox"]').prop('checked', false).trigger('change');
							}
						}
					}
				}

			}
		});


	});

}




$(document).ready(function() {
	mauerStillsSchemesPreloader();
});


})(jQuery);