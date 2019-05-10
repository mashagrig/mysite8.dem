 // AOS.init({
 // 	duration: 800,
 // 	easing: 'slide',
 // 	once: false
 // });

 var browserWindow = $(window);

 // :: 1.0 Preloader Active Code
 browserWindow.on('load', function () {
     $('#preloader').fadeOut('slow', function () {
         $(this).remove();
     });

 });

jQuery(document).ready(function($) {

	"use strict";

    // jQuery(function($){
    //     $("#phone").mask("+7 (999) 999-99-99");
    // });
        //2. Получить элемент, к которому необходимо добавить маску
        $("#phone").mask("8(999) 999-99-99");
    //    $("#birthdate").mask("99.99.9999", {placeholder: "дд.мм.гггг" });
      //  $("#birthdate").mask("9999.99.99", {placeholder: "гггг.мм.дд" });


	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	// siteSliderRange();


	var siteMagnificPopup = function() {
		$('.image-popup').magnificPopup({
	    type: 'image',
	    closeOnContentClick: true,
	    closeBtnInside: false,
	    fixedContentPos: true,
	    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
	     gallery: {
	      enabled: true,
	      navigateByImgClick: true,
	      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	    },
	    image: {
	      verticalFit: true
	    },
	    zoom: {
	      enabled: true,
	      duration: 300 // don't foget to change the duration also in CSS
	    }
	  });

	  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	    disableOn: 700,
	    type: 'iframe',
	    mainClass: 'mfp-fade',
	    removalDelay: 160,
	    preloader: false,

	    fixedContentPos: false
	  });
	};
	siteMagnificPopup();

//------------------------------------------------
	var siteCarousel = function () {
		if ( $('.nonloop-block-13').length > 0 ) {
			$('.nonloop-block-13').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 20,
		    nav: true,
		    dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        0:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1
	        },
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        },
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        }
		    }
			});
		}


//------------------------------------------------
		if ( $('.nonloop-block-14').length > 0 ) {
			$('.nonloop-block-14').owlCarousel({
		    center: false,
		     items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 0,
		    padding: 0,
		    nav: true,
		   // dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        0:{
	          items: 1
	        },
	        600:{
	          items: 2
	        },
	        1000:{
	          items: 2
	        },
	        1400:{
	          items: 3
	        },
	        1600:{
	          items: 3
	        }
	        
		    }
			});
		}
//------------------------------------------------
		if ( $('.nonloop-block-15').length > 0 ) {
			$('.nonloop-block-15').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 20,
		    nav: true,
		    dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1,
	          nav: false,
		    		dots: true
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2,
	          nav: true,
		    		dots: true
	        },
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3,
	          nav: true,
		    		dots: true
	        }
		    }
			});
		}
//------------------------------------------------
//------------------------------------------------
		if ( $('.slide-one-item').length > 0 ) {

		    $('.slide-one-item').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 0,
		    autoplay: true,
		    pauseOnHover: false,
		    animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
		    nav: true,
		    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">']
		  }).data('owlCarousel');

	  }
	};


    // $(document).ready(function () {
    //     let owl = $(".owl-carousel").owlCarousel({
    //         items: 1,
    //         slideSpeed: 500,
    //         autoplay: true,
    //         autoplayTimeout: 4500,
    //         loop: true,
    //         mouseDrag: false,
    //         singleItem: true,
    //         dots: true,
    //         margin: 85,
    //         itemElement:'li',
    //         stageElement:'ul',
    //         dotsClass:'slider__pager',
    //     }).data('owlCarousel');
    //
    // });


	siteCarousel();
//------------------------------------------------
//------------------------------------------------
	var siteStellar = function() {
	//	$.stellar();
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();
	// //------------------------------------------------
	// var siteStellarOne = function() {
	// 	$('.site-blocks-cover-one').stellar({
	//     responsive: false,
	//     parallaxBackgrounds: true,
	//     parallaxElements: true,
	//     horizontalScrolling: false,
	//     hideDistantElements: false,
	//     scrollProperty: 'scroll'
	//   });
	// };
	// siteStellarOne();
//-------------------------------------------
	var siteCountDown = function() {

		if ( $('#date-countdown').length > 0 ) {
			$('#date-countdown').countdown('2020/10/10', function(event) {
			  var $this = $(this).html(event.strftime(''
			    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
			    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
			    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
			    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
			    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
			});
		}
				
	};
	siteCountDown();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();


	var windowScrolled = function() {


		$(window).scroll(function() {

			var $w = $(this), st = $w.scrollTop(), navbar = $('.js-site-navbar') ;

			if ( st > 100 ) {
				navbar.addClass('scrolled');
			} else {
				navbar.removeClass('scrolled');
			}
			
		})

	}
	windowScrolled();

	var toolTipInit = function() {
		$('[data-toggle="tooltip"]').tooltip()
	};
	toolTipInit();


	//---------------------------------
    // :: 8.0 prevent default a click
    $('a[href="#"]').click(function ($) {
        $.preventDefault()
    });

    // :: 4.0 ScrollUp Active Code
    if ($.scrollUp) {
        $(window).scrollUp({
            scrollSpeed: 250,
            // scrollText: '<i class="fa fa-angle-up"></i>'
           // scrollText: '<span class="icon-keyboard_arrow_up"></span>'
            scrollText: '<span class="icon-arrow_upward"></span>'
        });
    }

   //  Scroll Active Code
   //  if ($.jscroll) {
   //      $(window).jscroll({
   //
   //         // loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
   //          padding: 120,
   //        //  nextSelector: 'a.jscroll-next:last',
   //          //-----------------------
   //          scrollSpeed: 250,
   //          // scrollText: '<i class="fa fa-angle-up"></i>'
   //         // scrollText: '<span class="icon-keyboard_arrow_up"></span>'
   //          contentSelector: '<span class="icon-arrow_upward"></span>'
   //      });
   // }



    document.getElementById("choose_btn").disabled = true;
    //jquery подключаем в подвале, поэтому вызов в коде не сработает
    $("#file").on('change', function (e) {
        //  $("choose_btn").prop('disabled', 'disabled');
      //  document.getElementById("choose_btn").prop('disabled', true);
      //  document.getElementById("choose_btn").disabled = true;

        var choosed = document.getElementById("choosed");
        var fileName = e.target.files[0].name;

        document.getElementById("img_p").src="../storage/uploads/"+fileName;
    //    document.getElementById("img_photo").src="../storage/uploads/".fileName;


        choosed.innerHTML = fileName;
        $("#choose_btn").removeAttr('disabled');
        $("#choose_btn").toggleClass('btn-primary-inactive', false);
        $("#choose_btn").toggleClass('btn-primary', true);


        // $.ajax({
        //     type: 'GET',
        //     url: "",
        //     success: function (data) {
        //      //   $("#img_photo").attr('src', "../storage/uploads/".fileName);
        //
        //
        //       //  ava.setAttribute('src',"../storage/uploads/".fileName);
        //         document.getElementById("img_photo").src="../storage/uploads/".fileName;
        //
        //
        //         choosed.innerHTML = fileName;
        //         $("#choose_btn").removeAttr('disabled');
        //         $("#choose_btn").toggleClass('btn-primary-inactive', false);
        //         $("#choose_btn").toggleClass('btn-primary', true);
        //     }});
    });





});

