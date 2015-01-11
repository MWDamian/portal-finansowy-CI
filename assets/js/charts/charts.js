var globalChartsrArray = [];
function Chart (type, content) {
    Chart.numInstances = (Chart.numInstances || 0) + 1;

    this.id = Chart.numInstances;
    this.type = type;
    this.content = content;

    globalChartsrArray.push(this); 
}

Chart.prototype = {
    constructor: Chart,

    getChartById: function(id){
        var searchingChart;
        $.each(globalChartsArray, function(index, value){
            if(value.id == id){
                searchingChart = value;
                return false;
            }
        })
        return searchingChart;
    },
    initChart: function(chart){
        switch(chart.type){
            case 'currency':
                $.getScript(baseOptions.jsurl+'charts/'+chart.type+'.js',function(){
                    alert('loaded');
                })
            break;
        }
    }
}
var Helpers = {
    getCurrentDate: function(format){
        var date = new Date();
        var dd = date.getDate();
        var mm = date.getMonth()+1;
        var yyyy = date.getFullYear();

        if(format == "UTC"){
            today = [yyyy, mm, dd];
        }else{
            

            if(dd<10) {
                dd='0'+dd
            } 

            if(mm<10) {
                mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
        }
        return today;
    }
}
$(function() {
    chart1 = new Chart(chartOptions.type, chartOptions.content);
    Chart.prototype.initChart(chart1);
});