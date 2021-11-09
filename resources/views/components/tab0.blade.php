<div>
    
<style>
    a{
        color: #000;
        text-decoration: none;
    }
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
    .form-group .value a.active {
    color: #B75C00;
    }
    .o-phodiem__form .form-group .value a:not(:last-child):after {
    content: "|";
    display: inline-block;
    margin: 0 10px;
    }
</style>

<div>

    
</div>
        <div class="subject__filter">
        <form action="" class="e-form">
            <div class="form-group">
                <span class="label">Xem theo môn:</span>
                <div class="value">
                    <a class="subject__fliter_item-tab0 active" name="all" href="javascript:;">Tất cả</a>
                    <a class="subject__fliter_item-tab0" name="toan" href="javascript:;" >Toán</a>
                    <a class="subject__fliter_item-tab0" name="van"  href="javascript:;" >Ngữ văn</a>
                    <a class="subject__fliter_item-tab0" name="ngoai_ngu" href="javascript:;" >Ngoại ngữ</a>
                    <a class="subject__fliter_item-tab0" name="ly" href="javascript:;" >Vật lý</a>
                    <a class="subject__fliter_item-tab0" name="hoa" href="javascript:;" >Hóa học</a>
                    <a class="subject__fliter_item-tab0" name="su" href="javascript:;" >Lịch sử</a>
                    <a class="subject__fliter_item-tab0" name="dia" href="javascript:;" >Địa lý</a>
                    <a class="subject__fliter_item-tab0" name="sinh" href="javascript:;" >Sinh học</a>
                    <a class="subject__fliter_item-tab0" name="gdcd" href="javascript:;" >Giáo dục công dân</a>
                </div>
            </div>
        </form>
    </div>  
    {{-- chon cum thi --}}

    <div class="o-phodiem__form">
        <form action="" class="e-form">
            <div class="form-group">
                <span class="label">Sắp xếp: </span>
                <div class="value">
                    <a class="avg-item-tab0 avgbottom active" name="desc" href="javascript:;" >Thấp nhất</a>
                    <a class="avg-item-tab0 avgtop" name="acs" href="javascript:;" >Cao nhất</a>
                    
                </div>
            </div>
        </form>
    </div>

    <div id="charts-tab0" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;"></div>


<script>
    /* fliter js */
        $('.subject__fliter_item-tab0').each((index,item)=>{
        item.onclick =function (){
            $('.subject__fliter_item-tab0.active')[0]?.classList.remove('active')
            this.classList.add("active")
            onFilterChangeTab0()
        }
        })
        $('.avg-item-tab0').each((index,item)=>{
        item.onclick =function (){
            $('.avg-item-tab0.active')[0]?.classList.remove('active')
            this.classList.add("active")
            onFilterChangeTab0()

        }
        })


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

    const onFilterChangeTab0 = ()=>{
        const currentSubject = $('.avg-item-tab0.active')[0].name
        const currentDesc = $('.subject__fliter_item-tab0.active')[0].name
        console.log({currentDesc,currentSubject})
    }
            /* get all subject marks */
        $.ajax({
        type: "GET",
        url: `api/phase-all-subject`,
        data: {"place_id":"all"},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: (result)=>{
            console.log(result)
            for (const key in result) {
                if (Object.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    const chartStack  = $('#charts-tab0')

                    const containerCreator = `
                        <div id="${'container-chart_of_'+ key}" class="tab0-chart ${key}" style="width: 100%;height: 100%;" ></div>
                    `                    
                    chartStack.append(containerCreator );
                        renderChart(
                            element.data[0],element.data[1],
                            `container-chart_of_${key}`,
                            `Phổ điểm môn ${element.name}`)
                    }
                }
            }
        });

</script>
</div>