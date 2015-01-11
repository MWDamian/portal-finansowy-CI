
$(function() {
 
    var callbackFunction = callback;
    var jsonUrl ='http://jsonrates.com/historical/?from=PLN&to='+chartOptions.content+'&dateStart=2012-01-01&dateEnd='+Helpers.getCurrentDate();

    var test = 'http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?';
     $.ajax({
        url: test,
        type:'POST',
        dataType: 'jsonp',
        success: function(data){
            console.log('test');
            console.log(data);
        }
    });

    $.ajax({
        url: jsonUrl,
        type:'POST',
        dataType: 'jsonp',
        success: function(data){
            console.log(data);

            var rates = [];
            $.each(data.rates, function(index, val) {
                var rate = [];
                rate.push(parseFloat(val.rate));

                date = val.utctime;
                date_js = new Date();
                date = date_js.getTime(date);
                rate.push(date);

                rates.push(rate);
            });

            console.log(rates);
       
            $('.charts-container').highcharts('StockChart', {
                rangeSelector : {
                    selected : 1
                },

                title : {
                    text : 'PLN to '+chartOptions.content
                },

                series : [{
                    name : chartOptions.content,
                    data : rates,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
            }, function(){
                callbackFunction;
            });

        }
    });

    function callback(){
        alert('callback');
    };
})