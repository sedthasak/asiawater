
// menu sticky
var previousScroll = 0;
$(window).scroll(function() {
    var scroll = $(this).scrollTop();
    if ($(this).scrollTop() > 150){  
        $('.wrap_menu').addClass("sticky");
        if (scroll > previousScroll){
            $('.wrap_menu, .menu-mobile').addClass('hide');
        } else {
            $('.wrap_menu, .menu-mobile').removeClass('hide');
        }
        previousScroll = scroll;
    }
    else{
        $('.wrap_menu, .menu-mobile').removeClass("sticky hide");
    }
});



// menu
$(window).on('load', function () {
    var mmH = $('.wrap_menu').outerHeight(true)
    $('body').eq(0).css('padding-top', mmH);
});

$( document ).ready(function() {
    
    $('.wrap_btn_menu').click(function(event) {
		if (!$(".mainmenu").hasClass("open")) {
            //$(this).addClass("active");
            $('.mainmenu').addClass('open');
            $("body").addClass("menuopened");
            $('.overlay').fadeIn(500);
		  } else {
            $('.mainmenu').removeClass('open'); 
            //$(this).removeClass("active");
            $("body").removeClass("menuopened");
            $('.overlay').fadeOut(500);
		  }
		  event.stopPropagation();
	});

   
    
     $('.close_menu, .overlay').click(function(event) {
        $('.mainmenu').removeClass('open');
        $('.close_menu').removeClass("active");
        $("body").removeClass("menuopened");
        $('.overlay').fadeOut(500);
    });


    $( '.hassub' ).click(function (event) {
        if (  $(this).children( ".submenu" ).is( ":hidden" ) ) {
                $('.submenu').slideUp();
              $(this).children('.submenu').slideDown();
        } else {
            $('.submenu').slideUp();
        }
        //event.stopPropagation();
      });
      
       $( ".submenu" )
        .mouseenter(function() {
          $('.submenu').clearQueue();
          event.stopPropagation();
        })
        .mouseleave(function() {
          $('.submenu').delay( 2000 ).hide('fade', 1000);
        });




//padding container
var ctnoffset = $('.container').eq(0).offset().left; 
$('.bg-contentproject').css('padding-left', ctnoffset );  
$('.title-banner').css('padding-left', ctnoffset );  

// tab
$( '.tab_article_btn > div' ).click(function (event) {
    var idarticle = $(this).index();
    if( $('.tab_pdetail').eq(idarticle).is(':hidden') ) {
        $('.tab_pdetail').hide();
        $('.tab_pdetail').eq(idarticle).fadeIn();
        $('.tab_article_btn > div').removeClass('active');
        $(this).addClass('active');
    }else{
    }
    event.stopPropagation();
});

});

// owl
$(document).ready(function() {
    $('.owl-bannerslide').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        smartSpeed: 2000,
        nav: false,
        dots: true,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('.owl-bannercar').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        smartSpeed: 2000,
        nav: false,
        dots: true,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('.owl-carslide').owlCarousel({
        loop: true,
        margin: 15,
        autoplay: false,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: true,
        dots: false,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 2.4,
                margin: 5,
                nav: false,
            },
            768: {
                items: 3,
                margin: 15
            },
            1200: {
                items: 4
            },
            2000: {
                items: 5,
                margin: 40
            }
        }
    });
    $('.owl-recentnews').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: false,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: true,
        dots: false,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 2,
                margin: 15,
                nav: false,
                autoplay: true
            },
            768: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 3,
                margin: 30
            },
            1200: {
                items: 4
            }
        }
    });
    $('.owl-bestsearch').owlCarousel({
        loop: true,
        margin: 50,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: true,
        dots: false,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1.4,
                nav: false,
                margin: 20
            },
            768: {
                items: 2.6,
                margin: 25
            },
            1000: {
                items: 3,
                margin: 30
            },
            1200: {
                items: 3
            }
        }
    });
    $('.owl-linkcarseo').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        smartSpeed: 2000,
        nav: false,
        dots: true,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 2,
                margin: 30
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
});

// wow
$( document ).ready(function() {

    $(function(){
        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Check if the viewport is set, else we gonna set it if we can.
                if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
    });

    wow = new WOW(
        {
    animateClass: 'animated',
    offset: 100
        }
    );
        wow.init();    
});
  

//mousehover change pichure
$(document).ready(function(){
    $('.bg-homefac img:first-child').addClass('active');

$(".btn-menufac > a").mouseenter(function() {
    var imgno = $(this).index();
    $(this).parents('.container').siblings('.bg-homefac').find('img').removeClass('active');
    $(this).parents('.container').siblings('.bg-homefac').find('img').eq(imgno).addClass('active');
  })
  .mouseleave(function() {
    $(this).parents('.container').siblings('.bg-homefac').find('img').removeClass('active');
    $(this).parents('.container').siblings('.bg-homefac').find('img').eq(0).addClass('active');
  });
});


$( '.item_mycarsearch > .topicmycarsearch' ).click(function (event) {
    if (  $(this).siblings('.content_mycarsearch').is( ":hidden" ) ) {
          $('.item_mycarsearch').removeClass("active");
          $('.content_mycarsearch').slideUp();
          $(this).parent('.item_mycarsearch').addClass("active");
          $(this).siblings('.content_mycarsearch').slideDown();
    } else {
        $('.item_mycarsearch').removeClass("active");
          $('.content_mycarsearch').slideUp();
    }
    event.stopPropagation();
  });

  $( '.item_mycarsearch-sub > .topicmycarsearch-sub' ).click(function (event) {
    if (  $(this).siblings('.content_mycarsearch-sub').is( ":hidden" ) ) {
          $('.item_mycarsearch-sub').removeClass("active");
          $('.content_mycarsearch-sub').slideUp();
          $(this).parent('.item_mycarsearch-sub').addClass("active");
          $(this).siblings('.content_mycarsearch-sub').slideDown();
    } else {
        $('.item_mycarsearch-sub').removeClass("active");
          $('.content_mycarsearch-sub').slideUp();
    }
    event.stopPropagation();
  });

  $( '.item_customer > .btn-contactcus' ).click(function (event) {
    if (  $(this).siblings('.detail-contactcus').is( ":hidden" ) ) {
          $('.item_customer').removeClass("active");
          $('.detail-contactcus').slideUp();
          $(this).parent('.item_customer').addClass("active");
          $(this).siblings('.detail-contactcus').slideDown();
    } else {
        $('.item_customer').removeClass("active");
          $('.detail-contactcus').slideUp();
    }
    event.stopPropagation();
  });

  $(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });


    // menu slide
    $('.show-menuprofile').click(function (event) { 
        if (  $( ".menuprofile-mb" ).is( ":hidden" ) ) {
            $( ".menuprofile-mb" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
        }
        event.stopPropagation();
    });

    $('.close-menuprofile').click(function (event) {
        $( ".menuprofile-mb" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        event.stopPropagation();
    });

    // menu search slide
    $('.show-menucarsearch').click(function (event) { 
        if (  $( ".boxslide-search" ).is( ":hidden" ) ) {
            // $( ".boxslide-search" ).effect('slide', { direction: 'right', mode: 'show' }, 500);
            $( ".boxslide-search" ).fadeIn();
        }
        event.stopPropagation();
    });

    $('.close-menucarsearch').click(function (event) {
        // $( ".boxslide-search" ).effect('slide', { direction: 'right', mode: 'hide' }, 500);
        $( ".boxslide-search" ).fadeOut();
        event.stopPropagation();
    });

    // top top
    var btn = $("#button-top");

		$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			btn.addClass("show");
		} else {
			btn.removeClass("show");
		}
		});
        

		btn.on("click", function (e) {
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, "300");
		});
    
});







