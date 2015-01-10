function generateChart(type, target, data, callback){
    
    window['generate'+type+'Chart'](target, data, callback());
}

function generateLineChart(target, data, callback){
    // var callbackFunction = callback;
    // var dataArray = $.map(data.series.data, function(el) { return parseFloat(el); });

    // console.log(dataArray);

    // target.highcharts({
    //     chart: {
    //         typr: 'area',
    //         zoomType: 'x'
    //     },
    //     title: {
    //         text: data.title
    //     },
    //     subtitle: {
    //         text: document.ontouchstart === undefined ?
    //                 'Klkinij i przeciągnij, aby wybrać okres' :
    //                 'Przeciągnij, aby wybrać okres'
    //     },
    //     xAxis: {
    //         type: 'datetime'
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Kurs waluty'
    //         }
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     plotOptions: {
    //         area: {
    //             pointStart: 1940,
    //             fillColor: {
    //                 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
    //                 stops: [
    //                     [0, Highcharts.getOptions().colors[0]],
    //                     [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
    //                 ]
    //             },
    //             marker: {
    //                 radius: 2
    //             },
    //             lineWidth: 1,
    //             states: {
    //                 hover: {
    //                     lineWidth: 1
    //                 }
    //             },
    //             threshold: null
    //         }
    //     },

    //     series: [{
    //         type: 'area',
    //         name: data.series.labelTitle,
    //         pointInterval: 24 * 3600 * 1000,
    //         pointStart: Date.parse(data.series.startDate),
    //         data: dataArray
    //     }]
    // }, function(){
    //     callbackFunction;
    // });

    var callbackFunction = callback;
    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {
        console.log(target);

        // Create the chart
        target.highcharts('StockChart', {

            rangeSelector: {
                selected: 1
            },

            title: {
                text: 'USD to EUR exchange rate'
            },

            yAxis: {
                title: {
                    text: 'Exchange rate'
                }
            },

            series: [{
                name: 'USD to EUR',
                data: data,
                id: 'dataseries',
                tooltip: {
                    valueDecimals: 4
                }
            }, {
                type: 'flags',
                name: 'Flags on series',
                data: [{
                    x: Date.UTC(2011, 1, 22),
                    title: 'On series'
                }, {
                    x: Date.UTC(2011, 3, 28),
                    title: 'On series'
                }],
                onSeries: 'dataseries',
                shape: 'squarepin'
            }, {
                type: 'flags',
                name: 'Flags on axis',
                data: [{
                    x: Date.UTC(2011, 2, 1),
                    title: 'On axis'
                }, {
                    x: Date.UTC(2011, 3, 1),
                    title: 'On axis'
                }],
                shape: 'squarepin'
            }]
        }, function(){
            callbackFunction;
        });
    });
};



function daysBetween(first, second) {

    // Copy date parts of the timestamps, discarding the time parts.
    var one = new Date(first.getFullYear(), first.getMonth(), first.getDate());
    var two = new Date(second.getFullYear(), second.getMonth(), second.getDate());

    // Do the math.
    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween = two.getTime() - one.getTime();
    var days = millisBetween / millisecondsPerDay;

    // Round down.
    return Math.floor(days);
}