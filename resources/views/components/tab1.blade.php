<div style="width: 100%" id="tab-1">
    <div class="subject__filter">
        <form action="" class="e-form">
            <div class="form-group">
                <span class="label">Xem theo môn:</span>
                <div class="value">
                    <a class="subject__fliter_item-tab1 active" name="all" href="javascript:;">Tất cả</a>
                    <a class="subject__fliter_item-tab1" name="toan" href="javascript:;" >Toán</a>
                    <a class="subject__fliter_item-tab1" name="van"  href="javascript:;" >Ngữ văn</a>
                    <a class="subject__fliter_item-tab1" name="ngoai_ngu" href="javascript:;" >Ngoại ngữ</a>
                    <a class="subject__fliter_item-tab1" name="ly" href="javascript:;" >Vật lý</a>
                    <a class="subject__fliter_item-tab1" name="hoa" href="javascript:;" >Hóa học</a>
                    <a class="subject__fliter_item-tab1" name="su" href="javascript:;" >Lịch sử</a>
                    <a class="subject__fliter_item-tab1" name="dia" href="javascript:;" >Địa lý</a>
                    <a class="subject__fliter_item-tab1" name="sinh" href="javascript:;" >Sinh học</a>
                    <a class="subject__fliter_item-tab1" name="gdcd" href="javascript:;" >Giáo dục công dân</a>
                </div>
            </div>
        </form>
    </div>
    {{-- chon cum thi --}}
    <div style="position: relative;top:-20px">
        <div class=" cities__filter">
            <div class="form-group" >
                <span class="label">Xem theo môn:</span>
                    <div class="value">
                        <a class="cities__fliter_item-tab1 active" name="all" href="javascript:;">Toàn quốc</a>
                        <a class="cities__fliter_item-tab1" name="Hà Nội" href="javascript:;" >Hà Nội</a>
                        <a class="cities__fliter_item-tab1" name="TP.Hồ Chí Minh" href="javascript:;" >TP.Hồ Chí Minh</a>
                </div>					
            </div>
        </div>
        {{--cities selector --}}
    <div class="ui dropdown dropdown-tab1 search selection " style="padding: 3px 25px;">
            <input type="hidden" name="cities" style="height: 100%" id="selected_city">
            <i class="dropdown icon" style="position: absolute; "></i>
            <div class="default text">Toàn quốc</div>
            <div class="menu" >
            
            </div>
        </div>
    </div>
    
    <div id="charts-tab1" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;"></div>
    <script>
       
        const changeChart = (name)=>{
            if(name === 'all'){ 
                return  $('.tab1-chart').show();    
            }
            $('.tab1-chart').show()
            $('.tab1-chart').not(`.${name}`).hide()
        }
         /* fliter js */
        $('.subject__fliter_item-tab1').each((index,item)=>{
            item.onclick =function (){
                console.log([this.name])
                $('.subject__fliter_item-tab1.active')[0]?.classList.remove('active')
                this.classList.add("active")
                changeChart(this.name)
                onchangeState()

            }
        })
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
                    const chartStack  = $('#charts-tab1')
                    const element = result[key];
                    console.log(element)
                    const containerCreator = `
                        <div id="${'tab1-container-chart_of_'+ key}" class="tab1-chart ${key}" style="width: 100%;height: 100%;" ></div>
                    `       
                              
                    chartStack.append(containerCreator );
                        renderChart(
                            element.data[0],element.data[1],
                            `tab1-container-chart_of_${key}`,
                            `Phổ điểm môn ${element.name}`)
                    }
                }
            }
        });
        
        /* cities selector js */
        $.ajax({
                type: "GET",
                url: `api/places`,
                data: '',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result)=>{
                    const cities = result.map((data)=>{
                        return {value:String(data.place_id).padStart(2, '0'), text:data.name, name:data.place_name} 
                    })
                    $('.ui .dropdown-tab1')
                    .dropdown('setup menu',{values:cities})
                }
        });   
        $('.cities__fliter_item-tab1')?.each((index,item)=>{
            item.onclick =function (){
                console.log([this.name])
                $('.cities__fliter_item-tab1.active')[0]?.classList.remove('active')
                this.classList.add("active")
                $('.ui .dropdown-tab1')
                .dropdown('set text',this.name=='all'?"Toàn quốc":this.name)
            }
        })
            /* select cities js */
        const initalcitiesSelectorTab1 = $('.ui .dropdown-tab1')
            .dropdown({
                clearable: true,
                placeholder: 'Chọn thành phố'
            })
     
        const onCityChangeTab1 = $(".ui .dropdown-tab1")
        .dropdown({
            onChange:function(place_id,place_name){
                // console.log({place_id,place_name})
                $('input').blur();
                if(place_id == '01'){
                    $('.cities__fliter_item-tab1.active')[0]?.classList.remove('active')
                    $('.cities__fliter_item-tab1')[1]?.classList.add('active')
                    return ;
                }
                if(place_id == '02'){
                    $('.cities__fliter_item-tab1.active')[0]?.classList.remove('active')
                    $('.cities__fliter_item-tab1')[2]?.classList.add('active')
                    return ;

                }
                $('.cities__fliter_item-tab1.active')[0]?.classList.remove('active')
                
                onchangeState()

            }})
        const onchangeState = ()=>{
            const currentCities= $('.ui .dropdown-tab1')
                .dropdown('get value')
                console.log(currentCities)
                // console.log(currentCities)
            const currentSubject = $('.subject__fliter_item-tab1.active')[0].name
               
            //    const query =   (`'${currentCities}':'${currentSubject}'`)

               $.ajax({
                    type: "GET",
                    url: `api/phase`,
                    data: {"subject":`${currentSubject}`,"place_id":String(currentCities).padStart(1, '0')},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: (result)=>{
                            console.log(result)
                        for (const key in result) {
                            if (Object.hasOwnProperty.call(result, key)) {
                                const element = result[key];
                                const chartStack  = $('#charts-tab1')
                                
                                const containerCreator = `
                                    <div id="${'container-chart_of_'+ key}" class="tab1-chart ${key}" style="width: 100%;height: 100%;" ></div>
                                `                    
                                const a =  element.data ? element.data:element
                                chartStack.append(containerCreator );
                                    renderChart(
                                        a[0],a[1],
                                        `container-chart_of_${key}`,
                                        `Phổ điểm môn ${element.name}`)
                                }
                        }                       
                    }
            }); 
                       
                      
        }
    
    </script>
</div>