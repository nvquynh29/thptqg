<div style="width: 100%">
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
    <div id="charts-tab1" style="height: fit-content; min-width: 310px;max-width:900px;margin: 0 auto; width:100%;">
       
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
        $.ajax({
        type: "GET",
        url: `api/phase-all-subject`,
        data: {"place_id":"all"},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: (result)=>{
            console.log(result)
            const chartStack  = $('#charts-tab1')
            for (const key in result) {
                if (Object.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    const containerCreator = `
                        <div id="${'container-chart_of_'+ key}" style="width: 100%;height: 100%;" ></div>
                    `                    
                    chartStack.append(containerCreator );
                        renderChart(
                            element[0],element[1],
                            `container-chart_of_${key}`,
                            `Phổ điểm môn ${key}`)
                    }
                }
            }

            
        });
        
    </script>
</div>