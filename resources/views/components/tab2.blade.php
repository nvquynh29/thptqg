<div id="tab-2">
    {{-- chon cum thi --}}
    <div style="position: relative;top:-20px">
        <div class=" cities__filter">
            <div class="form-group" >
                <span class="label">Chọn khối:  </span>
                    <div class="value">
                         <a class="group__fliter_item-tab2 active" name="all" href="javascript:;">Tất cả</a>
                        <a class="group__fliter_item-tab2" name="A" href="javascript:;">A</a>
                        <a class="group__fliter_item-tab2" name="B" href="javascript:;" >B</a>
                        <a class="group__fliter_item-tab2" name="C" href="javascript:;" >C</a>
                        <a class="group__fliter_item-tab2" name="D" href="javascript:;" >D</a>                        
                        <a class="group__fliter_item-tab2" name="A1" href="javascript:;" >A1</a>                             
                </div>					
            </div>
        </div>
        {{--cities selector --}}

    
    </div>
    <div id="charts-all-tab2" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;">
     <div id="charts-tab2" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;">

    <script>
      const defaultGroups = ['A','B','C','D','A1']    
      defaultGroups.forEach(element => {
            $.ajax({
                type: "GET",
                url: `api/phase-group`,
                data: {"group":`${element}`},
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result)=>{
                
                const chartStack  = $('#charts-all-tab2')
                const containerCreator = `
                    <div id="${'tab2-container-chart_of_all_'+ element}" class="tab2-chart ${element}" style="width: 100%;height: 100%;" ></div>
                `   
                chartStack.append(containerCreator );
                renderChart(Object.keys(result),Object.values(result),
                            `tab2-container-chart_of_all_${element}`,
                            `Khối ${element}`)
                }
            });   
      }); 
        $('.group__fliter_item-tab2')?.each((index,item)=>{
            item.onclick =function (){
                if(this.name === 'all'){
                    $('.group__fliter_item-tab2.active')[0]?.classList.remove('active')
                    this.classList.add("active")
                    
                    return $('.tab2-chart').not('a').show()
                   
                    
                }
                $('.group__fliter_item-tab2.active')[0]?.classList.remove('active')
                this.classList.add("active")
                $(`.tab2-chart`).not(`.tab2-chart.${this.name}`).hide()
                $(`.tab2-chart.${this.name}`).show()
                // $.ajax({
                //     type: "GET",
                //     url: `api/phase-group`,
                //     data: {"group":`${this.name}`},
                //     contentType: "application/json; charset=utf-8",
                //     dataType: "json",
                //     success: (result)=>{
                    
                //     const chartStack  = $('#charts-tab2')
                //     const containerCreator = `
                //         <div id="${'tab2-container-chart_of_'+ this.name}" class="tab1-chart ${this.name}" style="width: 100%;height: 100%;" ></div>
                //     `   
                //     chartStack.append(containerCreator );
                //     renderChart(Object.keys(result),Object.values(result),
                //                 `tab2-container-chart_of_${this.name}`,
                //                 `Khối ${this.name}`)
                //     }
                // }); 
            }
        })       
    </script>
</div>