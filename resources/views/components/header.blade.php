<div>
     <style>
        .section-head__title{
            margin: 30px auto !important; 
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        .hidden{
            display: none;
        }
        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
    
    
    <div class="section-head width_common" style="margin-bottom:20px">
        <div class="container">
            <h2 class="section-head__title">
              <a href=""><span>Tra cứu điểm thi</span>
                <br/>
                <strong>Tốt nghiệp THPT 2021</strong></a>
            </h2>
            <div class="section-head__searchform">
                <div class="form-group tenthisinh">
                    <input class="form-control"  type="number" name="keyword" id="keyword" placeholder="Nhập số báo danh" autocomplete="off">
                    <button class="btn btn--search search_submit" onclick="search()">Tìm kiếm</button>
					
                </div>
            </div> 
			<div style="max-width: 440px;margin: 20px auto 0;color: #757575;font-weight: bold;text-align: left;">
				Sau khi nhập số báo danh, thí sinh có thể xem danh sách ngành, trường có điểm chuẩn phù hợp với mình.
			</div>
        </div>
    </div>
    <div id="toastId"class=" hidden">
          <div class="toast " data-delay="10000" style="position: fixed;top: 100px;right: 30px;background: #e02a3b;border-radius: 5px;padding:10px;color: white;width: 260px">
            <div class="toast-header">
            <strong class="mr-auto">Lỗi đã sảy ra</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" style="outline: none" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
            Số báo danh không tồn tại!
            </div>
        </div>
    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        function showToast(){
            $('#toastId')[0].classList.remove('hidden')
            $('.toast').toast('show')
        }
        function getMark (sbd){
             $.ajax({
                type: "GET",
                url: `api/mark/${sbd}`,
                data: '',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: (result)=>{
                    console.log(result)
                },
                error:showToast,
            });  
            // window.location.href = '/tracuu';
            console.log($('#keyword')[0].value)
        
        }
        function search(){
            const sbd = $('#keyword')[0].value
            if(sbd){
                getMark(sbd)
            }
            // showToast()
        }
    </script>
</div>