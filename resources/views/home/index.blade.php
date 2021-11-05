@extends('layouts.main')
@section('body')
    <div class="section-head width_common" style="margin-bottom:20px">
        <div class="container">
            <h2 class="section-head__title">
              <a href=""><span>Dữ liệu điểm thi</span>
                <br/>
                <strong>Tốt nghiệp THPT 2021</strong></a>
            </h2>
            <div class="section-head__searchform">
                <div class="form-group tenthisinh">
                    <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Nhập số báo danh" autocomplete="off">
                    <button class="btn btn--search search_submit">Tìm kiếm</button>
					
                </div>
            </div> 
			<div style="max-width: 440px;margin: 20px auto 0;color: #757575;font-weight: bold;text-align: left;">
				Sau khi nhập số báo danh, thí sinh có thể xem danh sách ngành, trường có điểm chuẩn phù hợp với mình.
			</div>
        </div>
    </div>
   <x-chart/>
@endsection
