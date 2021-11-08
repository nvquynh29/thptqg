
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
    
</style>
<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="subject__filter">
						<form action="" class="e-form">
							<div class="form-group">
								<span class="label">Xem theo môn:</span>
								<div class="value">
									<a class="subject__fliter_item" name="all" href="javascript:;">Tất cả</a>
									<a class="subject__fliter_item" name="toan" href="javascript:;" >Toán</a>
									<a class="subject__fliter_item active" name="van"  href="javascript:;" >Ngữ văn</a>
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
<script>
    $('.subject__fliter_item').each((index,item)=>{
        item.onclick =function (){
            console.log([this.name])
            $('.subject__fliter_item.active')[0]?.classList.remove('active')
            this.classList.add("active")
        }
    })
</script>