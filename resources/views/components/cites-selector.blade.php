<div>
   <div class="ui dropdown search selection dropdown">
        <input type="hidden" name="cities">
        <i class="dropdown icon"></i>
        <div class="default text">Thành phố</div>
        <div class="menu">
            <div class="item" data-value="VietNam">Bắc Ninh</div>
            <div class="item" data-value="VietNam1">Hà Nội</div>
        </div>
    </div>

   <script>
       $('.ui.dropdown')
        .dropdown({
            clearable: true,
            placeholder: 'Chọn thành phố'
        })
        
   </script>
</div>