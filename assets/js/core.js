/**
*
*
* Główny plik skryptów sterujący portalem
* 
*
*/



$(function() {



    // The Receiver Function
    function receiver(update) { console.log(update) }

	if(!$('.container').children('section:visible').length){
		var view = $('nav.aside li').first().data('view');
		showView(view)
	}

	$('nav.aside li, .button[data-view]').click(function(){
		var view = $(this).data('view');
		showView(view);
	});


	// akcja po kliknięciu w element listy walut
	// generowanie wykresu obszarowego
	// $('body').delegate('.currencies-gallery li', 'click', function(){
	// 	window.spinnerPrepend();

	// 	currency = $(this).data('currency-name');
	// 	var data = {};
	// 	data.currency = currency;
	// 	window.sendApiQuery('getCurrencyFullDate' ,data ,function(response){
	// 		$('.currencies-gallery').slideUp(200,function(){

	// 			var data = {};
	// 			data.series = {};
	// 			data.series.data = response.values;
	// 			data.series.startDate = response.startDate;
	// 			data.series.daysAmount = response.daysAmount;
	// 			data.series.labelTitle = ' EUR to '+currency;

	// 			window.generateChart('Line', $('.currencies .chart_container').find('.chart'), data, function(){
	// 				$('.chart_container').slideDown(200, function(){
	// 					window.spinnerRemove();
	// 				})
	// 			});
	// 		});
	// 	})
	// })



	// window.spinnerPrepend($('.stocksymbols-gallery'));
	// window.printStockCategoriesGallery($('.section-main.stock .stockcategories-gallery'), function(){
	// 	window.spinnerRemove($('.stocksymbols-gallery'));
	// });

	// akcja po kliknięciu w element listy walut
	// generowanie wykresu obszarowego
	


	// $('body').delegate('.stock .tab h3', 'click', function(){
	// 	$(this).closest('.tab').find('.stockcategories-gallery').slideDown('fast');
	// })
	// $('body').delegate('.stockcategories-gallery li', 'click', function(){

	// 	$('.stockcategories-gallery').slideUp('fast',function(){
	// 		$('.stocksymbols-gallery').slideDown('fast');
	// 	})

	// 	var data = {};
	// 	data.category = $(this).text();
	// 	containerElement = $('.stocksymbols-gallery');

	// 	window.printStockSymbolsGallery($('.section-main.stock .stocksymbols-gallery'), data, function(){
	// 		window.spinnerRemove($('.stocksymbols-gallery'));
	// 	});
	// })


	$('.levelUp').on('click', function(){
		window.toUpperLevel(this);
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
function printStockCategoriesGallery(appendElement, callback){
	appendElement.empty();
	window.sendApiQuery('getStockCategories','',function(response){
		var html = '';
		html += '<ul class="list-stocksymbols">';
		$.each(response, function(index, el){

			html += '<li data-symbol-name="'+index+'">';
			html += '<h3 class="long">'+el+'</h3>';
			html += '</li>';
		})
		html += '</ul>';
		appendElement.append(html);
		callback();
	})
}
function printStockSymbolsGallery(appendElement, category, callback){
	appendElement.empty();

	var data = {};
	data.category = category;

	window.sendApiQuery('getStockCompanyNames', data, function(response){
		var html = '';
		html += '<ul class="list-stocksymbols">';
		$.each(response, function(index, el){

			html += '<li data-symbol-name="'+index+'">';
			html += '<h3 class="long">'+el.symbol+'</h3>';
			html += '<p>'+el.companyName+'</p>';
			html += '</li>';
		})
		html += '</ul>';
		appendElement.append(html);
		callback();
	})
}

/**
 * Funkcja, która wysyła domyśłne zapytania do api
 *
 *
 * DANE WEJŚĆIOWE:
 *      @param string {action} - funkcja do wywołania w api
 *		@param array {data} - dane do przekazania do api 	//opcjonalny
 *		@param functon {callback} - funkcja do wywołania  	//opcjonalny
 *    
 * DANE WYJŚCIOWE:
 *		brak {null}
 * 		(zostanie wywołania funkcja {callback} jeśli została zdefiniowania)
 *      
*/
function sendApiQuery(action, data, callback){
	$.ajax({
        url: 'api/index.php?action='+action,
        type: "POST",
        data: {
            data: data
        },
        success: function(response){
        	callback(response);
        	console.log(response);
        }
    });
}

