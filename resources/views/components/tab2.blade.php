<div id="tab-2">
    {{-- chon cum thi --}}
    <div style="position: relative;top:-20px">
        <div class=" cities__filter">
            <div class="form-group" >
                <span class="label">Xem theo môn:</span>
                    <div class="value">
                        <a class="cities__fliter_item active" name="all" href="javascript:;">Toàn quốc</a>
                        <a class="cities__fliter_item" name="Hà Nội" href="javascript:;" >Hà Nội</a>
                        <a class="cities__fliter_item" name="TP.Hồ Chí Minh" href="javascript:;" >TP.Hồ Chí Minh</a>
                </div>					
            </div>
        </div>
        {{--cities selector --}}
    <div class="ui dropdown search selection dropdown" style="padding: 3px 25px;">
            <input type="hidden" name="cities" style="height: 100%" id="selected_city">
            <i class="dropdown icon" style="position: absolute; "></i>
            <div class="default text">Toàn quốc</div>
            <div class="menu" >
            
            </div>
        </div>
    </div>
    <script>
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
                    $('.ui.dropdown')
                    .dropdown('setup menu',{values:cities})
                }
        });   
        $('.cities__fliter_item')?.each((index,item)=>{
            item.onclick =function (){
                console.log([this.name])
                $('.cities__fliter_item.active')[0]?.classList.remove('active')
                this.classList.add("active")
                $('.ui.dropdown')
                .dropdown('set text',this.name=='all'?"Toàn quốc":this.name)
            }
        })
            /* select cities js */
        const initalcitiesSelector = $('.ui.dropdown')
            .dropdown({
                clearable: true,
                placeholder: 'Chọn thành phố'
            })
     
        const onCityChange = $(".ui.dropdown")
        .dropdown({
            onChange:function(place_id,place_name){
                console.log({place_id,place_name})
                $('input').blur();
                if(place_id == '01'){
                    $('.cities__fliter_item.active')[0]?.classList.remove('active')
                    $('.cities__fliter_item')[1]?.classList.add('active')
                    return ;
                }
                if(place_id == '02'){
                    $('.cities__fliter_item.active')[0]?.classList.remove('active')
                    $('.cities__fliter_item')[2]?.classList.add('active')
                    return ;

                }
                $('.cities__fliter_item.active')[0]?.classList.remove('active')
            }})
               
    </script>
</div>