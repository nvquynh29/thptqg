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
    .subject__filter .form-group .value a {
    display: inline-block;
    color: #222;
    font-weight: normal;
    font-family: Arial, Helvetica, sans-serif;
    }
    .subject__filter .form-group .value a:not(:last-child):after {
    content: "|";
    display: inline-block;
    margin: 0 10px;
    }
    .subject__filter .form-group .value a.active {
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
</style>

<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="subject__filter">
						<form action="" class="e-form">
							<div class="form-group">
								<span class="label">Xem theo môn:</span>
								<div class="value">
									<a class="subject__fliter_item active" name="all" href="javascript:;">Tất cả</a>
									<a class="subject__fliter_item" name="toan" href="javascript:;" >Toán</a>
									<a class="subject__fliter_item" name="van"  href="javascript:;" >Ngữ văn</a>
									<a class="subject__fliter_item" name="ngoai_ngu" href="javascript:;" >Ngoại ngữ</a>
									<a class="subject__fliter_item" name="ly" href="javascript:;" >Vật lý</a>
									<a class="subject__fliter_item" name="hoa" href="javascript:;" >Hóa học</a>
									<a class="subject__fliter_item" name="su" href="javascript:;" >Lịch sử</a>
									<a class="subject__fliter_item" name="dia" href="javascript:;" >Địa lý</a>
									<a class="subject__fliter_item" name="sinh" href="javascript:;" >Sinh học</a>
									<a class="subject__fliter_item" name="gdcd" href="javascript:;" >Giáo dục công dân</a>
								</div>
							</div>
						</form>
					</div>
</div>
<div>
   <div class="ui dropdown search selection dropdown">
        <input type="hidden" name="cities" style="height: 100%">
        <i class="dropdown icon" style="position: absolute; top:20px"></i>
        <div class="default text">Thành phố</div>
        <div class="menu">
            <div class="item" data-value="VietNam">Bắc Ninh</div>
            <div class="item" data-value="VietNam1">Hà Nội</div>
        </div>
    </div>

</div>

<script>
    /* fliter js */
    $('.subject__fliter_item').each((index,item)=>{
        item.onclick =function (){
            console.log([this.name])
            $('.subject__fliter_item.active')[0]?.classList.remove('active')
            this.classList.add("active")
        }
    })
    /* select cities js */
     $('.ui.dropdown')
        .dropdown({
            clearable: true,
            placeholder: 'Chọn thành phố'
        })
    
    
  
  
    /* chart js */
    let xAxisData = []
    let marks = []
    $('')
    $.ajax({
        type: "GET",
        url: `api/phase`,
        data: {"subject": "toan","place_id":"all"},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: (result)=>{
            console.log(result)
            if(result.length === 2){
            renderChart(result[0],result[1],'container')
            }
        }
    });
    function renderChart(xAxisData,marks,element) {
            Highcharts.chart(element, {
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
</div>