@extends('layouts.main')
@section('body')

    <style>
        a{
            text-decoration: none !important;
        }
        a:hover {
            color: #b75c00;
        }

        .o-detail-thisinh {
            padding: 22px 27px 16px 37px;
            border: 2px solid #e5e5e5;
            border-radius: 10px;
        }

        .o-detail-thisinh__sbd label {
            font-weight: 400;
        }

        .o-detail-thisinh__info {
            float: left;
            width: 35%;
            padding-right: 20px;
            padding-left: 37px;
            margin-left: -37px;
        }

        .o-detail-thisinh__sbd {
            font-size: 22px;
            color: #b75c00;
            font-size: 24px;
            line-height: 148.19%;
            font-family: "Merriweather", serif;
        }

        .o-detail-thisinh__sbd label {
            font-weight: 400;
        }

        strong {
            font-weight: bolder;
        }

        .o-detail-thisinh__cumthi {
            font-size: 18px;
            line-height: 148.19%;
            color: #222222;
            margin-top: 15px;
        }

        .o-detail-thisinh__social {
            float: left;
            margin-top: 60px;
        }

        .o-detail-thisinh__diemthi {
            float: left;
            width: 65%;
        }

        .o-cumthi__notice,
        .o-detail-thisinh,
        .o-suggest-nganh,
        .o-suggest-nganh__list,
        .o-phodiem__title {
            float: left;
            width: 100%;
        }

        .o-detail-thisinh__diemthi .e-table {
            border-top: none;
        }

        .e-table {
            margin-bottom: 10px;
            font-size: 15px;
            width: 100%;
            border-top: 1px solid #e5e5e5;
        }

        .o-detail-thisinh__sbd tbody tr:nth-child(even) {
            background: #f7f7f7;
        }

        .o-detail-thisinh__sbd {
            font-size: 22px;
            color: #b75c00;
            font-size: 24px;
            line-height: 148.19%;
            font-family: "Merriweather", serif;
        }

        .o-detail-thisinh__cumthi {
            font-size: 18px;
            line-height: 148.19%;
            color: #222222;
            margin-top: 15px;
        }

        .o-detail-thisinh__social li {
            float: left;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .e-table thead {
            border-bottom: 3px solid #e5e5e5;
        }

        .e-table th,
        .e-table td {
            text-align: left;
            padding: 10px 15px;
        }

        .o-suggest-nganh__header {
            text-align: center;
            margin-bottom: 20px;
        }

        .o-suggest-nganh {
            margin-top: 28px;
        }

        .o-suggest-nganh__form .e-form {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-evenly;
        }

        .o-suggest-nganh__form .form-group {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
        }

        .o-suggest-nganh__form .form-group .label {
            display: inline-block;
            margin-right: 10px;
            white-space: nowrap;
        }

        .o-suggest-nganh__form .form-group .form-control,
        .o-suggest-nganh__form .form-group select {
            border: 1px solid #e5e5e5;
            box-sizing: border-box;
            border-radius: 2px;
            height: 40px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .o-suggest-nganh__form .form-group .btn {
            background: #b75c00;
            color: #fff;
        }

        .btn:not(.btn-back) {
            border: 0;
        }

        .o-suggest-nganh__form .form-group select {
            width: 180px;
        }

        .o-suggest-nganh__form .form-group .form-control,
        .o-suggest-nganh__form .form-group select {
            border: 1px solid #e5e5e5;
            box-sizing: border-box;
            border-radius: 2px;
            height: 40px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .o-suggest-nganh__form .form-group .form-control,
        .o-suggest-nganh__form .form-group select {
            border: 1px solid #e5e5e5;
            box-sizing: border-box;
            border-radius: 2px;
            height: 40px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .plus {
            color: #36BB14;
        }

        .minus {
            color: red;
        }

        input,
        select {
            background: #fff;
            text-transform: none;
            outline: none;
        }

        input:focus-visible,
        input:focus,
        select:focus-visible {
            box-sizing: none;
            outline: none;
            outline-offset: none !important;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: none;
        }

        .container {
            position: inherit;
        }

        .section-head__title {
            margin: 30px auto !important;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .hidden {
            display: none;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        .changeHeigth {
            margin-bottom: 20px;
            height: 85vh;
            display: flex;
            align-items: center;
        }
    </style>

    <div>
        <div>
            <div id="changeHeight" class="section-head width_common changeHeigth">
                <div class="container">
                    <h2 class="section-head__title">
                        <a href=""><span>Dữ liệu điểm thi</span>
                            <br />
                            <strong>Tốt nghiệp THPT 2021</strong></a>
                    </h2>
                    <div class="section-head__searchform">
                        <div class="form-group tenthisinh">
                            <input class="form-control" type="number" name="keyword" id="keyword"
                                placeholder="Nhập số báo danh" autocomplete="off" />
                            <button class="btn btn--search search_submit" onclick="search()">
                                Tìm kiếm
                            </button>
                            
                        </div>
                    </div>
                    <div
                        style="
                                                                                                                                            max-width: 440px;
                                                                                                                                            margin: 20px auto 0;
                                                                                                                                            color: #757575;
                                                                                                                                            font-weight: bold;
                                                                                                                                            text-align: left;
                                                                                                                                        ">
                        Sau khi nhập số báo danh, thí sinh có thể xem danh
                        sách ngành, trường có điểm chuẩn phù hợp với mình.
                    </div>
                </div>
            </div>
            <div id="toastId" class="hidden">
                <div class="toast" 
                    style="
                                                                                                                                        position: fixed;
                                                                                                                                        top: 100px;
                                                                                                                                        right: 30px;
                                                                                                                                        background: #e02a3b;
                                                                                                                                        border-radius: 5px;
                                                                                                                                        padding: 10px;
                                                                                                                                        color: white;
                                                                                                                                        width: 260px;
                                                                                                    
                                   z-index:50;                                                                  ">
                    <div class="toast-header">
                        <strong class="mr-auto">Lỗi đã sảy ra</strong>
                        {{-- <small>11 mins ago</small> --}}
                        <button type="button" style="outline: none" class="ml-2 mb-1 close" data-dismiss="toast"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body" id="errorMes"></div>
                </div>
            </div>
        </div>

        <div id="showInfo" class="hidden">
            <div class="container">
                <div class="o-detail-thisinh">
                    <div class="o-detail-thisinh__info">
                        <h2 class="o-detail-thisinh__sbd">
                            <label>Số báo danh: </label>
                            <strong id="so_bao_danh">48004976</strong>
                        </h2>
                        <p class="o-detail-thisinh__cumthi" id="cum_thi">
                            Cụm thi: 48 - Sở GDĐT Đồng Nai
                        </p>
                    </div>
                    <div class="o-detail-thisinh__diemthi table-responsive">
                        <table class="e-table table-striped" id="bang_diem_thi" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Môn thi</th>
                                    <th>Điểm</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- bang suggest --}}
            <div>
                <div class="container">
                    <div class="o-suggest-nganh"></div>
                    <div class="o-suggest-nganh__header">
                        <h2 class="o-suggest-nganh__title">
                            Danh sách ngành có điểm chuẩn 2020 phù hợp với bạn
                        </h2>
                    </div>
                    <div class="o-suggest-nganh__form">
                        <form class="e-form" action="">

                            {{-- tim truong --}}
                            <div class="form-group" style="width: 40%">
                                <span class="label">Tìm trường</span>
                                    <div class="ui dropdown search selection" style="border: 1px solid #dddcdc;border-radius: 2px; width:100%; max-height :200px; over-flow:auto">
                                    <input type="hidden" name="gender">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Trường</div>
                                    <div class="menu" id="input_college" >
                                    </div>
                                    </div>
                            </div>
                            {{-- tim nganh --}}
                            <div class="form-group">
                                <span class="label">Tìm ngành</span>
                                <input type="text" class="form-control" id="ten_nganh" placeholder="Tên ngành, mã ngành"
                                    autocomplete="off" />
                                <div class="autocomplete-box" id="autocomplete-box"></div>
                            </div>
                            {{-- tim khoi --}}
                            <div class="form-group">
                                <span class="label">Khối</span>
                                <select name="slblock" id="slblock">
                                    <option value="all">Tất cả</option>
                                    <option value="1">A</option>
                                    <option value="2">A1</option>
                                    <option value="3">B</option>
                                    <option value="4">C</option>
                                    <option value="5">D</option>
                                </select>
                            </div>
                           

                            <div class="form-group">
                                <button type="button" style="margin: 0 10px" class="btn btnFilter" onclick="filter()">
                                    Tìm kiếm theo bộ lọc
                                </button>
                                 <button type="button"  style="margin: 0 10px" class="btn btnFilter" onclick="autoSuggest()">
                                    Lọc tự động dựa trên điểm của bạn
                                </button>
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="table-responsive" style="padding-top: 20px">
                        <table class="table table-striped">
                            <caption style="text-align: center;outline:none">
                                <button class="btn primary" id="loadMoreSuggest" style="margin: 0 auto;box-shadow: none"  onclick="loadMore(true)">Xem thêm</button>
                                 <button class="btn primary" id="loadMoreSearch" style="margin: 0 auto;box-shadow: none" onclick="loadByFilter()">Xem thêm</button>
                            </caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên ngành</th>
                                    <th scope="col">Mã ngành</th>
                                    <th scope="col">Tổ hợp</th>
                                    <th scope="col">Tên trường</th>
                                    <th scope="col">Điểm chuẩn</th>
                                    <th scope="col">Tổng điểm của thí sinh</th>
                                </tr>
                            </thead>
                            <tbody id="bang_goi_y">


                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loading">

    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        var thongTinTraCuu;

        function showToast(messages,duration) {
            $("#toastId .toast").attr('data-delay',duration)
            setTimeout(() => {
            $("#toastId .toast").removeAttr('data-delay')
            }, duration);
            $('#errorMes').text(messages)
            $("#toastId")[0].classList.remove("hidden");
            $(".toast").toast("show");
        }

        function getMark(sbd) {
            $.ajax({
                type: "GET",
                url: `api/mark/${sbd}`,
                data: "",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result) => {
                    console.log(result);
                    showData(result.data, result.marks, result.suggest)
                    searchOk()
                },
                error: function error() {
                    showToast("Số báo danh không tồn tại!",1000)
                },
            });
            // window.location.href = '/tracuu';
            console.log($("#keyword")[0].value);
        }

        function searchOk() {
            $('#changeHeight')[0].classList.remove('changeHeigth')
            $('#showInfo')[0].classList.remove('hidden')
        }

        function search() {
            const sbd = $("#keyword")[0].value;
            // searchOk();
            console.log(sbd)
            if (sbd) {
                getMark(sbd);
            }
            // showToast()
        }

        function showData(thong_tin, diem_thi, suggest) {
            /* clear old data */
            $('#bang_diem_thi tbody').empty()
            $('#bang_goi_y').empty()
            $('#so_bao_danh').empty()
            $('#cum_thi').empty()
            // diemthi la cac object ten va diem
            // thong tin chua sbd , cum thi
            const diem_thi_body = $('#bang_diem_thi tbody')
            const goi_y_body = $('#bang_goi_y')
            const sbd = $('#so_bao_danh')
            const cum_thi = $('#cum_thi')

            let row_bang_goi_y = ''

            suggest.forEach((element, index) => {
                const text = element.delta >= 0 ? `<span class="plus">+${element.delta}</span>` :
                    `<span class="minus">${element.delta}</span>`
                row_bang_goi_y += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${element.major_name}</td>
                                    <td>${element.major_code}</td>
                                    <td>${element.group}</td>
                                    <td>${element.uni_name}</td>
                                    <td>${element.standard_point}</td>
                                    <td>${element.point}<br/>( ${text} )</td>
                                </tr>`
            });

            let row_bang_diem_thi = ''

            diem_thi.forEach(diem => {
                row_bang_diem_thi += `
                                    <tr >
                                        <td >${diem.name}</td>
                                        <td>${diem.mark}</td>
                                    </tr>
                                    `
            })
            goi_y_body.append(row_bang_goi_y)
            diem_thi_body.append(row_bang_diem_thi)
            cum_thi.text(`Cụm thi ${String(thong_tin.place_id).padStart(2, '0')} - Sở GDĐT ${thong_tin.place}`)
            sbd.text(thong_tin.sbd)
        }


        
        function filter(){
            // const uni = $('#input_college')[0].value
            $('#loadMoreSuggest').hide()
            $('#loadMoreSearch').show()
            const uni=  $('.ui.dropdown')
            .dropdown('get value')
            const major = $('#ten_nganh')[0].value
            const group_id = $('#slblock')[0].value
            const currentSbd = $('#so_bao_danh')[0].textContent
            console.log({uni,major,group_id,currentSbd})
            $.ajax({
                type:"GET",
                url:`api/major`,
                data:{"sbd":`${currentSbd}`,"uni":`${uni}`,"group_id":`${group_id}`,"major":`${major}`},
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result) => {
                    if(result.length <= 0){
                      return showToast('Không có dữ liệu phù hợp với lựa chọn của bạn!',2000)
                    }
                    emptySuggest()
                    pushDataToSuggest(result,0);
                },

            })
            return {
                thong_tin:[],
                diem_thi:[],
                suggest:[]
            }
        }
        function emptySuggest() {
            $('#bang_goi_y').empty()

        }
        function pushDataToSuggest(data,currentTableIndex) {
                    let row_bang_goi_y = ''
                    const goi_y_body = $('#bang_goi_y')
                    data.forEach((element, index) => {
                        const text = element.delta >= 0 ? `<span class="plus">+${element.delta}</span>` :
                            `<span class="minus">${element.delta}</span>`
                        row_bang_goi_y += `<tr>
                                            <th scope="row">${currentTableIndex + index + 1}</th>
                                            <td>${element.major_name}</td>
                                            <td>${element.major_code}</td>
                                            <td>${element.group}</td>
                                            <td>${element.uni_name}</td>
                                            <td>${element.standard_point}</td>
                                            <td>${element.point}<br/>( ${text} )</td>
                                        </tr>`
                    });
                    goi_y_body.append(row_bang_goi_y)
        }
        function autoSuggest(){
            $('#loadMoreSearch').hide()
            $('#loadMoreSuggest').show()
            emptySuggest()
            loadMore(true)
        }
        function loadByFilter() {
            loadMore(false)
            
        }
        function loadMore(isSuggest){
            const group_id = $('#slblock')[0].value
            const uni=  $('.ui.dropdown')
            .dropdown('get value')
            const currentTableIndex = $('#bang_goi_y tr').last()[0]?.rowIndex??0
            const currentSbd = $('#so_bao_danh')[0].textContent
            const major = $('#ten_nganh')[0].value
            const loadMoreSuggestQuery = {"sbd":`${currentSbd}`,"group_id":`${group_id}`,"start":`${currentTableIndex}`,"count":"20"}
            const loadByFilterQuery = {"sbd":`${currentSbd}`,"uni":`${uni}`,"group_id":`${group_id}`,"major":`${major}`,"start":currentTableIndex}
                $.ajax({
                type:"GET",
                url:`api/${isSuggest?'suggest':'major'}`,
                data:isSuggest?loadMoreSuggestQuery:loadByFilterQuery,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result) => {
                    if(result.length <= 0 ){
                        $(`${isSuggest?'#loadMoreSuggest':'#loadMoreSearch'}`).hide()
                    }
                    console.log(result);
                    pushDataToSuggest(result,currentTableIndex)

                },})
        }
        function getUniversities() {
            $.ajax({
                type:"GET",
                url:'api/universities',
                data:{},
                contentType: "application/json; charset=utf-8",
                dataType:'json',
                success:function(result){
                    console.log(result)
                    const universities = result.map((data)=>{
                        return {value:String(data.uni_code), text:`${data.uni_code} - ${data.uni_name}`, name:`${data.uni_code} - ${data.uni_name}`} 
                    })
                    // universities.unshift({value:'all', text:'Tất cả', name:'Tất cả'})

                    $('.ui.dropdown')
                    .dropdown('setup menu',{values:universities})
                }
            })
        }
        getUniversities()
        // let allCities = localStorage.getItem("allCities");
        // allCities = JSON.parse(allCities);
        // allCities.forEach((element) => {
        //     const child =
        //         `<option id="${element.id}city" value="${element.place_id}">${element.place_name}</option>`;
        //     $("#sllocation").append(child);
        // });
      
        
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script>
        $('.ui.dropdown')
            .dropdown({
                clearable: true,
                // placeholder: 'Chọn thành phố'
            })
    </script>

@endsection
