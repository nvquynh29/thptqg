@extends('layouts.main')
@section('body')
    <style>
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
            justify-content: space-between;
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
                <div class="toast" data-delay="10000"
                    style="
                                                                                                                                        position: fixed;
                                                                                                                                        top: 100px;
                                                                                                                                        right: 30px;
                                                                                                                                        background: #e02a3b;
                                                                                                                                        border-radius: 5px;
                                                                                                                                        padding: 10px;
                                                                                                                                        color: white;
                                                                                                                                        width: 260px;
                                                                                                                                    ">
                    <div class="toast-header">
                        <strong class="mr-auto">Lỗi đã sảy ra</strong>
                        {{-- <small>11 mins ago</small> --}}
                        <button type="button" style="outline: none" class="ml-2 mb-1 close" data-dismiss="toast"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Số báo danh không tồn tại!</div>
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
                    <div class="o-detail-thisinh__diemthi">
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
                            <div class="form-group">
                                <span class="label">Tìm trường</span>
                                <input type="text" class="form-control" id="input_college" placeholder="Tên trường"
                                    autocomplete="off" />
                                <div class="autocomplete-box" id="autocomplete-box"></div>
                            </div>
                            <div class="form-group">
                                <span class="label">Khối</span>
                                <select name="slblock" id="slblock">
                                    <option value="All">Tất cả</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="H">A1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="label">Tỉnh thành</span>
                                <select name="sllocation" id="sllocation"></select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btnFilter">
                                    Tìm kiếm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="table-responsive" style="padding-top: 20px">
                        <table class="table table-striped">
                            <caption>
                                Jteam
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        var thongTinTraCuu;

        function showToast() {
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
                error: showToast,
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
            searchOk();
            console.log(sbd)
            if (sbd) {
                getMark(sbd);
            }
            // showToast()
        }

        function showData(thong_tin, diem_thi, suggest) {
            // diemthi la cac object ten va diem
            // thong tin chua sbd , cum thi
            const diem_thi_body = $('#bang_diem_thi')
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
                                    <tr>
                                        <td>${diem.name}</td>
                                        <td>${diem.mark}</td>
                                    </tr>
                                    `
            })
            goi_y_body.append(row_bang_goi_y)
            diem_thi_body.append(row_bang_diem_thi)
            cum_thi.text(`Cụm thi ${String(thong_tin.place_id).padStart(2, '0')} - Sở GDĐT ${thong_tin.place}`)
            sbd.text(thong_tin.sbd)
        }

        let allCities = localStorage.getItem("allCities");
        allCities = JSON.parse(allCities);
        allCities.forEach((element) => {
            const child =
                `<option id="${element.id}city" value="${element.place_id}">${element.place_name}</option>`;
            $("#sllocation").append(child);
        });
    </script>
@endsection
