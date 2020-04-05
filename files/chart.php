<div class="row" style="min-height:730px;">
	<div class="no-padding col-lg-12"  style="padding-left:50px; padding-right:50px;">
		<div class="form-horizontal panel-info col-md-11">

			<div id="chartdiv" style="width: 100%; height:480px;"></div>

		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	
	$.ajax({
			url			: "./kelas/table.php",
			type    	: "GET",
			dataType	: "json",
			data		: {tb:'chart'},
			success: function(data) {
				chart.dataProvider = data['chart'];
				chart.write("chartdiv");
			},
			error: function(data){
				
			}
			
	});

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                //chart.dataProvider = chartData;
                chart.categoryField = "dept";
				chart.plotAreaBorderAlpha = 1;
				

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
				categoryAxis.gridPosition = "start";
				

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Dalam Area Positif Corona";
                graph.labelText = "[[value]]";
                graph.valueField = "inner";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "#e82146";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);

                // second graph
                graph = new AmCharts.AmGraph();
                graph.title = "Luar Area Positif Corona";
                graph.labelText = "[[value]]";
                graph.valueField = "outer";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "#1aadd1";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);


                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.borderAlpha = 2.2;
                legend.horizontalGap = 10;
                chart.addLegend(legend);

				chart.depth3D = 45;
                chart.angle = 30;
                // WRITE
                
            });
});
</script>