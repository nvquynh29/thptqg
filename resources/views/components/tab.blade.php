<head>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</head>
<style>
  .tabs-wrapper>div {
  display: inline-block;
  border-bottom: 1px solid #E0E0E0;
  }
  .tabs-wrapper {
  text-align: center;
  margin-top: 30px;
  clear: both;

  }
  .tabs-wrapper div {
    display: inline-block;
    color: #222222;
    padding: 10px 0px;
  }
  .tabs-wrapper .tabs-items div.active {
    font-weight: 700;
    color: #B75C00;
    border-bottom: 1px solid #B75C00;
    margin-bottom: -1px;
  }
  .tabs-wrapper .tab-item {
    margin-left: 70px;
  
  }
  .tabs-wrapper div {
    display: inline-block;
    color: #222222;
    padding: 10px 0px;
    font-size: 14px;
  }
  .tab-item{
    cursor: pointer;
  }
  .line {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 6px;
    border-radius: 15px;
    background-color: #c23564;
    transition: all 0.2s ease;
  }
</style>
<div>

  <div class="tabs-wrapper">
    <div class="tabs-items tabular menu">
        <div class="tab-item active item" data-tab="tab-0">Top điểm trung bình của 10 tỉnh thành</div>
        <div class="tab-item item" data-tab="tab-1" >Phổ điểm kỳ thi THPT quốc gia</div>
        <div class="tab-item item" data-tab="tab-2">Phổ điểm các khối thi đại học</div>
        <div class="line"></div>
    </div>
    
    <div class="container">
      <div class="ui tab active" data-tab="tab-0">
        <x-tab0/>
      </div>
        <div class="ui tab" data-tab="tab-1">
         <x-tab1/>
      </div>
        <div class="ui tab" data-tab="tab-2">
         <x-tab2/>
      </div>
    </div>
  </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  // const $ = document.querySelector.bind(document);
    // const changeTab = (tabId)=>{
    //   console.log(tabId)
    // }
    // const line = $(".tabs-items .line");
    // const tabs= $(".tab-item")

    // tabs.each((index,tab)=>{
    //    tab.onclick = function () {
    //     ($(".tab-item.active")[0].classList.remove("active"))
    //     this.classList.add("active")
    //     changeTab(index)
    //   };
    // })
  // $.fn.api.settings.api = {
  // 'get-mark' : '/mark/{sbd}',
  // 'get-sugget'   : '/suggest',
  // 'get-all-subject'      : '/phase-all-subject',
  // 'get-phase-group'   : '/phase-group',
  // 'get-phase'        : '/phase',
  // 'get-top-ten'       : '/top-ten',
  // };
    $('.tabular.menu .tab-item').tab({
    evaluateScripts : 'once',
    alwaysRefresh: true,
    cache: false,
    apiSettings: {
      loadingDuration: 300,
      mockResponse: function(settings) {
        console.log(settings)
      }
    },
    auto: true
});

</script>