<div>
    
<style>
  
    .subject__filter .form-group {
    text-align: center;
    padding: 13px 0;
    }
    .subject__filter .form-group .label {
    margin-right: 20px;
    }
    .subject__filter .form-group .value {
    display: inline;
    }
    .subject__filter .form-group .value a ,
    .cities__filter .form-group .value a {
    display: inline-block;
    color: #222;
    font-weight: normal;
    font-family: Arial, Helvetica, sans-serif;
    }
    .subject__filter .form-group .value a:not(:last-child):after,
    .cities__filter .form-group .value a:not(:last-child):after{
    content: "|";
    display: inline-block;
    margin: 0 10px;
    }
    .subject__filter .form-group .value a.active,
    .cities__filter .form-group .value a.active{
    color: #B75C00;
    }
    .subject__filter .e-form {
    display: block;
    font-size: 14px;
    }
    .ui .menu .item{
        margin: 0;
    }
    .ui.search.dropdown>input.search{
        height: 100%;
    }
    .cities__filter{
        margin-right: 20px;
    }
</style>

<div>

    
</div>

{{-- chon cum thi --}}

    <div id="charts-tab0" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;"></div>


<script>
    /* fliter js */
    



    /* chart js */
    let xAxisData = []
    let marks = []
    $.ajax({
        type: "GET",
        url: `api/top-ten`,
        data: {"subject": "toan","desc":"asc"},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: (result)=>{
            console.log(result)
            const chartStack  = $('#charts')
            const containerCreator = `
                 <div id="${'container-chart_of_'+ ''}" style="width: 100%;height: 100%;" ></div>
            `
            chartStack.append(containerCreator );
            // if(result.length === 2){
            //     renderChart(result[0],result[1],'chart-container')
            // }
        }
    });

    function renderChart(xAxisData,marks,element,chartTitle) {
            Highcharts.chart(element, {
            chart: {
                type: 'column'
            },
            title: {
                text: chartTitle,
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
                headerFormat: 'Điểm  <strong>{point.key} </strong> có',
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
</div>