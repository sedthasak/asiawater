<div class="carsearch-popup">
    <div class="carsearch-menu carsearch-lv1">
        <div class="carsearch-top">
            <button type="button" class="carsearch-head"> เลือกยี่ห้อรถ</button>
            <button type="button" class="carsearch-exit">ยกเลิก</button>
        </div>
        <input type="text" class="car-inputsearch" placeholder="ค้นหา..." id="brandtext" onkeyup="brandsearch(event);">
        <ul class="carsearch-ul">
            @if (isset($brand))
                @foreach ($brand as $rows)
                <li><button type="button" rel="{{$rows->title}}" onclick="brand2({{$rows->id}}, '{{$rows->title}}')"> {{$rows->title}}</button></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="carsearch-menu carsearch-lv2">
        <div class="carsearch-top">
            <button type="button" class="carsearch-head"><i class="bi bi-arrow-left"></i> เลือกรุ่นรถ</button><button type="button" class="carsearch-exit">ยกเลิก</button>
        </div>
        <input type="text" class="car-inputsearch" placeholder="ค้นหา..." id="modeltext" onkeyup="modelsearch(event);">
        <ul class="carsearch-ul">
            
        </ul>
        <div class="btn-selectall-car">
            <button class="modelall">เลือกรุ่นทั้งหมด.. คลิก <img src="{{asset('frontend/images/chev-circle-white.svg')}}" alt=""></button>
        </div>
    </div>
    <div class="carsearch-menu carsearch-lv3">
        <div class="carsearch-top">
            <button class="carsearch-head"><i class="bi bi-arrow-left"></i> เลือกโฉม</button><button class="carsearch-exit">ยกเลิก</button>
        </div>
        <input type="text" class="car-inputsearch" placeholder="ค้นหา..." id="generationtext" onkeyup="generationsearch(event);">
        <ul class="carsearch-ul">
            
            
        </ul>
        <div class="btn-selectall-car">
            <button class="generationall">เลือกโฉมทั้งหมด.. คลิก <img src="{{asset('frontend/images/chev-circle-white.svg')}}" alt=""></button>
        </div>
    </div>
    <div class="carsearch-menu carsearch-lv4">
        <div class="carsearch-top">
            <button class="carsearch-head"><i class="bi bi-arrow-left"></i> เลือกรุ่นย่อย</button><button class="carsearch-exit">ยกเลิก</button>
        </div>
        <input type="text" class="car-inputsearch" placeholder="ค้นหา..." id="submodeltext" onkeyup="submodelsearch(event);">
        <ul class="carsearch-ul">
            
            
        </ul>
        <div class="btn-selectall-car">
            <button class="submodelall">เลือกรุ่นย่อยทั้งหมด.. คลิก <img src="{{asset('frontend/images/chev-circle-white.svg')}}" alt=""></button>
        </div>
    </div>
</div>

{{-- <script src="{{asset('frontend/js/jquery.min.js')}}"></script> --}}

<script type="text/javascript">
    var brand_id, model_id, generation_id, submodel_id;
    function brandsearch(){
        var id1 = "";
        if ($("#brandtext").val(event.target.value).length > 0 ) {
            id1 = $("#brandtext").val();
        }
        else {
            id1 = "all";
        }
        $.get('/searchbrandtext/'+id1, function(data, status) {
            // console.log(data);
            var param2 = "";
            var html='<li><button type="button" rel="ทุกยี่ห้อ" onclick="brand2(0, \'ทุกยี่ห้อ\')">ทุกยี่ห้อ</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+value.title+'" onclick="brand2('+value.id+', \''+value.title+'\')"> '+value.title+'</button></li>';
            });
            $('.carsearch-lv1 .carsearch-ul').empty().append(html);
        });
    }

    function modelsearch(event){
        var id1 = "";
        if ($("#modeltext").val(event.target.value).length > 0) {
            id1 = $("#modeltext").val();
        }
        else {
            id1 = "all";
        }
        $.get('/searchmodeltext/'+brand_id+'/'+id1, function(data, status) {
            // console.log(data);
            var param2 = "";
            var html='<li><button type="button" rel="รุ่นทั้งหมด" onclick="model2(0, \'รุ่นทั้งหมด\')">รุ่นทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+value.title+'" onclick="model2('+value.id+', \''+param2+' '+value.model+'\')">'+value.model+'</button></li>';
            });
            $('.carsearch-lv2 .carsearch-ul').empty().append(html);
        });
    }

    function generationsearch(event){
        var id1 = "";
        if ($("#generationtext").val(event.target.value).length > 0) {
            id1 = $("#generationtext").val();
        }
        else {
            id1 = "all";
        }
        $.get('/searchgenerationtext/'+model_id+'/'+id1, function(data, status) {
            // console.log(data);
            var param2 = "";
            var html='<li><button type="button" rel="โฉมทั้งหมด" onclick="generation(0, \'โฉมทั้งหมด\')">โฉมทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+value.generations+'" onclick="generation2('+value.id+', \''+param2+' '+value.generations+'\')">'+value.generations+'</button></li>';
            });
            $('.carsearch-lv3 .carsearch-ul').empty().append(html);
        });
    }

    function submodelsearch(event){
        var id1 = "";
        if ($("#submodeltext").val(event.target.value).length > 0) {
            id1 = $("#submodeltext").val();
        }
        else {
            id1 = "all";
        }
        $.get('/searchsubmodeltext/'+generation_id+'/'+id1, function(data, status) {
            // console.log(data);
            var param2 = "";
            var html='<li><button type="button" rel="รุ่นย่อยทั้งหมด" onclick="generation(0, \'รุ่นย่อยทั้งหมด\')">รุ่นย่อยทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+value.sub_models+'" onclick="submodel2('+value.id+', \''+param2+' '+value.sub_models+'\')">'+value.sub_models+'</button></li>';
            });
            $('.carsearch-lv4 .carsearch-ul').empty().append(html);
        });
    }

    function brand(param, param2) {
        console.log(param);
        $.get('/popup-carsearch-model/'+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' ทุกรุ่น" onclick="model(0, \''+param2+' ทุกรุ่น\')">รุ่นทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.model+'" onclick="model('+value.id+', \''+param2+' '+value.model+'\')">'+value.model+'</button></li>';
            });
            $('.carsearch-lv2 .carsearch-ul').empty().append(html);
        });
    }

    function model(param, param2) {
        $('.box-search-car .carsearch-input input').val(param2);
        
        $.get('/popup-carsearch-generation/'+param+'?models_id='+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' ทุกโฉม" onclick="generation(0, \''+param2+' ทุกโฉม\')">โฉมทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.generations+'" onclick="generation('+value.id+', \''+param2+' '+value.generations+'\')">'+value.generations+'</button></li>';
            });
            $('.carsearch-lv3 .carsearch-ul').empty().append(html);
        });
        // resources\views\frontend\layouts\inc_javascript.blade.php
        if (param == 0){
            $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
            $('.box-search-car .carsearch-lv1').show();
            $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        }
        else {
            $('.box-search-car .carsearch-lv3').fadeIn();
            $('.box-search-car .carsearch-lv2').hide();
        }
        $('#modeltext').val("");
    }

    function generation(param, param2) {
        $('.box-search-car .carsearch-input input').val(param2);
        $.get('/popup-carsearch-submodel/'+param+'?generations_id='+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' ทุกรุ่นย่อย" onclick="submodel(0, \''+param2+' ทุกรุ่นย่อย\')">รุ่นย่อยทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.sub_models+'" onclick="submodel('+value.id+', \''+param2+' '+value.sub_models+'\')">'+value.sub_models+'</button></li>';
            });
            $('.carsearch-lv4 .carsearch-ul').empty().append(html);
        });
        // resources\views\frontend\layouts\inc_javascript.blade.php
        if (param == 0){
            $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
            $('.box-search-car .carsearch-lv1').show();
            $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        }
        else {
            $('.box-search-car .carsearch-lv4').fadeIn();
            $('.box-search-car .carsearch-lv3').hide();
        }
    }

    function submodel(param, param2) {
        $('.box-search-car .carsearch-input input').val(param2);
        if (param == 0){
            $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
            $('.box-search-car .carsearch-lv1').show();
            $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        }
        else {
            $('.box-search-car .carsearch-lv2, .box-search-car .carsearch-lv3, .box-search-car .carsearch-lv4').hide();
            $('.box-search-car .carsearch-lv1').show();
            $( ".box-search-car .carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        }
    }
    // search หน้า car fancybox
    function brand2(param, param2) {
        // console.log($("#textsearchfooter").val(param2));
        $(".modelall").attr("onclick", 'model2(0, \''+param2+' รุ่นทั้งหมด\')');
        $("#textsearchfooter").val(param2);
        $.get('/popup-carsearch-model/a?brand_id='+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' รุ่นทั้งหมด" onclick="model2(0, \''+param2+' รุ่นทั้งหมด\')">รุ่นทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.model+'" onclick="model2('+value.id+', \''+param2+' '+value.model+'\')">'+value.model+'</button></li>';
            });
            $('.carsearch-lv2 .carsearch-ul').empty().append(html);
        });

        if (param===0) {
            brand_id = null;
            $('#textsearch').val("ทุกยี่ห้อ");
            $('#textsearchfooter').val("ทุกยี่ห้อ");
            $('.carsearch-lv1').show();
            $('.carsearch-lv4').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv2').hide();
            $.fancybox.close();
        }
        else {
            brand_id = param;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv4').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv2').fadeIn();
            $('.carsearch-lv1').hide();
        }
        
    }

    function model2(param, param2) {
        
        $(".generationall").attr("onclick", 'generation2(0, \''+param2+' โฉมทั้งหมด\')');
        $('.box-search-car .carsearch-input input').val(param2);
        $('#textsearchfooter').val(param2);
        $.get('/popup-carsearch-generation/'+param+'?models_id='+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' โฉมทั้งหมด" onclick="generation2(0, \''+param2+' โฉมทั้งหมด\')">โฉมทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.generations+'" onclick="generation2('+value.id+', \''+param2+' '+value.generations+'\')">'+value.generations+'</button></li>';
            });
            $('.carsearch-lv3 .carsearch-ul').empty().append(html);
        });
        // resources\views\frontend\layouts\inc_javascript.blade.php
        
        $('#modeltext').val("");
        if (param===0) {
            console.log(param2);
            model_id = null;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv1').show();
            $('.carsearch-lv2').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv4').hide();
            $.fancybox.close();
        }
        else {
            model_id = param;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv2').hide();
            $('.carsearch-lv3').fadeIn();
        }
    }

    function generation2(param, param2) {
        
        $(".submodelall").attr("onclick", 'submodel2(0, \''+param2+' รุ่นย่อยทั้งหมด\')');
        $('.box-search-car .carsearch-input input').val(param2);
        $('#textsearchfooter').val(param2);
        $.get('/popup-carsearch-submodel/'+param+'?generations_id='+param, function(data, status) {
            // console.log(data);
            var html='<li><button type="button" rel="'+param2+' รุ่นย่อยทั้งหมด" onclick="submodel2(0, \''+param2+' รุ่นย่อยทั้งหมด\')">รุ่นย่อยทั้งหมด</button></li>';
            $.each(data, function(index, value){
                html+='<li><button type="button" rel="'+param2+' '+value.sub_models+'" onclick="submodel2('+value.id+', \''+param2+' '+value.sub_models+'\')">'+value.sub_models+'</button></li>';
            });
            $('.carsearch-lv4 .carsearch-ul').empty().append(html);
        });
        // resources\views\frontend\layouts\inc_javascript.blade.php
        if (param===0) {
            console.log(param2);
            generation_id = null;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv1').show();
            $('.carsearch-lv2').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv4').hide();
            $.fancybox.close();
        }
        else {
            generation_id = param;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv4').fadeIn();
            $('.carsearch-lv3').hide();
        }
    }

    function submodel2(param, param2) {
        
        $('.box-search-car .carsearch-input input').val(param2);
        

        if (param===0) {
            console.log(param2);
            submodel_id = null;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv1').show();
            $('.carsearch-lv2').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv4').hide();
            $.fancybox.close();
        }
        else {
            submodel_id = param;
            $('#textsearch').val(param2);
            $('#textsearchfooter').val(param2);
            $('.carsearch-lv1').show();
            $('.carsearch-lv2').hide();
            $('.carsearch-lv3').hide();
            $('.carsearch-lv4').hide();
            $.fancybox.close();
        }



        
        $('.carsearch-popup .carsearch-exit').click();
    }
</script>