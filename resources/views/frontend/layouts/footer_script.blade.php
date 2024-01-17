<!-- <script>
    $( document ).ready(function() {

            // range price
    var popuppriceslider = document.getElementById('popup-priceslider');

var popupminrange = 0;
var popupmaxrange = 3000000;

noUiSlider.create(popuppriceslider, {
    start: [popupminrange, popupmaxrange],
    connect: true,
    snap: true,
    range: {
        'min': popupminrange,
        '8%': 100000,
        '16%': 200000,
        '24%': 300000,
        '32%': 400000,
        '40%': 500000,
        '48%': 600000,
        '56%': 700000,
        '64%': 800000,
        '72%': 900000,
        '80%': 1000000,
        '88%': 2000000,
        'max': popupmaxrange
    },
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: '',
    })
});

var formatValues = [
    document.getElementById('popup-minprice'),
    document.getElementById('popup-maxprice')
];

popuppriceslider.noUiSlider.on('update', function (values, handle) {
    if (values[handle].replace(/[^0-9.-]+/g,"") == popupminrange){
        formatValues[handle].innerHTML = "ต่ำสุด"
    }else if (values[handle].replace(/[^0-9.-]+/g,"") == popupmaxrange){
        formatValues[handle].innerHTML = "สูงสุด"
    }else{
        formatValues[handle].innerHTML = values[handle];
    }
    
});

//year

var popupyearslider = document.getElementById('popup-yearslider');

var popupminyearrange = 2010;
var popupmaxyearrange = 2023;


noUiSlider.create(popupyearslider, {
    start: [popupminyearrange, popupmaxyearrange],
    connect: true,
    snap: true,
    range: {
        'min': popupminyearrange,
        '10%': 2012,
        '20%': 2013,
        '30%': 2015,
        '50%': 2017,
        '60%': 2019,
        '70%': 2020,
        '90%': 2021,
        'max': popupmaxyearrange
    },
      format: wNumb({
        decimals: 0,
    })
});

var formatYear = [
    document.getElementById('popup-minyear'),
    document.getElementById('popup-maxyear')
];

popupyearslider.noUiSlider.on('update', function (values, handle) {
    console.log(values[1],values[2]);
    if (values[0] == minyearrange && values[1] == popupmaxyearrange){
        formatYear[0].innerHTML = " ";
        formatYear[1].innerHTML = "ทุกปี";
    }else if (values[0] != popupminyearrange && values[1] == popupmaxyearrange){
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = popupmaxyearrange;
    }else if (values[0] == popupminyearrange && values[1] != popupmaxyearrange){
        formatYear[0].innerHTML = "ต่ำสุด - ";
        formatYear[1].innerHTML = values[1];
    }else {
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = values[1];
    }
});


        $('.boxslide-search .carsearch-input input').click(function (event) {
            if (  $( ".boxslide-search .carsearch-popup" ).is( ":hidden" ) ) {
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.stopPropagation();
        });
        
        $('.boxslide-search .carsearch-exit').click(function (event) {
            $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
            $('.boxslide-search .carsearch-lv1').show();
            $.fancybox.close();
            // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });
        
        $('.boxslide-search .carsearch-head').click(function (event) {
            if (  $(this).parents('.boxslide-search .carsearch-lv1').length) {
                $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
                $('.boxslide-search .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.boxslide-search .carsearch-lv2').length) {
                $('.boxslide-search .carsearch-lv1').fadeIn();
                $('.boxslide-search .carsearch-lv2').hide();
            }else if (  $(this).parents('.boxslide-search .carsearch-lv3').length) {
                $('.boxslide-search .carsearch-lv2').fadeIn();
                $('.boxslide-search .carsearch-lv3').hide();
            }else if (  $(this).parents('.boxslide-search .carsearch-lv4').length) {
                $('.boxslide-search .carsearch-lv3').fadeIn();
                $('.boxslide-search .carsearch-lv4').hide();
            }
            event.stopPropagation();
        });

        $('.boxslide-search .carsearch-ul > li > button').click(function (event) {
            $('.boxslide-search .carsearch-input input').val($(this).attr('rel'));
            if ( $(this).hasClass('carsearch-select-all')){
                $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
                $('.boxslide-search .carsearch-lv1').show();
                $.fancybox.close();
                //$( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.boxslide-search .carsearch-lv1').length) {
                $('.boxslide-search .carsearch-lv2').fadeIn();
                $('.boxslide-search .carsearch-lv1').hide();
            }else if (  $(this).parents('.boxslide-search .carsearch-lv2').length) {
                $('.boxslide-search .carsearch-lv3').fadeIn();
                $('.boxslide-search .carsearch-lv2').hide();
            }else if (  $(this).parents('.boxslide-search .carsearch-lv3').length) {
                $('.boxslide-search .carsearch-lv4').fadeIn();
                $('.boxslide-search .carsearch-lv3').hide();
            }else if (  $(this).parents('.boxslide-search .carsearch-lv4').length) {
                $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
                $('.boxslide-search .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }
            event.stopPropagation();
        });

        $('.boxslide-search .btn-selectall-car button').click(function (event) {
            $('.boxslide-search .carsearch-input input').val($(this).attr('rel'));
                $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
                $('.boxslide-search .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.boxslide-search .btn-advancesearch').click(function (event) {
            if (  $( ".boxslide-search .box-advancesearch" ).is( ":hidden" ) ) {
                $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.preventDefault();
        });

        $('.boxslide-search .advance-exit').click(function (event) {
            $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.boxslide-search .btn-submitsearch').click(function (event) {
            $( ".boxslide-search .boxshow-advance" ).show();
            $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.preventDefault();
        });

        $('.boxslide-search .btn-resetsearch').click(function (event) {
            $( ".boxslide-search .boxshow-advance" ).hide();
            event.stopPropagation();
        });
        
    });
</script>

<script>
    $( '.item_advancesearch > .left-boxsearch-topic2' ).click(function (event) {
	  if (  $(this).siblings('.content_advancesearch').is( ":hidden" ) ) {
            $('.item_advancesearch').removeClass("active");
            $('.content_advancesearch').slideUp();
            $(this).parent('.item_advancesearch').addClass("active");
            $(this).siblings('.content_advancesearch').slideDown();
	  } else {
          $('.item_advancesearch').removeClass("active");
            $('.content_advancesearch').slideUp();
	  }
	  event.stopPropagation();
	});
</script> -->



<script>
    $( document ).ready(function() {

            // range price
    var popuppriceslider = document.getElementById('popup-priceslider');

var popupminrange = 0;
var popupmaxrange = 3000000; 

noUiSlider.create(popuppriceslider, {
    start: [popupminrange, popupmaxrange],
    connect: true,
    snap: true,
    range: {
        'min': popupminrange,
        '8%': 100000,
        '16%': 200000,
        '24%': 300000,
        '32%': 400000,
        '40%': 500000,
        '48%': 600000,
        '56%': 700000,
        '64%': 800000,
        '72%': 900000,
        '80%': 1000000,
        '88%': 2000000,
        'max': popupmaxrange
    },
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: '',
    })
});

var formatValues = [
    document.getElementById('popup-minprice'),
    document.getElementById('popup-maxprice')
];

popuppriceslider.noUiSlider.on('update', function (values, handle) {
    if (values[handle].replace(/[^0-9.-]+/g,"") == popupminrange){
        formatValues[handle].innerHTML = "ต่ำสุด"
    }else if (values[handle].replace(/[^0-9.-]+/g,"") == popupmaxrange){
        formatValues[handle].innerHTML = "สูงสุด"
    }else{
        formatValues[handle].innerHTML = values[handle];
    }
    
});

//year

var popupyearslider = document.getElementById('popup-yearslider');

var popupminyearrange = 2010;
var popupmaxyearrange = 2023;


noUiSlider.create(popupyearslider, {
    start: [popupminyearrange, popupmaxyearrange],
    connect: true,
    snap: true,
    range: {
        'min': popupminyearrange,
        '10%': 2012,
        '20%': 2013,
        '30%': 2015,
        '50%': 2017,
        '60%': 2019,
        '70%': 2020,
        '90%': 2021,
        'max': popupmaxyearrange
    },
      format: wNumb({
        decimals: 0,
    })
});

var formatYear = [
    document.getElementById('popup-minyear'),
    document.getElementById('popup-maxyear')
];

// popupyearslider.noUiSlider.on('update', function (values, handle) {
//     console.log(values[1],values[2]);
//     if (values[0] == minyearrange && values[1] == popupmaxyearrange){
//         formatYear[0].innerHTML = " ";
//         formatYear[1].innerHTML = "ทุกปี";
//     }else if (values[0] != popupminyearrange && values[1] == popupmaxyearrange){
//         formatYear[0].innerHTML = values[0] + " - ";
//         formatYear[1].innerHTML = popupmaxyearrange;
//     }else if (values[0] == popupminyearrange && values[1] != popupmaxyearrange){
//         formatYear[0].innerHTML = "ต่ำสุด - ";
//         formatYear[1].innerHTML = values[1];
//     }else {
//         formatYear[0].innerHTML = values[0] + " - ";
//         formatYear[1].innerHTML = values[1];
//     }
// });

//แก้ script ตรงนี้ใหม่
popupyearslider.noUiSlider.on('update', function (values, handle) {
    console.log(values[1],values[2]);
    if (values[0] == popupminyearrange && values[1] == popupmaxyearrange){
        formatYear[0].innerHTML = " ";
        formatYear[1].innerHTML = "ทุกปี";
    }else if (values[0] != popupminyearrange && values[1] == popupmaxyearrange){
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = popupmaxyearrange;
    }else if (values[0] == popupminyearrange && values[1] != popupmaxyearrange){
        formatYear[0].innerHTML = "ต่ำสุด - ";
        formatYear[1].innerHTML = values[1];
    }else {
        formatYear[0].innerHTML = values[0] + " - ";
        formatYear[1].innerHTML = values[1];
    }
});


        // $('.boxslide-search .carsearch-input input').click(function (event) {
        //     if (  $( ".boxslide-search .carsearch-popup" ).is( ":hidden" ) ) {
        //         // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
        //     }
        //     event.stopPropagation();
        // });
        
        // $('.boxslide-search .carsearch-exit').click(function (event) {
        //     $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
        //     $('.boxslide-search .carsearch-lv1').show();
        //     $.fancybox.close();
        //     // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        //     event.stopPropagation();
        // });
        
        // $('.boxslide-search .carsearch-head').click(function (event) {
        //     if (  $(this).parents('.boxslide-search .carsearch-lv1').length) {
        //         $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
        //         $('.boxslide-search .carsearch-lv1').show();
        //         $.fancybox.close();
        //         // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv2').length) {
        //         $('.boxslide-search .carsearch-lv1').fadeIn();
        //         $('.boxslide-search .carsearch-lv2').hide();
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv3').length) {
        //         $('.boxslide-search .carsearch-lv2').fadeIn();
        //         $('.boxslide-search .carsearch-lv3').hide();
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv4').length) {
        //         $('.boxslide-search .carsearch-lv3').fadeIn();
        //         $('.boxslide-search .carsearch-lv4').hide();
        //     }
        //     event.stopPropagation();
        // });

        // $('.boxslide-search .carsearch-ul > li > button').click(function (event) {
        //     $('.boxslide-search .carsearch-input input').val($(this).attr('rel'));
        //     if ( $(this).hasClass('carsearch-select-all')){
        //         $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
        //         $('.boxslide-search .carsearch-lv1').show();
        //         $.fancybox.close();
        //         //$( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv1').length) {
        //         $('.boxslide-search .carsearch-lv2').fadeIn();
        //         $('.boxslide-search .carsearch-lv1').hide();
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv2').length) {
        //         $('.boxslide-search .carsearch-lv3').fadeIn();
        //         $('.boxslide-search .carsearch-lv2').hide();
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv3').length) {
        //         $('.boxslide-search .carsearch-lv4').fadeIn();
        //         $('.boxslide-search .carsearch-lv3').hide();
        //     }else if (  $(this).parents('.boxslide-search .carsearch-lv4').length) {
        //         $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
        //         $('.boxslide-search .carsearch-lv1').show();
        //         $.fancybox.close();
        //         // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        //     }
        //     event.stopPropagation();
        // });

        // $('.boxslide-search .btn-selectall-car button').click(function (event) {
        //     $('.boxslide-search .carsearch-input input').val($(this).attr('rel'));
        //         $('.boxslide-search .carsearch-lv2, .boxslide-search .carsearch-lv3, .boxslide-search .carsearch-lv4').hide();
        //         $('.boxslide-search .carsearch-lv1').show();
        //         $.fancybox.close();
        //         // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        //     event.stopPropagation();
        // });

        // เพิ่มมาใหม่ //
        $('.carsearch-popup .carsearch-exit').click(function (event) {
            event.preventDefault();
            $('.carsearch-popup .carsearch-lv2, .carsearch-popup .carsearch-lv3, .carsearch-popup .carsearch-lv4').hide();
            $('.carsearch-popup .carsearch-lv1').show();
            $.fancybox.close();
            // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });
        
        $('.carsearch-popup .carsearch-head').click(function (event) {
            event.preventDefault();
            if (  $(this).parents('.carsearch-popup .carsearch-lv1').length) {
                $('.carsearch-popup .carsearch-lv2, .carsearch-popup .carsearch-lv3, .carsearch-popup .carsearch-lv4').hide();
                $('.carsearch-popup .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv2').length) {
                $('.carsearch-popup .carsearch-lv1').fadeIn();
                $('.carsearch-popup .carsearch-lv2').hide();
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv3').length) {
                $('.carsearch-popup .carsearch-lv2').fadeIn();
                $('.carsearch-popup .carsearch-lv3').hide();
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv4').length) {
                $('.carsearch-popup .carsearch-lv3').fadeIn();
                $('.carsearch-popup .carsearch-lv4').hide();
            }
            event.stopPropagation();
        });

        $('.carsearch-popup .carsearch-ul > li > button').click(function (event) {
            event.preventDefault();
            $('.carsearch-popup .car-inputsearch').val();
            if ( $(this).hasClass('carsearch-select-all')){
                $('.carsearch-popup .carsearch-lv2, .carsearch-popup .carsearch-lv3, .carsearch-popup .carsearch-lv4').hide();
                $('.carsearch-popup .carsearch-lv1').show();
                $.fancybox.close();
                //$( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv1').length) {
                $('.carsearch-popup .carsearch-lv2').fadeIn();
                $('.carsearch-popup .carsearch-lv1').hide();
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv2').length) {
                $('.carsearch-popup .carsearch-lv3').fadeIn();
                $('.carsearch-popup .carsearch-lv2').hide();
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv3').length) {
                $('.carsearch-popup .carsearch-lv4').fadeIn();
                $('.carsearch-popup .carsearch-lv3').hide();
            }else if (  $(this).parents('.carsearch-popup .carsearch-lv4').length) {
                $('.carsearch-popup .carsearch-lv2, .carsearch-popup .carsearch-lv3, .carsearch-popup .carsearch-lv4').hide();
                $('.carsearch-popup .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            }
            event.stopPropagation();
        });

        $('.carsearch-popup .btn-selectall-car button').click(function (event) {
            event.preventDefault();
            $('.carsearch-popup .car-inputsearch').val($(this).attr('rel'));
                $('.carsearch-popup .carsearch-lv2, .carsearch-popup .carsearch-lv3, .carsearch-popup .carsearch-lv4').hide();
                $('.carsearch-popup .carsearch-lv1').show();
                $.fancybox.close();
                // $( ".carsearch-popup" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });
        //เพิ่มมาใหม่//


        $('.boxslide-search .btn-advancesearch').click(function (event) {
            if (  $( ".boxslide-search .box-advancesearch" ).is( ":hidden" ) ) {
                $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            }
            event.preventDefault();
        });

        $('.boxslide-search .advance-exit').click(function (event) {
            $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.stopPropagation();
        });

        $('.boxslide-search .btn-submitsearch').click(function (event) {
            $( ".boxslide-search .boxshow-advance" ).show();
            $( ".boxslide-search .box-advancesearch" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
            event.preventDefault();
        });

        $('.boxslide-search .btn-resetsearch').click(function (event) {
            $( ".boxslide-search .boxshow-advance" ).hide();
            event.stopPropagation();
        });
        
    });
</script>

<script>
    $( '.item_advancesearch > .left-boxsearch-topic2' ).click(function (event) {
	  if (  $(this).siblings('.content_advancesearch').is( ":hidden" ) ) {
            $('.item_advancesearch').removeClass("active");
            $('.content_advancesearch').slideUp();
            $(this).parent('.item_advancesearch').addClass("active");
            $(this).siblings('.content_advancesearch').slideDown();
	  } else {
          $('.item_advancesearch').removeClass("active");
            $('.content_advancesearch').slideUp();
	  }
	  event.stopPropagation();
	});
</script>