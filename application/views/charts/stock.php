<div class="charts-container"></div>

<script>
	var baseOptions = {
		jsurl: "<?php echo base_url().JS; ?>"
	}
	var chartOptions = {
		type: "<?php echo $type; ?>",
		content: "<?php echo $content; ?>"
	}
</script>


<?php load_js(array(
	'http://code.highcharts.com/stock/highstock.js', 
	'http://code.highcharts.com/stock/modules/exporting.js', 
	'charts/charts.js'
)) ;?>