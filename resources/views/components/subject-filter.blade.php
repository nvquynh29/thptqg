
<style>
    .subject__filter{
        margin:18px 0;
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
    .subject__filter .form-group .value a {
    display: inline-block;
    color: #222;
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
    
</style>
<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="subject__filter">
						<form action="" class="e-form">
							<div class="form-group">
								<span class="label">Xem theo môn:</span>
								<div class="value">
									<a class="subject__fliter_item" class="" href="javascript:;" onclick="chartpointavg('1,2,3,4,5,6,7,8,9', 1);">Tất cả</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('1',1);">Toán</a>
									<a class="subject__fliter_item active" href="javascript:;" onclick="chartpointavg('2',1);">Ngữ văn</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('3',1);">Ngoại ngữ</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('4',1);">Vật lý</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('5',1);">Hóa học</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('6',1);">Lịch sử</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('7',1);">Địa lý</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('8',1);">Sinh học</a>
									<a class="subject__fliter_item" href="javascript:;" onclick="chartpointavg('9',1);">Giáo dục công dân</a>
								</div>
							</div>
						</form>
					</div>
</div>
<script>
    $('.subject__fliter_item').each((index,item)=>{
        item.onclick =function (){
            $('.subject__fliter_item.active')[0]?.classList.remove('active')
            this.classList.add("active")
        }
    })
</script>