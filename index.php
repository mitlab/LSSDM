<?php
require_once('db.php');
require_once('sensor.php');
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var sensorData = <?=json_encode(getSensor("dust"))?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','date');
        data.addColumn('number','dust');
        data.addRows(sensorData);
        var options = {
          title: '',
          curveType: 'function',
          backgroundColor: '#fff',
          chartArea: {width: '100%', height: '100%'},
          legend: {position: 'in'},
          series: {
      			0: {color:'#ff0000'}
      			},
          titlePosition: 'in', axisTitlesPosition: 'in',
          hAxis: {textPosition: 'in'}, vAxis: {textPosition: 'in'}
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <h1>LSSM 미세 먼지센서 모니터링</h1>
    <div id="curve_chart" style="width: 600px; height: 300px"></div>
  </body>
</html>
