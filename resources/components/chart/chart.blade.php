@extends('home.index')
@section('chart')
  <style></style>
<body>
  <h1>Hello</h1>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>



    <div id="container" id="chart" style="height: 400px;min-width: 310px;max-width:900px;margin: 0 auto;"></div>

<script>
  let xAxisData = []
  let marks = []
  $.ajax({
      type: "GET",
      url: `api/phase-subject`,
      data: {"subject": "toan"},
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: (result)=>{
        if(result.length === 2){
        renderChart(result[0],result[1])
        }
      }
  });
  function renderChart(xAxisData,marks) {
        Highcharts.chart('container', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Phổ điểm môn Toán'
          },
          subtitle: {
            text: ''
          },
          xAxis: {
            categories:xAxisData,
            crosshair: true,
            labels: {
                    rotation: -90,
                },
              
          },
          yAxis: {
            min: 0,
            title: {
              text: 'Thí sinh'
            }
          },
          tooltip: {
            headerFormat: 'Điểm  <strong>{point.key} </strong> khoảng',
            pointFormat: '<tr><td style="color:black;padding:0"> <strong>{point.y}</strong> thí sinh </td>'+'</tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
          },
          plotOptions: {
            column: {
              pointPadding: 0.2,
              borderWidth: 0,
              colors: ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce',
                '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a']
            }
          },

          series: [{
            data:marks

          }]
        });
    
  }

</script>
</body>  
@endsection

