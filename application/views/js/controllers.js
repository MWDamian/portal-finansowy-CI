
function showView(view){
	$('nav.aside li').removeClass('active');
	$('nav.aside li[data-view="'+view+'"]').addClass('active');

	if($('.container').children('section:visible').length){
		$('.container').children('section:visible').fadeOut('fast', function() {
			$('.container').children('section[data-view="'+view+'"]').fadeIn('fast');
			var functionName = 'showView_'+view;

			var fn = window[functionName];
			if(typeof fn === 'function') {
			    fn();
			}
		});
	}else{
		$('.container').find('section[data-view="'+view+'"]').fadeIn('fast');
		var functionName = 'showView_'+view;

		var fn = window[functionName];
		if(typeof fn === 'function') {
		    fn();
		}
	}
}


function showView_currencies_list(){
	$(function() {
		window.spinnerPrepend();
		printCurrenciesGallery(function(){
			window.spinnerRemove();
		});
	})

	/**
	 * Funkcja, która zwraca html z gotową listą walut wraz z ich dzisiejszymi kursami
	 *
	 *
	 * DANE WEJŚĆIOWE:
	 *      @param jQuery object {appendElement} - obiekt jQuery z elementem do którego ma zostać dodoany html
	 *      
	 * DANE WYJŚCIOWE:
	 *		brak {null}
	 * 		(zostanie wygenerowany kod html i doday do {appendElement})
	 *      
	*/
	function printCurrenciesGallery(callback){
		window.sendApiQuery('getAllCurrenciesToday','',function(response){
			var html = '';
			html += '<h3 class="date">Kurs za dzień: '+response.date+'</h3>';
			html += '<ul class="list-currencies">';

			$.each(response.currencies, function(index, el){
				html += '<li data-currency-name="'+index+'">';
				html += '<h3>'+index+'</h3>';
				html += '<p>'+el.rate+'</p>';
				html += '</li>';
			})

			html += '</ul>';
			$('.container').children('section[data-view="currencies_list"]').find('.currencies-gallery').empty().append(html);
			callback();
		})
	}
}

